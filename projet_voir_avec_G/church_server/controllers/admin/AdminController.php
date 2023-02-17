<?php

require "./controllers/admin/security.php";
require "./models/admin/administrator.php";

class AdminController 
{
    private $administrator;

    public function __construct()
    {
        $this->administrator = new Administrator();


    }

    public function getPageLogin()
    {
        require_once "views/Login.php";
    }

    public function connexion()
    {

        // echo password_hash("admin10",  PASSWORD_DEFAULT);. Voir en bas de page.

        if(!empty($_POST['login']) && !empty($_POST['password'])){
            $login = Security::secureHTML($_POST['login']);
            $password = Security::secureHTML($_POST['password']);

            //verification se fera en base de donnée. Creation un fichier dans models pour gérer cette verification

            if($this->administrator->isConnexionValid($login, $password)){
                $_SESSION['access'] = "gestion";
                header('Location: '.URL."admin/gestion");

            }else{
                header('Location: '.URL."admin/login");
            }

        }
       
    }

    public function getPageGestion()
    {
        if(Security::verifAccessSession())
        {
            require "./views/pageGestion.php";
        }else {
            header('Location: '.URL."admin/login");
        }
        
    }

    public function deconnexion() 
    {
        //fermer la session
        session_destroy();
        header('Location: '.URL."admin/login");
    }
}

//generate securate password. Once password define, delete the line. La fonction password_hash génère un password
        //à partir d'un mot renseigné en renseignant PASSWORD_DEFAULT pour trouver la méthode la plus 
        //récente pour générer un password crypté.

        //pour générer le password crypté, aller sur la page de connexion, cliquer sur valider et le password crypté sera généré.
        //coller dans DB le password crypté. Puis supprimer la ligne

        // echo password_hash("admin10",  PASSWORD_DEFAULT);

        //verification info de connexion
