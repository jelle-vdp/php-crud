<?php

declare(strict_types=1);

class Group{
    private DatabaseLoader $databaseLoader;
    private int $id;
    private string $name;
    private string $location;
    private int $teacherId;

    public function __construct (int $id, string $name, string $location, int $teacherId) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->teacherId = $teacherId;
        $this-> databaseLoader = new DatabaseLoader();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getTeacherId(): int
    {
        return $this->teacherId;
    }

    public function getTeacherName($teacherId): string {
        $sqlTeacherName = $this->databaseLoader->getConnection()->query("SELECT name FROM teacher_table WHERE id = $teacherId");
        $teacherName = $sqlTeacherName->fetch()['name'];
        return $teacherName;
    }





}