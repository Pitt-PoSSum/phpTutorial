<?php
namespace pages\chatAjax;

use \core\Controller;
use \core\QuickFunctions;

class ChatAjax extends Controller {
    protected $pageType = 'json';

    protected function iniPage()
    {
        $action = QuickFunctions::getPostValue('action');
        $myMessage = QuickFunctions::getPostValue('myMessage');
        $user = QuickFunctions::getPostValue('user');

        $model = new Model;

        if ($action == 'post' && $myMessage && $user) {
            if($model->setChatMessage($myMessage, $user)){
                return json_encode(['OK']);
            }else{
                return json_encode(['error']);
            }
        }else {
            return json_encode($model->getChatMessages());
        }
    }



}