<?php

class TeacherController
{
    private DatabaseLoader $databaseLoader;

    public function __construct() {
        $this->databaseLoader = new DatabaseLoader();
    }

    public function render($get, $post)
    {
        $sqlAllDataTeachers = $this->databaseLoader->getConnection()->query("SELECT * FROM teacher_table");
        $allDataTeachers = [];
        while ($row = $sqlAllDataTeachers->fetch()){
            $allDataTeachers[] = new Coach($row[0], $row[1], $row[2]);
        }



        require("views/teacherView.php");
    }
}
