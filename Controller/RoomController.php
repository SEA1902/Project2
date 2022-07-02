<?php
namespace Controller;
use Model\Room\RoomDb;
use Model\Database\DBConnect;

class RoomController {
    private $roomDb;
    public function __construct() {
        $db = new DBConnect();
        $this->roomDb = new RoomDb($db->connect());
    }
    
    public function selectBuilding(): void {
        $stmt = $this->roomDb->selectBuilding();
        $_SESSION['building'] = $stmt->fetchAll();
    }
    
    public function selectRoom($bname): void {
        $stmt = $this->roomDb->selectRoom($bname);        
        $_SESSION[$bname] = $stmt->fetchAll();
    }
    
    public function checkCheckinStatus($roomName): void {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $stmt = $this->roomDb->selectTimetable($roomName);
        $curwday = date('l');
        $curtime = date('H:i:s');
        $rcs = $stmt->fetchAll();        
        
        $stmt = $this->roomDb->qtyStudent($roomName);
        $qty = $stmt->fetchAll();

        $stmt = $this->roomDb->getSeat($roomName);
        $seat = $stmt->fetchAll();
        
        $alert = "";
        
        if((int)$qty[0][0] < (int)$seat[0][0]){
            foreach($rcs as $rc){
                if($curwday == $rc[1]){
                    if(($curtime < $rc[2] || $curtime > $rc[3]) && ($curtime > '06:45:00' && $curtime < '17:30:00')){
                        //session_start();
                        $email = $_SESSION['user'][0][3];
                        $this->roomDb->addStudent($email, $roomName);
                        $alert = 'Ban da check in thanh cong!';
                    }else{
                        $alert = 'Khong the check in do dang co lop hoc!';
                    }
                }
            }
        } else{
           $alert = 'Khong the check in do phong hoc da day!'; 
        }
        echo "<script>alert('$alert')</script>";
    }
    
    public function checkCheckoutStatus(): void {
        //session_start();
        $email = $_SESSION['user'][0][3];
        
        $stmt = $this->roomDb->checkStudentInRoom($email);
        $room = $stmt->fetchAll();
        
        $alert = '';
        
        if($room[0][0] == null){
            $alert = 'Ban chua check in vao phong nao!';
        } else {
            $this->roomDb->removeStudent($email);
            $alert = 'Ban da check out thanh cong!';
        }
        echo "<script>alert('$alert')</script>";
    }
}