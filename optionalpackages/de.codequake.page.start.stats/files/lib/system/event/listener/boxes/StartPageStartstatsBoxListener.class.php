<?php
//wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

class StartPageStartstatsBoxListener implements EventListener{

    /**
     ** @see IndexPage::renderStats()
     **/
    protected function renderStats() {
    $stats = WCF::getCache()->get('stat');
    WCF::getTPL()->assign('stats', $stats);
    }
    
    public function execute($eventObj, $className, $eventName) {
        $this->renderStats();
    }
}

?>