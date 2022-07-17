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
        //Loads all the data of the teachers
        $this->getAllDataTeachers();

        //if a button was pressed with the method 'create' and all values were set, creates a new Teacher with those values
        if ($post["method"] = "create" && isset($post['name']) && isset($post['email'])) {
            $this->createNewTeacher($post);
            $this->getAllDataTeachers();
            require("./views/teacherView.php");
        }

        else if (isset($post['delete']) && !isset($post['confirm'])) {
            require("./views/deleteTeacherView.php");
        }

        else if (isset($post['delete']) && $post['confirm'] === 'true') {
            $this->deleteTeacher($post['delete']);
            $this->getAllDataTeachers();
            require("./views/teacherView.php");
        }

        else {
            require("./views/teacherView.php");
        }
    }

    public function getAllDataTeachers () {
        $sqlAllDataTeachers = $this->databaseLoader->getConnection()->query("SELECT * FROM teacher_table");
        $allDataTeachers = [];
        while ($row = $sqlAllDataTeachers->fetch()){
            $allDataTeachers[] = new Teacher ($row['id'], $row['name'], $row['email']);
        }
        $this->allTeachers = $allDataTeachers;
    }

    public function createNewTeacher ($post) {
        $name = $post['name'];
        $email = $post['email'];
        $this->databaseLoader->getConnection()->query("INSERT INTO teacher_table VALUES ( id ,'$name', '$email')");
    }

    public function deleteTeacher($id)
    {
        $this->databaseLoader->getConnection()->query("DELETE FROM teacher_table WHERE id = $id");
    }
}



