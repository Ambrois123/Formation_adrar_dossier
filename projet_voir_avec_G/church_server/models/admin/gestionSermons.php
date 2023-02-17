<?php

require_once "config/Database.php";

class GestionSermons extends Database
{
    public function getSermons() 
    {
        $req = "SELECT * FROM sermons";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $sermons = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sermons;
    }

    public function deleteSermon($idSermon) 
    {
        $req = "DELETE FROM sermons WHERE id = :idSermon";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue("idSermon",$idSermon,PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updateSermon($idSermon,$date,$title,$resume,$audioFile,$author) 
    {
        $req = "UPDATE sermons
        SET date =:date, title = :title, resume = :resume, audio_fil =:audioFile, author =:author
        WHERE id = :idSermon
        ";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idSermon",$idSermon,PDO::PARAM_INT);
        $stmt->bindValue(":date",$date,PDO::PARAM_STR);
        $stmt->bindValue(":title",$title,PDO::PARAM_STR);
        $stmt->bindValue(":resume",$resume,PDO::PARAM_STR);
        $stmt->bindValue(":audioFile",$audioFile,PDO::PARAM_STR);
        $stmt->bindValue(":author",$author,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function createSermon($date,$title,$resume,$audioFile,$author)
    {
        $req = "INSERT INTO sermons (date, title, resume, audio_fil, author)
        VALUES(:date,:title,:resume,:audioFile, :author)
        ";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":date",$date,PDO::PARAM_STR);
        $stmt->bindValue(":title",$title,PDO::PARAM_STR);
        $stmt->bindValue(":resume",$resume,PDO::PARAM_STR);
        $stmt->bindValue(":audioFile",$audioFile,PDO::PARAM_STR);
        $stmt->bindValue(":author",$author,PDO::PARAM_STR);
        $stmt->execute();
        return $this->getConnection()->lastInsertId();

    }
    

}