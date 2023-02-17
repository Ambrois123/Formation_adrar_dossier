<?php

require_once "config/Database.php";

class SermonModel extends Database
{
    public function getDBsermons()
    {
        $req = "SELECT * FROM sermons";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $sermons = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $sermons;
    }

    public function getDBOneSermon($idSermon)
    {
        $req = "SELECT * FROM sermons
        WHERE id = :idSermon
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idSermon",$idSermon,PDO::PARAM_INT);
        $stmt->execute();
        $OneSermon = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $OneSermon;
    }

}