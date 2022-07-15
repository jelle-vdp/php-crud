<?php

class TeacherController
{
    private DatabaseLoader $databaseLoader;
    private array $allTeachers;

    public function __construct() {
        $this->databaseLoader = new DatabaseLoader();
    }


    public function render($get, $post)
    {
        $this->getAllDataTeachers();
        require("views/teacherView.php");
    }

    public function getAllDataTeachers () {
        $sqlAllDataTeachers = $this->databaseLoader->getConnection()->query("SELECT * FROM teacher_table");
        $allDataTeachers = [];
        while ($row = $sqlAllDataTeachers->fetch()){
            $allDataTeachers[] = new Teacher ($row['id'], $row['name'], $row['email']);
        }
        $this->allTeachers = $allDataTeachers;
    }
}




public function render($get, $post)
{
    $this->getAllDataTeachers();

    if ($post["method"] = "add" && isset($post['name']) && isset($post['email']) ) {
        $this->addTeacher($post);
        $this->getAllDataTeachers();
    }
    require("views/teacherView.php");
}

public function getAllDataTeachers () {
    $sqlAllDataTeachers = $this->databaseLoader->getConnection()->query("SELECT * FROM teacher_table");
    $allDataTeachers = [];
    while ($row = $sqlAllDataTeachers->fetch()){
        $allDataTeachers[] = new Teacher ($row['id'], $row['name'], $row['email']);
    }
    $this->allTeachers = $allDataTeachers;
}

public function addTeacher ($post) {
    $name = $post['name'];
    $email = $post['email'];
    $this->databaseLoader->getConnection()->query("INSERT INTO teacher_table VALUES (id," . $name . "," . $email);
}

Bericht sturen naar Jelle, Besart
