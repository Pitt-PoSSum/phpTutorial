<?php
namespace pages\blog;

use \core\Controller;
use core\Debug;
use \core\QuickFunctions;
use pages\blog\repository\Blogdata;
use pages\blog\repository\RESTBlogRepository;
use pages\blog\repository\SOAPBlogRepository;
use pages\blog\repository\SQLBlogRepository;

class Blog extends Controller
{
    protected $pagename = 'Blog';
    protected $pagetitle = 'Blog umgesetzt mit SOAP API, REST API oder konventionell';

    private $objRepo;

    function __construct()
    {
        parent::__construct();
        $this->files = [
            'php' => ['Blog.php'],
            'js' => ['blog.js'],
            'css' => ['blog.css'],
        ];
    }

    protected function iniPage()
    {
        $aktion = QuickFunctions::getPostOrGetValue('aktion');
        $id = QuickFunctions::getPostOrGetValue('id');
        $useAPI = QuickFunctions::getPostOrGetValue('useAPI');
        $toaster = '';
        $allBlogdata = false;
        $blogData = new Blogdata();

        $this->setRepo($useAPI);

        if($aktion == 'delete'){
            $this->actionDelete($id);
            $toaster = 'Eintrag gelöscht';
            $blogData = $this->actionNew();
        }elseif($aktion == 'save'){
            if($newId = $this->actionSave($id)){
                $id = $newId;
                $toaster = 'Eintrag gespeichert';
            }
            $blogData = $this->actionLoad($id);
        }elseif($aktion == 'edit'){
            $blogData = $this->actionLoad($id);
        }elseif ($aktion === 'new') {
            $blogData = $this->actionNew();
        }else{
            $allBlogdata = $this->actionDefault();
        }

        $infoDetails = $this->objRepo->getInfoDetails();
        $objViewer = new Viewer();
        return $objViewer->getBlogContent($this->pagename, $allBlogdata, $blogData, $useAPI, $toaster, $infoDetails);
    }

    private function setRepo($useAPI){
        if($useAPI === 'REST') {
            $this->objRepo = new RESTBlogRepository();
        }elseif($useAPI === 'SOAP'){
            $this->objRepo = new SOAPBlogRepository();
        }else {
            $this->objRepo = new SQLBlogRepository();
        }
    }

    private function actionDelete($id){
        if (is_numeric($id)) {
            $this->objRepo->remove($id);
        }
    }

    private function actionSave($id){
        $blogdata = new Blogdata();
        $blogdata->id = $id;
        $blogdata->datum = QuickFunctions::getPostValue('datum');
        $blogdata->titel = QuickFunctions::getPostValue('titel');
        $blogdata->text = QuickFunctions::getPostValue('text');
        $blogdata->user = QuickFunctions::getPostValue('user');

        $returnValue = $this->objRepo->save($blogdata);

        return $returnValue;
    }

    private function actionLoad($id){
        $returnValue = false;
        if (is_numeric($id)) {
            $aBlogData = $this->objRepo->find($id);
            $blogdata = new Blogdata();
            $blogdata->id = $id;
            $blogdata->datum = $aBlogData['datum'];
            $blogdata->titel = $aBlogData['titel'];
            $blogdata->text = $aBlogData['text'];
            $blogdata->user = $aBlogData['user'];
            $returnValue = $blogdata;
        }
        return $returnValue;
    }

    private function actionDefault(){
        return $this->objRepo->getAllData();
    }

    private function actionNew(){
        return new Blogdata();
    }

    public function huhu(){
        return 'ok';
    }
}