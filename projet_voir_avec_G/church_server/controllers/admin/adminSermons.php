<?php
require_once "./controllers/admin/security.php";
require_once "./models/admin/gestionSermons.php";


class AdminSermons
{
    private $gestionSermons;

    public function __construct()
    {
        $this->gestionSermons = new GestionSermons(); //$this pour accéder à l'attribut private
    }

    public function visualisation()
    {
        if (Security::verifAccessSession()) {

            $sermons = $this->gestionSermons->getSermons();
            // call view visualisation
            require_once "./views/visualisationSermons.php";
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function suppression()
    {
        if (Security::verifAccessSession()) {
            $_SESSION['alert'] = [
                "message" => "Le sermon a été bien supprimé",
                "type" => "alert-success"
            ];
             $this->gestionSermons->deleteSermon((int)Security::secureHTML($_POST['sermon_id']));
            header('Location: '.URL.'admin/sermons/visualisation');
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function modification()
    {
        if (Security::verifAccessSession()) {
           $idSermon = (int)Security::secureHTML($_POST['sermon_id']);
           $date = Security::secureHTML($_POST['date']);
           $title = Security::secureHTML($_POST['title']);
           $resume = Security::secureHTML($_POST['resume']);
           $audioFile = Security::secureHTML($_POST['audio_fil']);
           $author = Security::secureHTML($_POST['author']);

           $this->gestionSermons->updateSermon($idSermon,$date,$title,$resume,$audioFile,$author);

           $_SESSION['alert'] = [
            "message" => "Le sermon a été bien modifié.",
            "type" => "alert-success"
            ];

            header('Location: '.URL.'admin/sermons/visualisation');
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function creationTemplate()
    {
        if (Security::verifAccessSession()) {
            // call view visualisation
            require_once "./views/creationSermon.php";
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }

    }

    public function validateCreation()
    {
        if (Security::verifAccessSession()) {

           $date = Security::secureHTML($_POST['date']);
           $title = Security::secureHTML($_POST['title']);
           $resume = Security::secureHTML($_POST['resume']);
           $audioFile = Security::secureHTML($_POST['audio_fil']);
           $author = Security::secureHTML($_POST['author']);

           $idSermon = $this->gestionSermons->createSermon($date,$title,$resume,$audioFile,$author); 

           $_SESSION['alert'] = [
            "message" => "Le sermon bien été crée avec l'identifiant :".$idSermon,
            "type" => "alert-success"
            ];

            header('Location: '.URL.'admin/sermons/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}
