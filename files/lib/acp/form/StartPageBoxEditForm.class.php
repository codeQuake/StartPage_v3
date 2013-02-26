<?php
//wcf imports
require_once(WCF_DIR.'lib/acp/form/ACPForm.class.php');
require_once(WCF_DIR.'lib/data/template/TemplateEditor.class.php');

//wbb imports
require_once(WBB_DIR.'lib/data/startPage/box/StartPageBox.class.php');

class StartPageBoxEditForm extends ACPForm{
    public $templateName = 'startPageBoxEdit';
    public $activeMenuItem = 'wbb.acp.menu.link.content.startpage';
    public $neededPermissions = 'admin.startpage.canAddBoxes';
    
    public $boxname;
    public $boxtype;
    public $source;
    public $boxID;
    
    public $templateID;
    public $template;
    
    public function readParameters(){
        parent::readParameters();
        if(isset($_GET['boxID'])) $this->boxID = intval($_GET['boxID']);
        
    }
    
    public function readData(){
        parent::readData();
        $box = new StartPageBox($this->boxID);
        //you can not edit plugin boxes
        if($box->isDeletable == 0) throw new IllegalLinkException();
        $this->boxname = $box->boxName;
        $this->boxtype = $box->boxType;
        
        $sql = "SELECT templateID 
                FROM wcf".WCF_N."_template
                WHERE templateName = '".$this->boxname."'";
        $row = WCF::getDB()->getFirstRow($sql);
        $this->templateID = $row['templateID'];
        $this->template = new TemplateEditor($this->templateID);
        $this->source = $this->template->getSource();
    }
    
    public function readFormParameters(){
        parent::readFormParameters();
        
        if(isset($_POST['boxtype'])) $this->boxtype = StringUtil::trim($_POST['boxtype']); 
        if(isset($_POST['source'])) $this->source = $_POST['source'];
        
        if(isset($_GET['boxID'])) $this->boxID = intval($_GET['boxID']);
    }
   
    
    public function validate(){
        parent::validate();
        if(empty($this->source)){
            throw new UserInputException('source'); 
        }
     }
     
    public function save(){
        parent::save();
        //save box
        $sql = "UPDATE wbb".WBB_N."_startpageboxes
                SET boxType = '".escapeString($this->boxtype)."'
                WHERE boxID = ".$this->boxID;
        WCF::getDB()->sendQuery($sql);
        
        // save template
        $box = new StartPageBox($this->boxID);
        $sql = "SELECT templateID 
                FROM wcf".WCF_N."_template
                WHERE templateName = '".$box->boxName."'";
        $row = WCF::getDB()->getFirstRow($sql);
        $this->templateID = $row['templateID'];
        $this->template = new TemplateEditor($this->templateID);
        $this->box = $this->template->update($box->boxName, $this->source, 0);
        
        //reset cache
        WCF::getCache()->clear(WCF_DIR . 'cache', 'cache.templates-*.php');
        
        
        $this->saved();
        
        WCF::getTPL()->assign('success', true);
    }
    
    public function assignVariables() {
        parent::assignVariables();
        WCF::getTPL()->assign(array('boxname' => $this->boxname,
                                    'boxtype' => $this->boxtype,
                                    'boxID' => $this->boxID,
                                    'source' => $this->source));
    }
   
}

?>