<?php

namespace Model\Room;

class RoomController {
    private $id;
    private $name;
    private $location;
    private $status;
    public function __construct($id) {
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id;
    }
    public function setId($id): void{
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name): void{
        $this->name = $name;
    }
    public function getLocation(){
        return $this->location;
    }
    public function setLocation($location): void{
        $this->location = $location;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status): void{
        $this->status = $status;
    }
}

