<?php
class connect
{

    private static $DB_HOST = 'localhost';
    private static $DB_USER = 'root';
    private static $DB_PASS = '';
    private static $DB_NAME = 'gymSystem';
    public static $db;



    public function __construct()
    {

        try {
            self::$db = new PDO("mysql:host=" . self::$DB_HOST . ";dbname=" . self::$DB_NAME, self::$DB_USER, self::$DB_PASS);
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }

    //get number of rows from table
    public function numberOfTableRows($table)
    {

        try {
            $sql = "SELECT COUNT(*) FROM " . $table;
            $stmt = self::$db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}
