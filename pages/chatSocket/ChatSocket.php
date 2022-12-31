<?php
namespace pages\chatSocket;
//C:\xampp\htdocs\phpTutorial\pages\chatSocket>php -q php-socket.php
use \core\Controller;
use \core\Viewer;

class chatSocket extends Controller{
    protected $pagename = 'ChatSocket';
    protected $pagetitle = 'Chat mit Socket';

    function __construct() {
        parent::__construct();
        $this->files = [
            'php' => ['ChatSocket.php'],
            'js' => ['chatSocket.js'],
        ];
    }

    protected function iniPage(){
        $objViewer = new Viewer();
        return $objViewer->getPageContent($this->pagename, '');
    }
}