<?php
namespace pages\home;

use \core\Controller;
use \core\Viewer;

class Home extends Controller{


    protected $pagename = 'Home';
    protected $pagetitle = 'Über mich';

    function __construct() {
        parent::__construct();
        $this->files = [
            'php' => ['Home.php'],
        ];
    }

    protected function iniPage(){
        $objViewer = new Viewer();
        return $objViewer->getPageContent($this->pagename);
    }
}