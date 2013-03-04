<?php
//wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

class StartPageWIOListener implements EventListener{
    public function execute($eventObj, $className, $eventName) {
        if (MODULE_USERS_ONLINE && INDEX_ENABLE_ONLINE_LIST) {
			$this->renderOnlineList();
		}
        WCF::getTPL()->append('additionalBoxes', WCF::getTPL()->fetch('wioStart'));
    }
    /**c
     * Wrapper for UsersOnlineList->renderOnlineList()
     * @see UsersOnlineList::renderOnlineList()
     */
	protected function renderOnlineList() {
		require_once(WCF_DIR.'lib/data/user/usersOnline/UsersOnlineList.class.php');
		$usersOnlineList = new UsersOnlineList('', true);
		$usersOnlineList->renderOnlineList();
		
		// check users online record
		$usersOnlineTotal = (USERS_ONLINE_RECORD_NO_GUESTS ? $usersOnlineList->usersOnlineMembers : $usersOnlineList->usersOnlineTotal);
		if ($usersOnlineTotal > USERS_ONLINE_RECORD) {
			// save new users online record
			$sql = "UPDATE	wcf".WCF_N."_option
				SET	optionValue = IF(".$usersOnlineTotal." > optionValue, ".$usersOnlineTotal.", optionValue)
				WHERE	optionName = 'users_online_record'
					AND packageID = ".PACKAGE_ID;
			WCF::getDB()->registerShutdownUpdate($sql);
			
			// save new record time
			if (TIME_NOW > USERS_ONLINE_RECORD_TIME) {
				$sql = "UPDATE	wcf".WCF_N."_option
					SET	optionValue = IF(".TIME_NOW." > optionValue, ".TIME_NOW.", optionValue)
					WHERE	optionName = 'users_online_record_time'
						AND packageID = ".PACKAGE_ID;
				WCF::getDB()->registerShutdownUpdate($sql);
			}
			
			// reset options file
			require_once(WCF_DIR.'lib/acp/option/Options.class.php');
			Options::resetFile();
		}
	}
}
?>