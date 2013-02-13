<?php
//wcf imports
require_once(WCF_DIR.'lib/action/AbstractAction.class.php');

/** 
** Sorts Boxes
** @author Jens Krumsieck
** @package de.codequake.page.start
**/
class BoxListSortAction extends AbstractAction{
    public $showOrder = array();
    
    public function readParameters(){
        parent::readParameters();
        if(isset($_POST['boxShowOrder']) && is_array($_POST['boxShowOrder'])) $this->showOrder = ArrayUtil::toIntegerArray($_POST['boxShowOrder']);
    } 
    
    public function execute(){
        parent::execute();
        // check permission
		WCF::getUser()->checkPermission('admin.startpage.canEditBoxes');
        
        foreach($this->showOrder as $boxID => $position)
        {
         $sql = "UPDATE wbb".WBB_N."_startpageboxes
                SET showOrder = ".$position." 
                WHERE boxID = ".$boxID;
         WCF::getDB()->sendQuery($sql);
        }
        
        $this->executed();
        HeaderUtil::redirect('index.php?page=StartPageBoxList&packageID='.PACKAGE_ID.SID_ARG_2ND_NOT_ENCODED);
        exit;
        
    }
    
}

?>