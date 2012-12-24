﻿<?php
/**
** @author Jens Krumsieck
** @package de.codequake.page.start
** @license codeQuake-Startpage License (link coming soon)
**/

//wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');

//wbb imports
require_once(WBB_DIR.'lib/data/startPage/box/StartPageBox.class.php');
require_once(WBB_DIR.'lib/data/startPage/box/StartPageBoxHelper.class.php');


class StartPage extends AbstractPage{
    public $templateName = 'startPage';
    public $rightBoxes;
    public $leftBoxes;
    
    /**
    ** @see: Page::readData();
    **/
    public function readData(){
        parent::readData();
           $this->rightBoxes = array();
           $this->leftBoxes = array();
           
           
           $this->rightBoxes = StartPageBoxHelper::getBoxList("right");
           $this->leftBoxes = StartPageBoxHelper::getBoxList("left");
           
        }
    
    /**
    ** @see: Page::assignVariables();
    **/
    public function assignVariables(){
        parent::assignVariables();
        WCF::getTPL()->assign(array('rightBoxes' => $this->rightBoxes,
                                    'leftBoxes' => $this->leftBoxes));
        
    }
}
?>