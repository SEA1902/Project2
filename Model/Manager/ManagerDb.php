<?php

namespace  Model\Manager;

class ManagerDb
{
    protected $connect;

    public function  __construct($connect)
    {
        $this->connect = $connect;
    }

}