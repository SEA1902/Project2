<?php
declare(strict_types=1);

require_once __DIR__ ."/bootstrap.php";

use Controller\LoginController;

$loginController = new LoginController();

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $loginController->renderLogin();
        break;

    case "POST":
        if($_POST["person"] == 0) $loginController->checkStudent();
        else $loginController->checkManager();
        break;
    default:
        //404;
        break;
}