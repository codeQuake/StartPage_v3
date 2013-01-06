<?php
// wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');


class StartPageBoxListPage extends AbstractPage{
    public $templateName = "startPageBoxList";
    
    //List of Boxes
    public $startPageBoxes = array();
    
    public function readData(){
        parent::readData();
        
        $sql = "SELECT * FROM wbb".WBB_N."_startpageboxes ORDER BY boxID ASC";
        $result = WCF::getDB()->sendQuery($sql);
        while($row = WCF::getDB()->fetchArray($result)){
            $this->startPageBoxes[] = $row;
        }
        
    }
    
    public function assignVariables(){
        parent::assignVariables();
        
        WCFACP::getMenu()->setActiveMenuItem('TODO!');
        
        WCF::getTPL()->assign(array(
                                     'boxes' =>$this->startPageBoxes));
    }
    
}

?>