<?php
require_once("dbConfig.class.php");

class admin extends connect
{

    public function insertAdmin($name, $email, $password, $address, $phoneNumber, $role)
    {

        //insert data in database
        $sql = "INSERT INTO `admins`(`name`, `email`, `password`, `address`, `phoneNumber`, `role`) 
        VALUES (?,?,?,?,?,?)";

        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $password);
        $stmt->bindValue(4, $address);
        $stmt->bindValue(5, $phoneNumber);
        $stmt->bindValue(6, $role);
        $stmt->execute();
    }


    //delete data in database using id
    public function deleteAdminId($id)
    {
        $sql = "DELETE FROM `admins` WHERE id = ?";
        $stmt = self::$db->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


    //update data in database using id
    public function updateAdminId($name, $email, $address, $phoneNumber, $role, $id)
    {
        $sql = "UPDATE `admins` SET `name`=?,`email`=?,`address`=?,`phoneNumber`=?,`role`=? WHERE `id` = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $address);
        $stmt->bindValue(4, $phoneNumber);
        $stmt->bindValue(5, $role);
        $stmt->bindValue(6, $id);

        $stmt->execute();
    }

    //update admin password using id
    public function updatePassword($newPassword, $id)
    {
        $sql = "UPDATE `admins` SET `password` = ? WHERE `id` = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1, $newPassword);
        $stmt->bindValue(2, $id);

        $stmt->execute();
    }

    //fetch all admin data from database
    public function fetchAdmins()
    {
        $sql = "SELECT * FROM `admins`";
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (!$result == null) {
            return $result;
        } else {
            return [];
        }
    }


    //fetch admin data from database using id
    public function fetchAdminId($id)
    {
        $sql = "SELECT * FROM `admins` WHERE `id` = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


    //login function
    public function login($email, $password)
    {
        $sql = "SELECT * FROM `admins` WHERE email = ?";
        /*
            -first Comparison between the email from user and the email in database.
            -after that if is exist it will comparison between the password from user and the password
            in database because the password is encrypt using password_verify function.
        */
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count > 0) { 
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //comparison between the password from user and the password in database.
                if (password_verify($password, $row['password'])) {
                    $_SESSION['name'] = $row['name'];//store the email and role in session.
                    $_SESSION['role'] = $row['role'];
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }


    //check if email exists 
    public function existsEmail($email)
    {
        $sql = 'SELECT * FROM `admins` WHERE email = ?';
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
