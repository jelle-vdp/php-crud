<?php
    declare(strict_types=1);

    require ('vendor/autoload.php');
    require 'models/Student.php';
    require 'models/Group.php';
    require 'models/Coach.php';

    require 'controllers/StudentsController.php';
    require 'controllers/GroupsController.php';
    require 'controllers/CoachesController.php';

    $controller = new StudentsController();
    
    if (isset($_GET['page']) && $_GET['page'] === 'groups') {
        $controller = new GroupsController();
    } else if (isset($_GET['page']) && $_GET['page'] === 'students') {
        $controller = new StudentsController();
    } else if (isset($_GET['page']) && $_GET['page'] === 'coaches') {
        $controller = new CoachesController();
    } 

    $controller->render($_GET, $_POST);