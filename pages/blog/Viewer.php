<?php
namespace pages\blog;

use core\Debug;

class Viewer extends \core\Viewer
{
    public function getBlogContent($pagename, $allBlogdata, $blogData, $useAPI, $toaster, $infoDetails){
        $this->objSmarty->assign('allBlogData', $allBlogdata);
        $this->objSmarty->assign('blogData', $blogData);
        $this->objSmarty->assign('useAPI', $useAPI);
        $this->objSmarty->assign('toaster', $toaster);
        $this->objSmarty->assign('infoDetails', $infoDetails);

        return $this->objSmarty->fetch('./pages/'.$pagename.'/'.$pagename.'.tpl');
    }
}