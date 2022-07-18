<?php
    declare(strict_types=1);


    require ('vendor/autoload.php');

    // including all models
    require ('models/Group.php');
    require ('models/Teacher.php');
    require ('models/Student.php');
    require ('models/DatabaseLoader.php');

    // including all controllers
    require ('controllers/StudentsController.php');
    require ('controllers/GroupsController.php');
    require ('controllers/TeacherController.php');

    // instantiation of our base database controller
    new DatabaseLoader();

    // ROUTING
    // if no route selected yet, load the students controller
    $controller = new StudentsController();
    
    // if a route is selected, load the corresponding controller
    if (isset($_GET['page']) && $_GET['page'] === 'groups') {
        $controller = new GroupsController();
    } else if (isset($_GET['page']) && $_GET['page'] === 'students') {
        $controller = new StudentsController();
    } else if (isset($_GET['page']) && $_GET['page'] === 'teachers') {
        $controller = new TeacherController();
    }

    // render a view based on the chosen controller
    $controller->render($_GET, $_POST);
