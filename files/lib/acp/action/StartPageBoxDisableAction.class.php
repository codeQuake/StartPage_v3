<?php
// wcf imports
require_once(WCF_DIR.'lib/action/AbstractAction.class.php');

/**
** Disables StartPage Box
**
** @author: Jens Krumsieck
** @package: de.codequake.page.start
**/

class StartPageBoxDisableAction extends AbstractAction{
    public $boxID = 0;
    
    public function readParameters(){
        parent::readParameters();
        if(isset($_REQUEST['boxID'])) $this->boxID = intval($_REQUEST['boxID']);
    }
    
    public function execute(){
        parent::execute();
        
        //check Permission
        WCF::getUser()->checkPermission('admin.startpage.canEditBoxes');
        
        //disable box
        $sql = "UPDATE wbb".WBB_N."_startpageboxes
                SET active = 0
                WHERE boxID = ".$this->boxID;
        WCF::getDB()->sendQuery($sql);
        
        //redirect
        HeaderUtil::redirect('index.php?page=StartPageBoxList&packageID='.PACKAGE_ID.SID_ARG_2ND_NOT_ENCODED);
        exit;
        
    }
}

?>