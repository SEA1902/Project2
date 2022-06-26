<?php

namespace  Model\Student;

class StudentDb
{
    protected $connect;

    public function  __construct($connect)
    {
        $this->connect = $connect;
    }

}