<?php

class Client extends DB
{
    private $table = "client";
    private $conn; 

    public function __construct()
    {
        $this->conn = $this->connect();
        
    }
    public function getAllClients()
    {
        $query = "SELECT * FROM $this->table ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addClient($prenom, $nom, $age, $profession, $reference )
    {
        $query = "INSERT INTO $this->table SET prenom=:prenom,nom=:nom,age=:age, profession=:profession, reference=:reference";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':prenom',$prenom);
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':age',$age);
        $stmt->bindParam(':profession',$profession);
        $stmt->bindParam(':reference',$reference);

        $stmt->execute();
        return $stmt;
    }

    public function getClient($reference)
    {
        $query = "SELECT * FROM $this->table WHERE reference=:reference ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':reference',$reference);

        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getClientByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE idClient =:id ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$id);

        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}