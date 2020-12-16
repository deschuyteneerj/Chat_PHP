<?php
class Database{
    private $servername = "localhost";
    private $username = "root";
    private $password = "Password_1";
    private $dbname = "chat_php";

    // Usage:   $db = connectdb($dbHost, $dbName, $dbUsername, $dbPassword);
    // Pre:     $servername is the database hostname, 
    //          $dbname is the name of the database itself,
    //          $username is the username to access the database,
    //          $password is the password for the user of the database.
    // Post:    $db is a PDO connection to the database, based on the input parameters.
    static function connectdb(){ 
        try {
            $db = new PDO("mysql:host=localhost;dbname=chat_php;port=3306", "root", "Password_1");
            return $db;
        }
        catch(PDOException $e){
            throw "Connection failed: " .$e->getMessage();
        }
    }
}
?>