<?php
declare(strict_types=1);

class Teacher {
    //properties of teacher according to database
    private int $id;
    private string $name;
    private string $email;
    //property databaseloader which will be needed later in the getGroupName function
    private DatabaseLoader $databaseLoader;

    public function __construct (int $id, string $name, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        //creates a new database, which will be needed in getGroupName function
        //this doesn't get passed in constructor since this is not a property that's needed for the new Teacher class
        $this->databaseLoader = new DatabaseLoader();
    }

    //all the getters
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    //function getGroupName, gets the name of the group that the teacher is responsible for
    public function getGroupNameFromTeacher ()
    {
        //gets id of teacher
        $this->id = $this->getId();
        //query that selects the name of the group where the teacher_id of the table is equal to the id of the teacher AND is not null
        $sqlGroupName = $this->databaseLoader->getConnection()->query("SELECT name FROM group_table WHERE teacher_id = $this->id && teacher_id IS NOT NULL");
        //fetches the name of the group from the sqlGroupName array, and if the teacher ahs no group gives default value of the string written down below
        $groupName = $sqlGroupName->fetch()['name'] ?? 'This teacher has no group';
        //returns groupname or the default value of the string given
        return $groupName;
    }

}