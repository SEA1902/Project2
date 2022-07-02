<?php

namespace Model\Database;

use PDO;
use PDOException;

class DBConnect
{
    protected $dns;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dns = 'mysql:host=localhost;dbname=classroom_management';
        $this->username = 'root';
        $this->password = '';
    }

    public function connect()
    {
        try {
            return new PDO($this->dns, $this->username, $this->password);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}