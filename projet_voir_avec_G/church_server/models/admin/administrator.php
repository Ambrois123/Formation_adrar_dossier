<?php

require_once "config/Database.php";

class Administrator extends Database
{
    private function getPasswordUser($login)
    {
        $req = "SELECT * FROM administrateur WHERE login = :login";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $gestion = $stmt->fetch(PDO::FETCH_ASSOC);
        return $gestion['password'];
    }

    public function isConnexionValid($login, $password)
    {
        $passwordBD = $this->getPasswordUser($login);
        return password_verify($password, $passwordBD);
    }
}
