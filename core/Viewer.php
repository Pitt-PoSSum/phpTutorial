<?php
namespace core;

class Viewer
{
    public $objSmarty;

    function __construct()
    {
        require('/xampp/php/smarty/Smarty.class.php');
        $this->objSmarty = new \Smarty();

        $this->objSmarty->setTemplateDir('/xampp/htdocs/phpTutorial/smarty/templates');
        $this->objSmarty->setCompileDir('/xampp/htdocs/phpTutorial/smarty/templates_c');
        $this->objSmarty->setCacheDir('/xampp/htdocs/phpTutorial/smarty/cache');
        $this->objSmarty->setConfigDir('/xampp/htdocs/phpTutorial/smarty/configs');
    }

    public function getPageContent($pagename, $out = ''){
        if(is_array($out)){
            foreach ($out as $key => $value){
                $this->objSmarty->assign($key, $value);
            }
        }else{
            $this->objSmarty->assign('out', $out);
        }
        return $this->objSmarty->fetch('./pages/'.$pagename.'/'.$pagename.'.tpl');
    }
}