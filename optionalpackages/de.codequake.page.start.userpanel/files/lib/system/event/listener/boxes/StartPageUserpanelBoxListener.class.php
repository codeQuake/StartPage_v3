<?php
//wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'lib/data/user/UserProfile.class.php');
require_once(WCF_DIR.'lib/data/user/avatar/Avatar.class.php');
require_once(WCF_DIR.'lib/data/user/rank/UserRank.class.php');

class StartPageUserpanelBoxListener implements EventListener{

    /**
     ** @see IndexPage::renderStats()
     **/
    protected function renderStats() {
    $stats = WCF::getCache()->get('stat');
    WCF::getTPL()->assign('stats', $stats);
    }
    
    public function execute($eventObj, $className, $eventName) {
        $this->renderStats();
        $styles = '<style type="text/css">.startStats h3{font-size: 15px !important;} .userInfoAvatar{float:left;} .userInfoAvatar img{max-width: 100px !important; max-height: 100px !important;} .userInfo{margin-left: 110px;} .startName{font-size: 15px;} .startUserpanel dt{float:left;} .startUserpanel dd{text-align:right; display:block;}</style>';
        $user = new UserProfile(WCF::getUser()->userID);
        $sql = "SELECT posts FROM wbb".WBB_N."_user WHERE userID = ".WCF::getUser()->userID;
        $posts = WCF::getDB()->getFirstRow($sql);
        WCF::getTPL()->assign(array('user' => $user,
                                    'posts' => $posts['posts'],
                                    'specialStyles' => $styles));
        
    }
}

?>