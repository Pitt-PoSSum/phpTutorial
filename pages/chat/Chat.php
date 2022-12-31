<?php
namespace pages\chat;

use \core\Controller;
use \core\Viewer;

class Chat extends Controller{
    protected $pagename = 'Chat';
    protected $pagetitle = 'Chat, MySQL, Ajax';

    function __construct() {
        parent::__construct();
        $this->files = [
            'php' => ['Chat.php'],
            'js' => ['chat.js'],
        ];
    }

    protected function iniPage(){
        $objViewer = new Viewer();
        return $objViewer->getPageContent($this->pagename, '');
    }
}