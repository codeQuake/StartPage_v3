<?php
//wcf imports
require_once(WCF_DIR.'lib/acp/form/ACPForm.class.php');
require_once(WCF_DIR.'lib/data/template/TemplateEditor.class.php');

class StartPageBoxAddForm extends ACPForm{
    public $templateName = 'startPageBoxAdd';
    public $activeMenuItem = 'wbb.acp.menu.link.content.startpage';
    public $neededPermissions = 'admin.startpage.canAddBoxes';
    
    public $boxname;
    public $boxtype;
    public $source;
    
    public function readFormParameters(){
        parent::readFormParameters();
        
        if(isset($_POST['boxname'])) $this->boxname = StringUtil::trim($_POST['boxname']); 
        if(isset($_POST['boxtype'])) $this->boxtype = StringUtil::trim($_POST['boxtype']); 
        if(isset($_POST['source'])) $this->source = $_POST['source'];
    }
   
    
    protected function checkBoxName(){
    
        //check if boxname is empty
        if(empty($this->boxname)){
            throw new UserInputException('boxname');
        }
        
        //check TemplateName
        $sql = "SELECT count(*) AS count
                FROM wcf".WCF_N."_template
                WHERE packageID = ".PACKAGE_ID."
                AND templateName = '".escapestring($this->boxname)."'";
        $row = WCF::getDB()->getFirstRow($sql);
        if($row['count']){
            throw new UserInputException('boxname', 'notUnique');
        }
        
        //check boxname
        $sql = "SELECT count(*) AS count
                FROM wbb".WBB_N."_startpageboxes
                WHERE boxname = '".escapestring($this->boxname)."'";
        $row = WCF::getDB()->getFirstRow($sql);
        if($row['count']){
            throw new UserInputException('boxname', 'notUnique');
        }
        
    }
    
    public function validate(){
        parent::validate();
        $this->checkBoxName();
        if(empty($this->source)){
            throw new UserInputException('source'); 
        }
     }
     
    public function save(){
        parent::save();
        //save box
        $sql = "INSERT INTO wbb".WBB_N."_startpageboxes
                                (boxName, boxType, packageID,isDeletable)
                                VALUES
                                (
                                '".escapeString($this->boxname)."',
                                '".escapeString($this->boxtype)."',
                                ".PACKAGE_ID.",
                                1
                                )";
        WCF::getDB()->sendQuery($sql);
        
        // save template
        $this->box = TemplateEditor::create($this->boxname, $this->source, 0);
        
        //reset cache
        WCF::getCache()->clear(WCF_DIR . 'cache', 'cache.templates-*.php');
        
        //reset values
        $this->boxname = $this->boxtype = $this->source = '';
        $this->saved();
        
        WCF::getTPL()->assign('success', true);
    }
    
    public function assignVariables() {
        parent::assignVariables();
        WCF::getTPL()->assign(array('boxname' => $this->boxname,
                                    'boxtype' => $this->boxtype,
                                    'source' => $this->source));
    }
   
}

?>