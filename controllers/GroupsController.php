<?php

class GroupsController {
    private DatabaseLoader $databaseLoader;
    private array $allGroups;
    private array $allTeachers;

    public function __construct(){
        $this-> databaseLoader = new DatabaseLoader();
    }

    public function getAllDataGroups(){
        $sqlAllDataGroups = $this->databaseLoader->getConnection()->query("SELECT * FROM group_table");
        $allDataGroups = [];
        while ($row = $sqlAllDataGroups->fetch()){
            array_push($allDataGroups, new Group($row['id'], $row['name'], $row['location'], $row['teacher_id']));
        }
        $this->allGroups = $allDataGroups;
    }

    public function getAllDataTeachers () {
        $sqlAllDataTeachers = $this->databaseLoader->getConnection()->query("SELECT * FROM teacher_table");
        $allDataTeachers = [];
        while ($row = $sqlAllDataTeachers->fetch()){
            $allDataTeachers[] = new Teacher ($row['id'], $row['name'], $row['email']);
        }
        $this->allTeachers = $allDataTeachers;
    }

    public function getAllGroups(){
        return $this->allGroups;
    }

    public function getAllTeachers(){
        return $this->allTeachers;
    }

    public function deleteGroup($id){
        $this->databaseLoader->getConnection()->query("UPDATE student_table SET group_id = NULL WHERE group_id = $id");
        $this->databaseLoader->getConnection()->query("DELETE FROM group_table WHERE id = $id");
    }

    public function editGroup($id, $rename, $location, $teacherId){
        $teacherId = intval($teacherId);
        $id = intval($id);

        $query = "UPDATE group_table SET name = '$rename', location = '$location', teacher_id = $teacherId WHERE id = $id";
        $preparedQuery = $this->databaseLoader->getConnection()->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $preparedQuery->execute();
    }

    public function createGroup ($get) {
        $groupName = $get['group-name'];
        $groupLocation = $get['group-location'];
        $groupTeacher = $get['group-teacher'];

        $preparedQuery = $this->databaseLoader->getConnection()->prepare("INSERT INTO group_table VALUES (id, '$groupName', '$groupLocation', '$groupTeacher')", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $preparedQuery->execute();
    }

    public function render($get, $post) {
        $this->getAllDataGroups();
        if (!isset($get['delete']) && !isset($get['edit']) && !isset($get['class']) && !isset($get['teacher']) && !isset($get['group-new'])) {
            $this->getAllDataTeachers();
            require("views/groupsView.php");
        } else if (isset($get['class'])) {
            require("views/individualGroupView.php");
        } else if (isset($get['group-new'])) {
            $this->createGroup($get);
            $this->getAllDataTeachers();
            $this->getAllDataGroups();
            require("views/groupsView.php");
        } else if (isset($get['delete']) && !isset($get['confirm'])) {
            require("views/deleteGroupView.php");
        } else if (isset($get['edit']) && !isset($get['confirm'])) {
            $this->getAllDataTeachers();
            require("views/editGroupView.php");
        } else if (isset($get['delete']) && isset($get['confirm'])) {
            $this->deleteGroup($get['delete']);
            $this->getAllDataGroups();
            require("views/groupsView.php");
        } else if (isset($get['group-id']) && isset($get['rename']) && isset($get['location']) && isset($get['teacher'])) {
            $this->editGroup($get['group-id'], $get['rename'], $get['location'], $get['teacher']);
            $this->getAllDataGroups();
            require("views/groupsView.php");
        }
    }
}