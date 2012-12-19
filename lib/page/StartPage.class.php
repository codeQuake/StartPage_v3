<?php
/**
** @author Jens Krumsieck
** @package de.codequake.page.start
** @license codeQuake-Startpage License (link coming soon)
**/

//wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');

//wbb imports
require_once(WBB_DIR.'lib/data/startPage/box/StartPageBox.class.php');


class StartPage extends AbstractPage{
    public $templateName = 'startPage';
    
    /**
    ** @see: Page::readData();
    **/
    public function readData(){
        parent::readData();
         
        }
    
    /**
    ** @see: Page::assignVariables();
    **/
    public function assignVariables(){
        parent::assignVariables();
        WCF::getTPL()->assign(array());
    }
}
?>