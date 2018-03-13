<?php

Class DB_connection
{
    private static $dsn = "mysql:host=localhost;dbname=quidditch_dynasty";
    private static $user = "root";
    private static $pass = "";
    private static $db;

    function __construct(){}

    public static function getDB(){
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$user, self::$pass);
            } catch (PDOException $e) {
                return $e->getMessage();
                exit();
            }
        }
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return self::$db;
    }
}