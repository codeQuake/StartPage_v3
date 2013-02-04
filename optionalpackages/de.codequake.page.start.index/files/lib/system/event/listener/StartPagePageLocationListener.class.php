<?php
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

class StartPagePageLocationListener implements EventListener{
	public function execute($eventObj, $className, $eventName) {
	
		// code taken vom RequestHandler::handle()
                        if (!empty($_GET['page']) || !empty($_POST['page'])) {
                                return;
                        }
                        else if (!empty($_GET['form']) || !empty($_POST['form'])) {
                                return;
                        }
                        else if (!empty($_GET['action']) || !empty($_POST['action'])) {
                                return;
                        }
                        else {
                                HeaderUtil::redirect('index.php?page=Start', false);
                        }
	
	
	
	
	}

}	
?>