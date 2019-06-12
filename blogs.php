<?php

require_once 'db.php';

class blogs extends db
{
    private $blog_id, $omschrijving, $datum, $bericht;
    
    // opvragen alle blogs
    public function getAllData($table = null){
        $a = "SELECT * FROM ".$table ;
        $stmt = $this->conn->prepare($a); 
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //var_dump($stmt->fetchAll());
        return $stmt->fetchAll();
    }

     // vraag blog op door een id mee te geven
     public function getDataById($table = null, $blog_id = null){
        $stmt = $this->conn->prepare("SELECT * FROM ".$table." WHERE blog_id ='".$blog_id."'"); 
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $events = $stmt->fetchAll();
        return $events[0];
    }

    // verwijder blog door meegeven van id
    public function deleteDataById($table = null, $blog_id = null){
        $stmt = $this->conn->prepare("DELETE FROM ".$table." WHERE blog_id =".$blog_id); 
        $stmt->execute();
    }
   
    // Invoegen nieuw blog
    public function insertData($table = null, $datum=null, $titel=null, $bericht = null){
        $stmt = $this->conn->prepare("INSERT INTO ".$table." (`datum`, `titel`, `bericht`) VALUES ('".$datum."','".$titel."','".$bericht."')");
        $stmt->execute();
    }

    // updaten van gestaand blog adhv id
    public function updateData($table = null, $blog_id=null, $datum=null, $titel=null, $bericht = null){
        $stmt = $this->conn->prepare("UPDATE ".$table." SET `datum` = '".$datum."', `titel` = '".$titel."', `bericht` = '".$bericht."' WHERE blog_id = ".$blog_id."");
        $stmt->execute();
    }

}


