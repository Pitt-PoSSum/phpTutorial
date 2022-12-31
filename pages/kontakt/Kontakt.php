<?php
namespace pages\kontakt;

use \core\Controller;
use \core\QuickFunctions;
use \core\Viewer;

class Kontakt extends Controller
{
    protected $pagename = 'Kontakt';
    protected $pagetitle = 'Kontakt';

    function __construct()
    {
        parent::__construct();
        $this->files = [
            'php' => ['Kontakt.php'],
            'js' => ['kontakt.js'],
        ];
    }

    protected function iniPage()
    {
        $out = [
            'aktion' => QuickFunctions::getPostValue("aktion"),
            'anrede' => QuickFunctions::getPostValue("anrede"),
            'vorname' => QuickFunctions::getPostValue("vorname"),
            'nachname' => QuickFunctions::getPostValue("nachname"),
            'email' => QuickFunctions::getPostValue("email"),
            'nachricht' => QuickFunctions::getPostValue("nachricht"),
        ];

        $objViewer = new Viewer();
        return $objViewer->getPageContent($this->pagename, $out);
    }
}