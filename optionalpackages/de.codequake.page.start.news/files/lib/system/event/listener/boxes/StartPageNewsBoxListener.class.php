<?php
//wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/MessageParser.class.php');
//wbb imports
require_once(WBB_DIR.'lib/data/thread/ThreadList.class.php');

class StartPageNewsBoxListener implements EventListener{
    public $news;

    public function getNews(){
        //get BoardIDs User can visit
        $boardIDs = Board::getAccessibleBoardIDArray();
        if(empty($boardIDs)){
            $boardIDs = array(0);
        }
        //Check if user can visit news boards
        $newsBoards = preg_split('#,#', STARTPAGE_NEWS_BOARDS);        
        $boardIDs = array_intersect($boardIDs, $newsBoards);
        $boardIDs = implode(',', $boardIDs);
        
        //read Threads
        $this->news = new ThreadList();
        if(!empty($boardIDs)){
            $this->news->sqlConditions .= "boardID IN(".$boardIDs.")";
            $this->news->sqlSelects .= " firstpost.message, firstpost.enableSmilies, firstpost.enableHtml, firstpost.enableBBCodes, ";
            $this->news->sqlJoins .= "LEFT JOIN wbb".WBB_N."_post firstpost ON (firstpost.postID = thread.firstPostID)";
            $this->news->sqlOrderBy = 'thread.time DESC';
            $this->news->limit = STARTPAGE_NEWS_LIMIT;
            $this->news->readThreads();
            return $this->news->threads;
        }
        else return;
    }
    
    public function execute($eventObj, $className, $eventName) {
        
        $parser = MessageParser::getInstance();
        $parser->setOutputType('text/html');
        $this->news = $this->getNews();
        
        //get vars into tpl ;)
        WCF::getTPL()->assign(array('news' => $this->news,
                                    'parser' => $parser));
    }
}
?>