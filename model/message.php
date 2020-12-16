<?php
class Message{
    private $id;
    private $message;
    private $author;
    private $date;

    public function __construct($id, $message, $date, $author){
        $this->id = $this->setId($id);
        $this->message = $this->setContent($message);
        $this->creationDate = $this->setCreationDate($date);
        $this->authorId = $this->setAuthorId($author);
    }

    // ajoute un message dans la bdd
    static function addMessage($from, $message){
        $db = Database::connectdb();
        $query = $db->prepare("INSERT INTO messages ('id', 'message', 'date', 'author') VALUES (NULL, :message, :date, :author)");
        $query->execute(array(':id'=> $message-> getId()));
    }

    //GETTERS
    // récupérer l'id d'un message
    function getMessageId(){
        return $this->id;
    }

    // récupérer le message
    function getMessage(){
        return $this->message;
    }

    // récupérer la date d'un message
    function getDate(){
        return $this->date;
    }

    // récupérer l'auteur d'un message
    function getMessageAuthor(){
        return $this->author;
    }

    //SETTERS
    function setId($id){
        $this->id = $id;
    }

    function setMessage($message){
        $this->content = $content;
    }

    function setAuthor($user){
        $this->author = $user->getId();
    }

    function setDate($date){
        $this->date = $date;
    }
}

?>