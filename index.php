<?php
declare(strict_types=1);

ini_set("display_errors", "1");

require __DIR__  . "/bootstrap.php";
use Controller\LoginController;
$loginController = new LoginController();
$managerController = new \Controller\ManagerController();
switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $managerController->renderManager();
        break;

    case "POST":
//        $deviceController->add();
        break;
    default:
        //404;
        break;
}