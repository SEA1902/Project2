<?php
declare(strict_types=1);

require_once __DIR__ ."/bootstrap.php";

use Controller\RoomController;

$roomController = new RoomController();

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $roomController->renderRoomManager();
        break;

    case "POST":
        $roomController->updateRoom();
        break;
    default:
        //404;
        break;
}