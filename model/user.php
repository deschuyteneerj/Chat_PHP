<?php
class User{
    private $id;
    private $username;
    private $password;

    function __constructor($username, $password){
        $this->username=$username;
        $this->password=$password;
        $this->authenticateUser($username, $password);
    }

    static function createUser($username, $password){
        $this->username = $username;
        $this->password =  $password;
        $db = Database::connectdb();
        $query = $db->prepare("INSERT INTO users ('id', 'username', 'password') VALUES (NULL, '$username', '$password');");
        $data = $query->execute();
    }

    // Usage:   authenticateUser($username, $password);
    // Pre:     $db has already been defined and is a reference
    //          to a PDO connection.
    //          $username is of type string.
    //          $password is of type string.
    // Post:    $user exists and has been granted a session that declares
    //          the fact that he is logged in.
    function authenticateUser($username, $password){
        $userExists = userExists($username, $password); // Check if user exists with that username.
        
        if(!($userExists)){
        // User not found. 
        // Create warning message. 
        $notFound= "User not found.";
        session_start(); 
        $_SESSION['warningMessage'] = $notFound;
        }else{
            $passwordMatch = $password;

            // The user exists and he entered the correct password.
            session_start();
            $_SESSION['isLoggedIn'] = true; 
            // Whatever more you want to do.
        } 
    }

    function userExists($username, $password){
        $db = Database::connectdb();
        $query = $db->prepare("SELECT * FROM users WHERE username = :username AND password= :password;");
        $query->execute(array(":username"=>$username, ":password"=>$password));
        $result = $query->fetch();
        if($result)
        {
        // User exists.
        $this->id = $result['id'];
        return true; 
        }
        // User doesn't exist.
        return false;
    }

    function disconnectUser(){
        unset($_SESSION);
        session_destroy();
    }

    static function getUserById($id){
        $db = Database::connectdb();
        $query = $db->prepare("SELECT * FROM users WHERE id= :id;");
        $query->execute(array(":id"=>$id));
        return $result = $query->fetch();
    }

    //GETTERS
    function getUserId(){
        return $this->id;
    }

    function getUsername(){
        return $this->username;
    }

    private function getUserPassword(){
        return $this->password;
    }

    //SETTERS
    function setUserId($id){
        $this->id = $id;
    }

    function setUsername($username){
        $this->username = $username;
    }
    
    function setUserPassword($password){
        $this->password = sha1($password);
    }
}