<?php

namespace Controller;

use Model\Database\DBConnect;
use Model\Login\LoginDb;

class LoginController
{
    protected $loginDb;

    public function __construct()
    {
        $db = new DBConnect();
        $this->loginDb = new LoginDb($db->connect());
    }

    public function renderLogin()
    {
        include_once ROOT_PATH . '/View/Login.phtml';
    }

    public function checkStudent(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $stmt = $this->loginDb->checkStudent($email, $password);
        $count = $stmt->rowCount();

        if($count > 0){
            session_start();
            $_SESSION['user'] = $stmt->fetchAll();
            header('Location: Student.php');exit;
        }else{
            $err = "Email hoặc mật khẩu không chính xác";
            session_start();
            $_SESSION["err"]= $err;
//                var_dump($_SESSION["err"]);exit;
            header('Location: Login.php');exit;
        }
    }

    public function checkManager(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $stmt = $this->loginDb->checkManager($email, $password);
        $count = $stmt->rowCount();

        if($count > 0){
            session_start();
            $_SESSION['user'] = $stmt->fetchAll();
            header('Location: Manager.php');exit;
        }else{
            $err = "Email hoặc mật khẩu không chính xác";
            session_start();
            $_SESSION["err"]= $err;
//                var_dump($_SESSION["err"]);exit;
            header('Location: Login.php');exit;
        }
    }
}