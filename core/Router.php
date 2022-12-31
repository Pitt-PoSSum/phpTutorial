<?php
namespace core;

class Router
{
    function __construct()
    {
        define('__ROOT__', dirname(dirname(__FILE__)));

        spl_autoload_register(function($classPath) {
            $autoloadOff = ['Smarty_Autoloader'];
            if(!in_array($classPath, $autoloadOff)) {
                if(str_contains($classPath,'\\')){
                    $className = explode('\\',$classPath);
                    $className = end($className);
                    $fullFileName = __ROOT__ . '/' . str_replace('\\','/',$classPath) . '.php';
                }else{
                    $className = $classPath;
                    $fullFileName = __ROOT__ . '/core/' . $classPath . '.php';
                }

                if (file_exists($fullFileName)) {
                    require_once $fullFileName;
                    //echo 'Class "'.$classPath.'" in "'.$fullFileName.'" eingefügt.';
                } else {
                    echo 'Class "'.$classPath.'" in "'.$fullFileName.'" does not exist.';
                }
            }
        });

        Debug::$debugging=true;
    }

    public function iniRouter()
    {


        $path = $this->getPath();
        //Debug::dump($path);

        if (!$path) {
            $path = 'home';
        }

        $iniObj = 'pages\\'.$path.'\\'.ucfirst($path);
        //Debug::dump($iniObj);
        $objPage = new $iniObj;
        echo $objPage->getPageContent();

    }

    private function getPath($endPath = false)
    {
        $baseUrl = 'http://phptutorial.localhost/';
        $requestUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $requestString = substr($requestUrl, strlen($baseUrl));

        //Debug::dump($_SERVER['QUERY_STRING']);
        //Debug::dump($requestString);
        if($_SERVER['QUERY_STRING']) {
            $requestString = substr($requestString, 0, -strlen($_SERVER['QUERY_STRING']) - 1);
        }
        //Debug::dump($requestString);

        $urlParams = explode('/', $requestString);
        $urlParams = array_filter($urlParams);

        if($endPath) {
            return end($urlParams);
        }else{
            if (is_array($urlParams) && isset($urlParams[0])) {
                return $urlParams[0];
            } else {
                return null;
            }
        }
    }


}