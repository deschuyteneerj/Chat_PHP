<?php
        require('model/chat.php');
        require('model/database.php');
        require('model/message.php');
        require('model/user.php');

    function login(){

        //$login= authenticateUser();
    
        require('view/login.php');
    }

    function subscribe(){
        
        if (isset($_POST['username'], $_POST['password'])){
            $subscribe= createUser($_POST['username'], $_POST['password']);
        }
        require('view/subscribe.php');
    }

    function chat(){
        $chat = Chat::display10LastMessages();
        foreach($chat as $msg) {
            $users[] = User::getUserById($msg['author']);
        }
        require('view/chat.php');
    }