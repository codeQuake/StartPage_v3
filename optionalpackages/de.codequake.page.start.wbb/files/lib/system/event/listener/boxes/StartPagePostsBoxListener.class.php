<?php
//wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
//wbb imports
require_once(WBB_DIR.'lib/data/thread/ThreadList.class.php');

class StartPagePostsBoxListener implements EventListener{
    public $posts;

    public function getThreads(){
        $boardIDs = Board::getAccessibleBoardIDArray();
        if(empty($boardIDs)){
            $boardIDs = array(0);
        }
        $boardIDs = implode(',', $boardIDs);
        $this->posts = new ThreadList();
        $this->posts->sqlConditions .= "boardID IN(".$boardIDs.") AND boardID NOT IN (".STARTPAGE_BOARDS_EXCLUDE.") AND isDisabled = 0 AND movedThreadID = 0";
        $this->posts->limit = STARTPAGE_TOPX_LIMIT;
        $this->posts->readThreads();
        return $this->posts->threads;
    }
    
    public function execute($eventObj, $className, $eventName) {
        WCF::getTPL()->assign(array('threads' => $this->getThreads()));
    }
    
}
?>