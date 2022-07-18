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
        } else if (isset($post['edit']) && !isset($post['confirm'])) {
            require("./views/editStudentView.php");
        } else if (isset($post['editStudent'])) {
            $this->editStudent($post['student-id'],$post['name'],$post['email'],1);
            $this->getAllDataStudents();
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
    }

    public function createNewStudent($post)
    {
        $name = $post['name'];
        $email = $post['email'];
        $this->databaseLoader->getConnection()->query("INSERT INTO student_table (name, email, group_id) VALUES ('$name','$email', 1)");
    }

    public function editStudent($id, $name, $email, $groupId){

        $id = intval($id);
        $groupId = intval($groupId);

        $query = "UPDATE student_table SET name = '$name', email = '$email', group_id = $groupId WHERE id = $id";
        $preparedQuery = $this->databaseLoader->getConnection()->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $preparedQuery->execute();
    }

}
//$this->allStudents = $allDataStudents;










