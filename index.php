<?php
declare(strict_types=1);

require 'models/Students.php';
require 'models/Groups.php';

require 'controllers/StudentsController.php';
require 'controllers/GroupsController.php';


$controller = new StudentsController();
if(isset($_GET['page']) && $_GET['page'] === 'groups') {
    $controller = new GroupsController();
}

$controller->render($_GET, $_POST);