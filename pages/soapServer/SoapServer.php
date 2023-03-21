<?php

ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("http://phptutorial.localhost:8080/pages/soapServer/rules.wsdl",
array('soap_version' => SOAP_1_2));
//$server->addFunction('hello');
$server->setClass('MySoapServer');
$server->handle();

class MySoapServer
{
    private $objModel;

    function __construct()
    {

        require_once('../../core/Model.php');
        require_once('../../core/ConnectDB.php');
        require_once('./SoapServer_model.php');
        $this->objModel = new SoapServer_model();
    }

    public function setBlogData($blogData){
        $out = false;
        if($newId = $this->objModel->setBlogdata($blogData)){
            $out = $newId;
        }

        return $out;
    }

    public function getMaxBlogId(){
        if ($result = $this->objModel->getMaxBlogId()) {
            $out = $result;
        }else{
            $out = 'Keine Daten vorhanden';
        }

        return $out;
    }

    public function deleteBlogData($id){
        if($id) {
            if($this->objModel->getSingleBlogdata($id) && $this->objModel->removeBlogdata($id)) {
                $out = 'Eintrag gelöscht';
            }else{
                $out = 'Eintrag konnte nicht gelöscht werden. ID nicht vorhanden';
            }
        }else{
            $out = 'Bitte eine ID übergeben';
        }

        return $out;
    }

    public function getBlogData($id){
        if($id){
            if ($result = $this->objModel->getSingleBlogdata($id)) {
                $out = $result;

                if(isset($out['datum'])) {
                    $date = new \DateTimeImmutable($out['datum']);
                    $out['datum'] = $date->format('d.m.Y H:i:s');
                }
            }else{
                $out['error'] = 'ID nicht vorhanden';
            }
        }

        return $out;
    }

    public function getAllBlogData(){
        if ($result = $this->objModel->getAllBlogdata()) {
            $out = $result;
        }else{
            $out['error'] = 'Keine Daten vorhanden';
        }

        return $out;
    }
}

