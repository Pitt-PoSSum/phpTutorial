<?php
namespace pages\restServer;

use \core\Controller;
use \core\QuickFunctions;

class RestServer extends Controller
{
    protected $pagename = 'RestServer';
    protected $pagetitle = 'REST Server';

    private $objModel;

    function __construct()
    {
        parent::__construct();
        $this->files = [
            'php' => ['RestServer.php'],

        ];

        $this->setPagetype('json');
    }

    protected function iniPage()
    {
        $id = QuickFunctions::getPostOrGetValue('id');

        $requestMethod = $_SERVER['REQUEST_METHOD'];

        $this->objModel = new Model();

        if($requestMethod === 'GET'){
            $out = $this->getBlogData($id);
        }elseif($requestMethod === 'DELETE'){
            $out = $this->deleteBlogData($id);
        }elseif($requestMethod === 'PUT'){
            $out = $this->setBlogData();
        }

        return json_encode($out);
    }

    private function setBlogData(){
        $blogData = json_decode(file_get_contents('php://input'), true);

        $data = [
            'id' => $blogData['id'],
            'datum' => $blogData['datum'],
            'titel' => $blogData['titel'],
            'text' => $blogData['text'],
            'user' => $blogData['user'],
        ];

        if($newId = $this->objModel->setBlogdata($data)){
            $out['message'] = 'Eintrag hinzugefügt';
            $out['id'] = $newId;
        }

        return $out;
    }

    private function deleteBlogData($id){
        if($id) {
            if($this->objModel->getSingleBlogdata($id) && $this->objModel->removeBlogdata($id)) {
                $out['message'] = 'Eintrag gelöscht';
            }else{
                $out['error'] = 'Eintrag konnte nicht gelöscht werden. ID nicht vorhanden';
            }
        }else{
            $out['error'] = 'Bitte eine ID übergeben';
        }

        return $out;
    }

    private function getBlogData($id){
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
        }else{
            if ($result = $this->objModel->getAllBlogdata()) {
                $out = $result;
            }
        }

        return $out;
    }
}