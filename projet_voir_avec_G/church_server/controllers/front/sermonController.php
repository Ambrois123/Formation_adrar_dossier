<?php


require_once "models/front/SermonModel.php";
require_once "controllers/BaseController.php";


class SermonController extends BaseController
{
    private $sermonModel;

    public function __construct()
    {
        $this->sermonModel = new SermonModel();
    }
    
    public function getSermons()
    {
        //call data from sermonModel
        $sermons = $this->sermonModel->getDBsermons();
        $this->sendJSON($sermons);
        // echo "<pre>";
        // print_r($sermons);
        // echo "</pre>";
    }

    public function getOneSermon($idSermon)
    {
        $OneSermon =  $this->sermonModel->getDBOneSermon($idSermon);
        $this->sendJSON($OneSermon);
        // echo "<pre>";
        // print_r($OneSermon);
        // echo "</pre>";
    }
}
