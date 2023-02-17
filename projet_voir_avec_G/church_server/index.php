<?php
session_start();

define("URL", str_replace("index.php", "",(isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/front/sermonController.php";
require_once "controllers/admin/AdminController.php";
require_once 'controllers/admin/adminSermons.php';

//instantiation
$sermonController = new SermonController();
$adminController = new AdminController();
$adminSermons = new AdminSermons();


try{
    if(empty($_GET['page'])){
        throw new Exception("Page Not Found");
    }else  {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));

        //necessite front ou back + page demandée

        if(empty($url[0]) || empty($url[1])) throw new Exception("Page Not Found"); 
        switch($url[0]){
            case"front" : 
                switch($url[1]){
                    case "sermons": $sermonController->getSermons();
                    break;
                    case "sermon" : 
                        if(empty($url[2])) throw new Exception ("ID Not Found");
                        $sermonController->getOneSermon($url[2]);
                    break;
                    default : throw new Exception("Page Not Found");
                }
            break;
            case "admin" : 
                switch ($url[1]){
                    case "login" :$adminController->getPageLogin();
                    break;
                    case "connexion" :$adminController->connexion();
                    break;
                    case "gestion" :$adminController->getPageGestion();
                    break;
                    case "deconnexion" :$adminController->deconnexion();
                    break;
                        case "sermons" : 
                            switch($url[2]){
                                case "visualisation" : $adminSermons->visualisation();
                                break;
                                case "validateSuppression" : $adminSermons->suppression();
                                break;
                                case "validateModification" : $adminSermons->modification();
                                break;
                                case "creation" : $adminSermons->creationTemplate();
                                break;
                                case "validateCreation" : $adminSermons->validateCreation();
                                break;
                                default : throw new Exception("Page Not Found");
                            }
                        break;

                    default : throw new Exception("Page Not Found");
                    
                }
            break;
            default : throw new Exception("Page Not Found");
        }
    } 

}catch(Exception $e){
    $msg = $e->getMessage();
    echo $msg;
    echo "<br>";
    echo  "<a href='".URL."admin/login'>Se connecter</a>";
}
