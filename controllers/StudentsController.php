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


}