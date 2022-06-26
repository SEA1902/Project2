<?php

namespace Controller;

use Model\Database\DBConnect;
use Model\Manager\ManagerDb;

class ManagerController
{
    protected $managerDb;
    public function __construct()
    {
        $db = new DBConnect();
        $this->managerDb = new ManagerDb($db->connect());
    }
    public function renderManager()
    {
        include_once ROOT_PATH . '/View/Manager.phtml';
    }

}