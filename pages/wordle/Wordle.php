<?php
namespace pages\wordle;

use \core\Controller;
use \core\Viewer;

class Wordle extends Controller
{
    protected $pagename = 'Wordle';
    protected $pagetitle = 'Wordle';

    function __construct()
    {
        parent::__construct();
        $this->files = [
            'php' => ['Wordle.php'],
            'js' => ['Wordle.js'],
            'css' => ['Wordle.css'],
        ];
    }

    protected function iniPage()
    {
        $out['toaster'] = '';

        $objModel = new Model();

        if ($result = $objModel->getWordle()) {
            $out['wort'] = $result['wort'];
        }

        $objViewer = new Viewer();
        return $objViewer->getPageContent($this->pagename, $out);
    }
}