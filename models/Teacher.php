<?php
declare(strict_types=1);

class Teacher {
    private int $id;
    private string $name;
    private string $email;
    private DatabaseLoader $databaseLoader;

    public function __construct (int $id, string $name, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->databaseLoader = new DatabaseLoader();
    }

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

    public function getGroupName ()
    {
        $this->id = $this->getId();
        $sqlGroupName = $this->databaseLoader->getConnection()->query("SELECT name FROM group_table WHERE teacher_id = $this->id && teacher_id IS NOT NULL");
        $groupName = $sqlGroupName->fetch()['name'] ?? 'This teacher has no group';
        return $groupName;
    }

}