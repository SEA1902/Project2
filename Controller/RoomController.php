<?php

namespace Controller;

use Model\Database\DBConnect;
use Model\Room\RoomDb;

class RoomController
{
    protected $roomDb;
    public function __construct()
    {
        $db = new DBConnect();
        $this->roomDb = new RoomDb($db->connect());
    }
    public function renderRoomManager()
    {
        include_once ROOT_PATH . '/View/RoomManger.phtml';
    }

    public function getAllBuilding(){
        return $this->roomDb->getAllBuilding();
    }
    public function getBuilding($name){
        return $this->roomDb->getBuilding($name);
    }
    public function getRoomByBuilding($buildID){
        return $this->roomDb->getRoomByBuilding($buildID);
    }

    public function getRoomById($roomID){
        return $this->roomDb->getRoomById($roomID);
    }

    public function getEquipmentByRoomID($roomID){
        return $this->roomDb->getEquipmentByRoomID($roomID);
    }

    public function getAllStudent($roomID){
        return $this->roomDb->getAllStudent($roomID);
    }

    public function updateRoom(){
        if(isset($_POST['update'])){
            $roomID = $_POST['roomID'];
            $name = $_POST['name'];
            $seat = $_POST['seat'];
            $statusRoom = $_POST['statusRoom'];
            $equipments = $this->getEquipmentByRoomID($roomID);
            foreach ($equipments as $equipment){
                $status = $_POST[$equipment['equipID']];
                $this->roomDb->updateEquipment($roomID,$equipment['equipID'], $status);
            }
            $this->roomDb->updateRoom($roomID, $name, $seat, $statusRoom);
            header("Location: RoomManager.php?roomID=$roomID");
        }
    }

}