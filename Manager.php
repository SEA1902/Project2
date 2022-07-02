<?php
declare(strict_types=1);

require_once __DIR__ ."/bootstrap.php";

use Controller\ManagerController;

$managerController = new ManagerController();
$roomController = new \Controller\RoomController();

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $managerController->renderManager();
        break;

    case "POST":
//        $roomController->updateRoom();
        break;
    default:
        //404;
        break;
}