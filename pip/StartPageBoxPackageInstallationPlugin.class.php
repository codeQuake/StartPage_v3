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
		$boxXML = $xml->getElementTree('data');
		
		// Loop through the array and install or uninstall event listeners.
		foreach ($boxXML['children'] as $key => $block) {
			if (count($block['children'])) {
				// Handle the import instructions
				if ($block['name'] == 'import') {
                    //loop through startpageboxes
                    foreach($block['children'] as $box) {
                        // Extract item properties.
						foreach ($box['children'] as $child) {
							if (!isset($child['cdata'])) continue;
							$box[$child['name']] = $child['cdata'];
						}
                        
						// default values
                        $boxName = '';
                        $boxType = $showOrder = $active = $event = 0;
                        
                        // make xml tags-names (keys in array) to lower case
						$this->keysToLowerCase($box);
                        
                        //get values
                        if(isset($box['boxname'])) $boxName = $box['boxname'];
                        if(isset($box['boxtype'])) $boxType = $box['boxtype'];
                        if(isset($box['showorder'])) $showOrder = intval($box['showorder']);
                        if(isset($box['active'])) $active = intval($box['active']);
                        if(isset($box['event'])) $event = intval($box['event']);
                        
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
                        
                        if($event == 1)
                        {
                            //set EventListener for Box
                            $sql = "INSERT INTO			wcf".WCF_N."_event_listener
											    (packageID, environment, eventClassName, eventName, listenerClassFile)
							    VALUES				(".$this->installation->getPackageID().",
											    'user',
										 	    'startPage',
											    'assignVariables',
											    'lib/system/boxes/".escapeString($boxName)."Box.class.php')
							    ON DUPLICATE KEY UPDATE 	inherit = VALUES(inherit)";
						    WCF::getDB()->sendQuery($sql);
                        }
                     }
                 }       
            }
        }    
    }
    /**
     * @see PackageInstallationPlugin::uninstall()
     */
	public function uninstall() {
		parent::uninstall();
		
		// clear cache immediately
		WCF::getCache()->clear(WCF_DIR.'cache', 'cache.eventListener-*.php');
	}
    }

?>