<?php
namespace core;

abstract class Controller
{
    protected $files = [];
    protected $pagename = '';
    protected $pagetitle = '';
    protected $pageType = 'basic';

    function __construct()
    {
        $this->files = [
            'php' => [],
            'js' => [],
            'css' => [],
        ];
    }

    protected function setPagetype($value){
        $aPageTypes = ['basic', 'json', 'xml', 'blank'];
        //try {
            if(in_array($value, $aPageTypes)){
                $this->pageType = $value;
            }else{
                throw new Exception("Bitte einen der folgenden Pagetypen verwenden: ".implode(',', $aPageTypes));
            }
        /*} catch (Exception $e) {
            echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
        }*/

    }

    private function getFiles()
    {
        return $this->files;
    }

    private function getPagename()
    {
        return $this->pagename;
    }

    abstract protected function iniPage();

    public function getPageContent(){
        if($this->pageType==='basic') {
            $file = file_get_contents('template/default.html', true);
            $file = str_replace("##script##", $this->writeScriptTags(), $file);
            $file = str_replace("##stylesheet##", $this->writeStylesheetTags(), $file);
            $file = str_replace("##title##", $this->pagetitle, $file);
            return str_replace("##page##", $this->iniPage(), $file);
        }elseif($this->pageType==='blank') {
            return $this->iniPage();
        }elseif($this->pageType==='json') {
            header('Content-Type: application/json; charset=utf-8');
            return $this->iniPage();
        }elseif($this->pageType==='xml') {
            header('Content-Type: application/xml; charset=utf-8');
            return $this->iniPage();
        }
    }

    private function writeScriptTags()
    {
        $script = '';

        if ($this->getPagename() && isset($this->getFiles()['js']) && is_array($this->getFiles()['js'])) {
            $aFiles = $this->getFiles()['js'];
            foreach ($aFiles as &$value) {
                $script .= '<script src="/pages/' . $this->getPagename() . '/' . $value . '" rel="stylesheet"></script>';
            }
        }
        return $script;
    }

    private function writeStylesheetTags()
    {
        $script = '';

        if ($this->getPagename() && isset($this->getFiles()['css']) && is_array($this->getFiles()['css'])) {
            $aFiles = $this->getFiles()['css'];
            foreach ($aFiles as &$value) {
                $script .= '<link href="/pages/' . $this->getPagename() . '/' . $value . '" rel="stylesheet">';
            }
        }
    return $script;
    }

}