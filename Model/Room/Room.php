<?php

namespace Model\Room;

class Room
{
    protected $roomID;
    protected $name;
    protected $floor;
    protected $buildID;
    protected $seat;
    protected $status;

    public function __construct($name, $floor, $buildID, $seat, $status)
    {
        $this->$name = $name;
        $this->floor = $floor;
        $this->buildID = $buildID;
        $this->seat = $seat;
        $this->status = $status;
    }

    public function getRoomID()
    {
        return $this->roomID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getFloor()
    {
        return $this->floor;
    }

    public function setFloor($floor): void
    {
        $this->floor = $floor;
    }

    public function getBuildID()
    {
        return $this->buildID;
    }

    public function setBuildID($buildID): void
    {
        $this->buildID = $buildID;
    }
    public function getSeat()
    {
        return $this->seat;
    }

    public function setSeat($seat): void
    {
        $this->seat = $seat;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }
}