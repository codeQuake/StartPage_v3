<?php
/**
** @author Jens Krumsieck
** @package de.codequake.page.start
**/

//wcf imports
require_once(WCF_DIR.'lib/acp/package/plugin/AbstractXMLPackageInstallationPlugin.class.php');

class StartPageBoxPackageInstallationPlugin extends AbstractXMLPackageInstallationPlugin{
    public $tagName = 'boxes';
    public $tableName = 'startpageboxes';
    
    /**
     * @see PackageInstallationPlugin::install()
     */
     public function install() {
        parent::install(); 
        
        if (!$xml = $this->getXML()) {
			return;
		}
        
        // Create an array with the data blocks (import or delete) from the xml file.
		$eventXML = $xml->getElementTree('data');
		
		// Loop through the array and install or uninstall event listeners.
		foreach ($eventXML['children'] as $key => $block) {
			if (count($block['children'])) {
				// Handle the import instructions
				if ($block['name'] == 'import') {
                    //loop through startpageboxes
                    foreach($block['children'] as $item) {
                        // Extract item properties.
						foreach ($event['children'] as $child) {
							if (!isset($child['cdata'])) continue;
							$event[$child['name']] = $child['cdata'];
						}
                        
						// default values
                        $boxName = '';
                        $boxType = $showOrder = $active = 0;
                        
                        // make xml tags-names (keys in array) to lower case
						$this->keysToLowerCase($item);
                        
                        //get values
                        if(isset($item['boxname'])) $boxName = $item['boxname'];
                        if(isset($item['boxtype'])) $boxType = $item['boxtype'];
                        if(isset($item['showorder'])) $showOrder = intval($item['showorder']);
                        if(isset($item['active'])) $active = intval($item['active']);
                        
                        //insert & update
                        $sql = "INSERT INTO wbb".WBB_N."_startpageboxes
                                (boxName, boxType, showOrder, active)
                                VALUES
                                (
                                '".escapeString($boxName)."',
                                '".escapeString($boxType)."',
                                ".$showOrder.",
                                ".$active."
                                )
                                ON DUPLICATE KEY UPDATE
                                boxName = VALUES(boxName),
                                boxType = VALUES(boxType),
                                showOrder = VALUES(showOrder),
                                active = VALUES(active)";
                        WCF::getDB()->sendQuery($sql);
                        $boxID = WCF::getDB()->getInsertID();
                        if(!$boxID) {
							$sql = "SELECT	boxID
								FROM	wbb".WBB_N."_startpageboxes
								WHERE	boxName = '".escapeString($boxName)."'";
							$row = WCF::getDB()->getFirstRow($sql);
							$boxID = $row['boxID'];
						}
						  
                     }
                 }       
            }
        }    
    }
    /**
     * @see PackageInstallationPlugin::uninstall()
     */
    public function uninstall(){
    parent::uninstall();
    }
}

?>