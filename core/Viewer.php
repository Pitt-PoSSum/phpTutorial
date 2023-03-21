<?php
namespace core;

class Viewer
{
    public $objSmarty;

    function __construct()
    {
        define('SMARTY_DIR', '/app/phpTutorial/vendor/smarty/smarty/libs' . DIRECTORY_SEPARATOR);
        define('SMARTY_SYSPLUGINS_DIR', SMARTY_DIR . 'sysplugins' . DIRECTORY_SEPARATOR);
        require('/app/phpTutorial/vendor/smarty/smarty/libs/Smarty.class.php');
        $this->objSmarty = new \Smarty();

        $this->objSmarty->setTemplateDir('./phpTutorial/smarty/templates');
        $this->objSmarty->setCompileDir('./phpTutorial/smarty/templates_c');
        $this->objSmarty->setCacheDir('./phpTutorial/smarty/cache');
        $this->objSmarty->setConfigDir('./phpTutorial/smarty/configs');
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