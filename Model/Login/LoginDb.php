<?php

namespace  Model\Login;

class LoginDb
{
    protected $connect;

    public function  __construct($connect)
    {
        $this->connect = $connect;
    }

    public function checkStudent($email, $password)
    {
        $sql = "SELECT * FROM student WHERE email='".$email."' AND password='".$password."'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function checkManager($email, $password)
    {
        $sql = "SELECT * FROM manager WHERE email='".$email."' AND password='".$password."'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

}