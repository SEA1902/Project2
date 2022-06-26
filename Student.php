<?php
declare(strict_types=1);

require_once __DIR__ ."/bootstrap.php";

use Controller\StudentController;

$studentController = new StudentController();

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $studentController->renderStudent();
        break;

    case "POST":
        break;
    default:
        //404;
        break;
}