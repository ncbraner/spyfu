<?php
namespace Ecreativeworks\Spyfu\lib;
use PDO, PDOException;
class DB{

//variable to hold connection object.
    protected static $db;

    private function __construct() {
        $hostname = getenv('DBHOST');
        $dbName = getenv('DBNAME');
        $username = getenv('DBUSER');
        $password = getenv('DBPASS');
        try {
            self::$db = new PDO( "mysql:host={$hostname};dbname={$dbName}", $username, $password);
            self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }

    public static function getConnection() {

        if (!self::$db) {
            new DB();
        }
        return self::$db;
    }
}