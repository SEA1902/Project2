<?php

namespace  Model\Room;

class RoomDb {
    protected $connect;

    public function  __construct($connect) {
        $this->connect = $connect;
    }
    
    public function selectBuilding() {
        $sql = "SELECT DISTINCT(location) FROM classroom";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    
    
    public function selectRoom($bname) {
        $sql = "SELECT * FROM classroom WHERE location = '".$bname."'";
        $stmt = $this->connect->prepare($sql);       
        $stmt->execute();
        return $stmt;
    }
    
    public function checkStudentInRoom($email){
        $sql = "SELECT roomID from student WHERE email = '".$email."'";
        $stmt = $this->connect->prepare($sql);       
        $stmt->execute();
        return $stmt;
    }
    
    public function selectTimetable($roomName) {
        $sql = "SELECT ct.roomID, weekday, time_start, time_end ". 
               "FROM classroom_timetable as ct, classroom as c ".
               "WHERE ct.roomID = c.roomID AND c.name = '".$roomName."'";
        $stmt = $this->connect->prepare($sql);       
        $stmt->execute();
        return $stmt;
    }
    
    public function qtyStudent($roomName) {
        $sql = "SELECT COUNT(studentID) ".
               "FROM student as st, classroom as c ".
               "WHERE c.roomID = st.roomID AND c.name = '".$roomName."'";
        $stmt = $this->connect->prepare($sql);       
        $stmt->execute();
        return $stmt;
    }
    
    public function getSeat($roomName) {
        $sql = "SELECT seat FROM classroom WHERE name = '".$roomName."'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    
    public function addStudent($email, $roomName){
        $sql = "UPDATE student SET roomID = (SELECT roomID FROM classroom WHERE classroom.name = '".$roomName."') ".
               "WHERE email = '".$email."'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
    }
    
    public function removeStudent($email) {
        $sql = "UPDATE student SET roomID = NULL ".
               "WHERE email = '".$email."'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
    }
    
    
    
   public function getAllBuilding(){
        $sql = "SELECT * FROM building";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getBuilding($name){
        $sql = "SELECT * FROM building WHERE name = '$name'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getRoomByBuilding($buildID){
        $sql = "SELECT * FROM classroom WHERE buildID='$buildID'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getRoomById($roomID){
        $sql = "SELECT * FROM classroom WHERE roomID='$roomID'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getEquipmentByRoomID($roomID){
        $sql = "SELECT equipment.equipID, equipment.name, classroom_equipment.status
                FROM equipment JOIN classroom_equipment ON equipment.equipID=classroom_equipment.equipID
                WHERE classroom_equipment.roomID = '$roomID'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getAllStudent($roomID){
        $sql = "SELECT*
                FROM student
                WHERE student.roomID = '$roomID'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function updateEquipment($roomID, $equipID, $status){
        $sql = "UPDATE classroom_equipment SET status='$status' WHERE equipID = '$equipID' AND roomID='$roomID'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
    }

    public function updateRoom($roomID, $name, $seat, $status){
        $sql = "UPDATE classroom SET name='$name', seat='$seat', status = '$status' WHERE roomID = '$roomID'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
    }

}