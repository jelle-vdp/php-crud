<?php

class StudentsController {
    private DatabaseLoader $databaseLoader;
    private array $allStudents;

    public function __construct(){
        $this-> databaseLoader = new DatabaseLoader();
    }

     public function render($get, $post)
     {
         $this->getAllDataStudents();
         $this ->deleteStudent();






         require("views/studentsView.php");
     }


public function getAllDataStudents(){
    $sqlAllDataStudents = $this->databaseLoader->getConnection()->query("SELECT * FROM student_table");
    $allDataStudents = [];
    while ($row = $sqlAllDataStudents->fetch()){
        $allDataStudents[]= new Student($row['id'], $row['name'], $row['email'], $row['group_id']);

     }
     $this->allStudents = $allDataStudents;
     }

public function deleteStudent(
){
        $id = $post['id'];

        if (isset($_POST["delete"]){
        require("./views/deleteStudentsView.php");
            if (isset($_POST["confirm"]){
                $this->databaseLoader->getConnection()->query("DELETE FROM student_table WHERE id = $id");

           }



     }
     $this->allStudents = $allDataStudents;
     }











public function deleteGroup($id){
    $this->databaseLoader->getConnection()->query("UPDATE student_table SET group_id = NULL WHERE group_id = $id");
    $this->databaseLoader->getConnection()->query("DELETE FROM group_table WHERE id = $id");


    public function render($get, $post) {
        if (!isset($get['delete']) && !isset($get['edit'])) {
            $this->getAllDataGroups();
            require("views/groupsView.php");
        } else if (isset($get['delete']) && !isset($get['confirm'])) {
            $this->getAllDataGroups();
            require("views/deleteGroupView.php");
        } else if (isset($get['edit']) && !isset($get['confirm'])) {
            $this->getAllDataGroups();
            require("views/editGroupView.php");
        } else if (isset($get['delete']) && isset($get['confirm'])) {
            $this->deleteGroup($get['delete']);
            $this->getAllDataGroups();
            require("views/groupsView.php");
        } else if (isset($get['edit']) && isset($get['confirm'])) {
            $this->editGroup($get['edit']);
            $this->getAllDataGroups();
            require("views/groupsView.php");
        }
    }

    Bericht sturen naar Jelle, Besart





}
}