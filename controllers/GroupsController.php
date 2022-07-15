<?php

class GroupsController {
    private DatabaseLoader $databaseLoader;
    private array $allGroups;

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

    public function getAllGroups(){
        return $this->allGroups;
    }

    public function render($get, $post)
    {
        $this->getAllDataGroups();

        require("views/groupsView.php");
    }
}