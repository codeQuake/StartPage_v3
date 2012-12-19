<?php
 //wcf imports
 require_once(WCF_DIR.'lib/data/DatabaseObject.class.php');
 
/**
 ** @author Jens Krumsieck
 ** @package de.codequake.page.start
 **/

class StartPageBox extends DatabaseObject{
    /**
    ** creates a new StartPageBox-Object
    **
    ** @param   integer     $boxID
    ** @param   array<mixed>    $row
    **/
    public function __construct($boxID, $row=null){
        if($boxID != null){
            $sql = "SELECT * 
                    FROM wbb".WBB_N."_startPageBoxes 
                    WHERE boxID = ".$boxID;
            $row = WCF::getDB()->getFirstRow($sql);
        }
        parent::__construct($row);
    }
    
}  
?>