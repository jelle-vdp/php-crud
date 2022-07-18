<?php

class TeacherController
{
    private DatabaseLoader $databaseLoader;
    private array $allTeachers;

    public function __construct() {
        //Creates the new DatabaseLoader, this is needed to connect to the database
        $this->databaseLoader = new DatabaseLoader();
    }

    public function render($get, $post)
    {
        //Loads all the data of the teachers
        $this->getAllDataTeachers();

        //The following bundle of if statements is also used to switch between views, because we decided to work with confirmation pages

        //if a button was pressed with the method 'create' and all values were set, creates a new Teacher with those values
        if ($post["method"] = "create" && isset($post['name']) && isset($post['email'])) {
            $this->createNewTeacher($post);
            //refreshes the table, gets all new information of the teachers
            $this->getAllDataTeachers();
            require("./views/teacherView.php");
        }
        //If the delete teacher button was pressed, but the delete was not yet confirmed, go to the deleteTeacherView
        else if (isset($post['delete']) && !isset($post['confirm'])) {
            require("./views/deleteTeacherView.php");
        }
        //If delete button was pressed and the delete was also confirmed, deletes the teacher and goes back to teacherView
        else if (isset($post['delete']) && $post['confirm'] === 'true') {
            $this->deleteTeacher($post['delete']);
            $this->getAllDataTeachers();
            require("./views/teacherView.php");
        }
        //if edit button was pressed but the edit was not yet confirmed, go to the editTeacherView
        else if (isset($post['edit']) && !isset($post['confirm'])) {
            require("views/editTeacherView.php");
        }
        //If edit button was pressed and the edit was also confirmed, edits the teacher and goes back to teacherView
        else if (isset($post['id']) && isset($post['rename']) && isset($post['email'])) {
            $this->editTeacher($post['id'], $post['rename'], $post['email']);
            $this->getAllDataTeachers();
            require("views/teacherView.php");
        }
        //in all other instances, shows teacherView
        else {
            require("./views/teacherView.php");
        }
    }

    //gets all the data in the table of teacher_table
    public function getAllDataTeachers () {
        //the query that is used to get all the data
        $sqlAllDataTeachers = $this->databaseLoader->getConnection()->query("SELECT * FROM teacher_table");
        //creates an array which will be used in the view
        $allDataTeachers = [];
        //for every row in the table, creates a new Teacher that has the same properties
        while ($row = $sqlAllDataTeachers->fetch()){
            //pushes all new Teachers in the array we previously made
            $allDataTeachers[] = new Teacher ($row['id'], $row['name'], $row['email']);
        }
        $this->allTeachers = $allDataTeachers;
    }
    //function that creates a new teacher, data from the $post is needed here so it gets passed
    public function createNewTeacher ($post) {
        $name = $post['name'];
        $email = $post['email'];
        $this->databaseLoader->getConnection()->query("INSERT INTO teacher_table VALUES ( id ,'$name', '$email')");
    }
    //function that deletes selected teacher according to id
    public function deleteTeacher($id)
    {
        $this->databaseLoader->getConnection()->query("DELETE FROM teacher_table WHERE id = $id");
    }
    //edits information of teacher according to user input
    public function editTeacher($id, $rename, $email){
        $id = intval($id);
        $query = "UPDATE teacher_table SET name = '$rename', email = '$email' WHERE id = $id";
        $preparedQuery = $this->databaseLoader->getConnection()->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $preparedQuery->execute();
    }
}



