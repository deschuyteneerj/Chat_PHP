<?php
class Chat{

    static function display10LastMessages(){
        $db = Database::connectdb();
        $query = $db->prepare("SELECT * FROM messages ORDER BY id DESC LIMIT 10");
        $query->execute();
        while ($d=$query->fetch()){
            $array[]=$d;
        }
        return $array; //renvoie tableau avec le résultat des 10 derniers messages
    }

    function addMessage($from, $message){
        Message::addMessage($from, $message);
    }
}
?>