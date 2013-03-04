<?php
/**
 ** @author Jens Krumsieck
 ** @package de.codequake.page.start
 **/
 
//wbb imports 
require_once(WBB_DIR.'lib/data/startPage/box/StartPageBox.class.php');
 
class StartPageBoxHelper{
 
    public static function getBoxList($type)
    {
        
        $boxList = array();
        $i = 0;
        
        $sql = "SELECT boxID
                FROM wbb".WBB_N."_startpageboxes
                WHERE boxType = '".escapeString($type)."'
                AND active = 1
                ORDER BY showOrder ASC";
        $res = WCF::getDB()->sendQuery($sql);
        while($row = WCF::getDB()->fetchArray($res))
        {
            $boxList[$i] = new StartPageBox($row['boxID']);
            $i++;
        }
        return $boxList;
    }
 
 }
?>