<?php
require_once("dbConfig.class.php");

class plan extends connect{

    //insert data in database
    public function insertPlan($name,$about,$price){
        $sql = "INSERT INTO `plans` (`name`,`about`,`price`) VALUES (?,?,?)";

        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$about);
        $stmt->bindValue(3,$price);
        $stmt->execute();
        

    }

    //update data in database using id
    public function updatePlansId($name,$about,$price,$id){
        $sql = "UPDATE `plans` SET `name`=?,`about`=?,`price`=? WHERE `id` = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$about);
        $stmt->bindValue(3,$price);
        $stmt->bindValue(4,$id);

        $stmt->execute();
    }

    //delete data in database using id
    public function deletePlansId($id){
        $sql = "DELETE FROM `plans` WHERE id = ?";
        $stmt = self::$db->prepare($sql);

        $stmt->bindValue(1,$id);
        $stmt->execute();
    }

    //fetch all Plans data from database
    public function fetchPlans(){
        $sql = "SELECT * FROM `plans`";
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(!$result == null){
            return $result;
        }else{
            return [];
        }
        
    }

    //fetch Plans data from database using id
    public function fetchPlansId($id){
        $sql = "SELECT * FROM `plans` WHERE `id` = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
