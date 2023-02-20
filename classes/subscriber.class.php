<?php
require_once('dbConfig.class.php');

class subscriber extends connect{

    //insert data in database
    public function insertSubscribers($name,$address,$phoneNumber,$startDate,$expiryDate,$discount,$totalAmount,$planId){
        $sql = "INSERT INTO `subscribers`(`name`, `address`, `phoneNumber`, `startDate`, `expiryDate`,`discount`,`totalAmount`,`planId`) 
        VALUES (?,?,?,?,?,?,?,?)";

        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$address);
        $stmt->bindValue(3,$phoneNumber);
        $stmt->bindValue(4,$startDate);
        $stmt->bindValue(5,$expiryDate);
        $stmt->bindValue(6,$discount);
        $stmt->bindValue(7,$totalAmount);
        $stmt->bindValue(8,$planId);
        $stmt->execute();
    
    }

    //delete data in database using id
    public function deleteSubscribersId($id){
        $sql = "DELETE FROM `subscribers` WHERE id = ?";
        $stmt = self::$db->prepare($sql);

        $stmt->bindValue(1,$id);
        $stmt->execute();
    }

    //update data in database using id
    public function updateSubscribersId($name,$address,$phoneNumber,$id){
        $sql = "UPDATE `subscribers` SET `name`=?,`address`=?,`phoneNumber`=?
         WHERE id = ?";

        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$address);
        $stmt->bindValue(3,$phoneNumber);
        $stmt->bindValue(4,$id);

        $stmt->execute();
    }

    //fetch all Subscribers data from database
    public function fetchSubscribers(){
        $sql = "SELECT `id`,`name`,`address`,`phoneNumber` FROM `subscribers`";        
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(!$result == null){
            return $result;
        }else{
            return [];
        }
        
    }

    //fetch all Subscriptions data from database
    public function fetchSubscriptions(){

        $sql = "SELECT subscribers.id,subscribers.name AS 'Subscriber name',plans.name AS 'Plan name',
        plans.price,subscribers.startDate
        ,subscribers.expiryDate,subscribers.discount,subscribers.totalAmount 
        FROM `subscribers` INNER JOIN `plans` ON subscribers.planId = plans.id";  

        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(!$result == null){
            return $result;
        }else{
            return [];
        }
        
    }

    //generate PDF Subscription invoice using id
    public function fetchInvoiceSubscriptionsId($id){

        $sql = "SELECT subscribers.id,subscribers.name AS 'Subscriber name',plans.name AS 'Plan name',
        plans.price,subscribers.startDate
        ,subscribers.expiryDate,subscribers.discount,subscribers.totalAmount 
        FROM `subscribers` INNER JOIN `plans` ON subscribers.planId = plans.id WHERE subscribers.id = ?";  

        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(!$result == null){
            return $result;
        }else{
            return [];
        }
        
    }

    //fetch Subscribers data from database using id
    public function fetchSubscribersId($id){
        $sql = "SELECT * FROM `subscribers` WHERE `id` = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

   
}
