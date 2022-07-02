<?php
declare(strict_types=1);

require_once __DIR__ ."/bootstrap.php";

use Controller\ManagerController;

$managerController = new ManagerController();

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $managerController->renderManager();
        break;

    case "POST":
        break;
    default:
        //404;
        break;
}