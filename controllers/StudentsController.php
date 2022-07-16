<?php

class StudentsController
{
    private DatabaseLoader $databaseLoader;
    private array $allStudents;

    public function __construct()
    {
        $this->databaseLoader = new DatabaseLoader();
    }

    public function render($get, $post)
    {
        $this->getAllDataStudents();


        if (isset($post['delete']) && !isset($post['confirm'])) {
            require("views/deleteStudentView.php");
        } else if (isset($post['delete']) && $post['confirm'] === 'true') {
            $this->deleteStudent($post['delete']);
            $this->getAllDataStudents();
            require("./views/studentsView.php");
        } else if (isset($get['edit']) && !isset($post['confirm'])) {
            require("./views/editStudentView.php");
        } else if (isset($get['edit']) && isset($post['confirm'])) {
            $this->editStudent($get['edit']);
            require("./views/studentsView.php");
        } else if (isset($post['createStudent'])) {
            $this->createNewStudent($post);
            $this->getAllDataStudents();
            require("./views/studentsView.php");
        } else{
            require("./views/studentsView.php");
        }
    }


    public function getAllDataStudents()
    {
        $sqlAllDataStudents = $this->databaseLoader->getConnection()->query("SELECT * FROM student_table");
        $allDataStudents = [];
        while ($row = $sqlAllDataStudents->fetch()) {
            $allDataStudents[] = new Student($row['id'], $row['name'], $row['email'], $row['group_id']);

        }
        $this->allStudents = $allDataStudents;
    }

    public function deleteStudent($id)
    {
        $this->databaseLoader->getConnection()->query("DELETE FROM student_table WHERE id = $id");
        echo "TEST DELETE";
    }

    public function createNewStudent($post)
    {
        $name = $post['name'];
        $email = $post['email'];
        $this->databaseLoader->getConnection()->query("INSERT INTO student_table (name, email, group_id) VALUES ('$name','$email', 1)");
    }

}
//$this->allStudents = $allDataStudents;










