<?php
//wcf imports
require_once(WCF_DIR.'lib/action/AbstractAction.class.php');
require_once(WCF_DIR.'lib/data/template/TemplateEditor.class.php');

//wbb imports
require_once(WBB_DIR.'lib/data/startPage/box/StartPageBox.class.php');
/**
** Deletes Box
**
** @author Jens Krumsieck
** @package de.codequake.page.start
**/
class StartPageBoxDeleteAction extends AbstractAction{
    public $boxID;
    
    public function readParameters(){
        parent::readParameters();
        if(isset($_REQUEST['boxID'])) $this->boxID = intval($_REQUEST['boxID']);
    }
    
    public function execute(){
        parent::execute();
        $box = new StartPageBox($this->boxID);
        
        //get Template & delete
        $sql = "SELECT templateID 
                FROM wcf".WCF_N."_template
                WHERE templateName = '".$box->boxName."'";
        $row = WCF::getDB()->getFirstRow($sql);
        $template = new TemplateEditor($row['templateID']);
        $template->delete();
        
        //delete Box
        $sql = "DELETE FROM wbb".WBB_N."_startpageboxes
                WHERE boxID = ".$this->boxID;
        WCF::getDB()->sendQuery($sql);
        
        //redirect
        HeaderUtil::redirect('index.php?page=StartPageBoxList&packageID='.PACKAGE_ID.SID_ARG_2ND_NOT_ENCODED);
        exit;
    }
}
?>