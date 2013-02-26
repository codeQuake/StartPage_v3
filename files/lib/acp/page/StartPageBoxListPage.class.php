<?php
// wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');


class StartPageBoxListPage extends AbstractPage{
    public $templateName = "startPageBoxList";
    public $count = 0;
    
    //List of Boxes
    public $startPageBoxes = array();
    
    public function readData(){
        parent::readData();
        
        $sql = "SELECT * FROM wbb".WBB_N."_startpageboxes ORDER BY boxID ASC";
        $result = WCF::getDB()->sendQuery($sql);
        while($row = WCF::getDB()->fetchArray($result)){
            $this->startPageBoxes[] = $row;
        }
        $sql = "SELECT COUNT(boxID) AS count FROM wbb".WBB_N."_startpageboxes";
        $this->count = WCF::getDB()->getFirstRow($sql);
        
    }
    
    public function assignVariables(){
        parent::assignVariables();
        
        WCFACP::getMenu()->setActiveMenuItem('wbb.acp.menu.link.content.startpage');
        
        WCF::getTPL()->assign(array(
                                     'boxes' =>$this->startPageBoxes,
                                     'boxCount' => $this->count['count']));
    }
    
}

?>