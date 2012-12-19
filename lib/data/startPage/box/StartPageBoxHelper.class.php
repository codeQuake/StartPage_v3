<?php
/**
 ** @author Jens Krumsieck
 ** @package de.codequake.page.start
 **/
 
//wbb imports 
require_once(WBB_DIR.'lib/data/startPage/box/StartPageBox.class.php');
 
class StartPageBoxHelper{
 
    public function getBoxList($type)
    {
        $sql = "SELECT boxID
                FROM wbb".WBB_N."_startPageBoxes
                WHERE boxType = '".$type."'
                AND active = 1
                ORDER BY showOrder ASC";
        $row = WCF::getDB()->fetchArray($sql);
        
        $boxList = array();
        $i = 0;
        foreach ($row as $box)
        {
            $boxList[i] = new StartPageBox($box.boxID);
            $i++;
        }
        return $boxList;
    }
 
 }
?>