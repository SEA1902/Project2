<?php
declare(strict_types=1);

require_once __DIR__ ."/bootstrap.php";

use Controller\StudentController;
use Controller\RoomController;

$studentController = new StudentController();

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        session_start();        
        if(isset($_GET['rooms'])){
            $roomList = $_GET['rooms'];
            $roomController = new RoomController();
            $roomController->selectRoom($roomList);
        }
        $studentController->renderStudent();
        break;

    case "POST":
        session_start();
        if(isset($_POST['roomName'])){
            $roomName = $_POST['roomName'];
            $roomController = new RoomController();
            $roomController->checkCheckinStatus($roomName);
            $studentController->renderStudent();
        }
        
        if(isset($_POST['outRoom'])){
            $out = $_POST['outRoom'];
            $roomController = new RoomController();
            $roomController->checkCheckoutStatus();
            $studentController->renderStudent();
        }
        break;
    default:
        //404;
        break;
}

