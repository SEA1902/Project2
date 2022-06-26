<?php

namespace Controller;

use Model\Database\DBConnect;
use Model\Student\StudentDb;

class StudentController
{
    protected $studentDb;
    public function __construct()
    {
        $db = new DBConnect();
        $this->studentDb = new StudentDb($db->connect());
    }
    public function renderStudent()
    {
        include_once ROOT_PATH . '/View/Student.phtml';
    }

}