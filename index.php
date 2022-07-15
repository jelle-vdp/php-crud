<?php
    declare(strict_types=1);

    require ('vendor/autoload.php');
    require ('models/Group.php');
    require ('models/Teacher.php');
    require ('models/Student.php');
    require ('models/DatabaseLoader.php');

    require ('controllers/StudentsController.php');
    require ('controllers/GroupsController.php');
    require ('controllers/TeacherController.php');

    new DatabaseLoader();

    $controller = new StudentsController();
    
    if (isset($_GET['page']) && $_GET['page'] === 'groups') {
        $controller = new GroupsController();
    } else if (isset($_GET['page']) && $_GET['page'] === 'students') {
        $controller = new StudentsController();
    } else if (isset($_GET['page']) && $_GET['page'] === 'teachers') {
        $controller = new TeacherController();
    } else if (isset($_GET['page']) && $_GET['page'] === 'teachers') {
        $controller = new TeacherController();
    } 

    $controller->render($_GET, $_POST);
    var_dump($_POST);