<?php

class CoachesController
{
    private DatabaseLoader $databaseLoader;

    public function __construct() {
        $this->databaseLoader = new DatabaseLoader();
    }

    public function getAllDataCoaches () {
        $sqlAllDataCoaches = $this->databaseLoader->getConnection()->query("SELECT * FROM teacher_table");
        $allDataCoaches = [];
        while ($row = $sqlAllDataCoaches->fetch()){
            $allDataCoaches[] = new Coach($row[0], $row[1], $row[2]);
        }
    }

    public function render($get, $post)
    {
        require("views/coachesView.php");
    }
}
