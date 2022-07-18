<?php
declare(strict_types=1);

class Student extends Teacher
{
    private DatabaseLoader $databaseLoader;
    private int $groupId;



    public function __construct(int $id, string $name, string $email, int $groupId)
    {parent:: __construct($id, $name, $email);
        $this->groupId = $groupId;
        $this->databaseLoader = new DatabaseLoader();
    }

    public function render ($get, $post){

    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * @return string
     */
    public function getGroupName($groupId): string
    {
        $sqlGroupName = $this->databaseLoader->getConnection()->query("SELECT name FROM group_table WHERE id= $groupId");
        $studentGroupName = $sqlGroupName->fetch()['name'];
        return $studentGroupName;
    }

 }