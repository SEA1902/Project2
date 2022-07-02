<?php

namespace Model\Manager;

class Manager
{
    protected $id;
    protected $email;
    protected $password;
    protected $name;
    protected $phone;

    public function __construct($email, $password, $name, $phone)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }
}