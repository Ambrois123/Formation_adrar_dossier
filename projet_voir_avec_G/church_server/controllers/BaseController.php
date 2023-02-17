<?php
abstract class BaseController 
{ 
    
    protected  function sendJSON($info){
        
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: Application/json");
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        echo json_encode($info);
    }

    protected function sendNotFound(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: Application/json");
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        header("HTTP/1.1 404 Not Found");
        exit();

    }
}
