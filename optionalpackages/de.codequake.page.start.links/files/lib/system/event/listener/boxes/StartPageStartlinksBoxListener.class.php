<?php
//wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'lib/data/linkList/link/LinkListLinkList.class.php');
require_once(WCF_DIR.'lib/data/linkList/category/LinkListCategory.class.php');


class StartPageStartlinksBoxListener implements Eventlistener{
    public $links = array();

    public function execute($eventObj, $className, $eventName) {
        $categoryIDs = LinkListCategory::getAccessibleCategoryIDArray();
        if (empty($categoryIDs)) {
			$categoryIDs = array(0);
		}

		$categoryIDs = implode(',', $categoryIDs);
        $sql = "SELECT linkList_link.linkID, linkList_link.subject, linkList_link.time, linkList_link.categoryID, linkList_link.userID
			FROM		wcf".WCF_N."_linklist_link linkList_link
			WHERE linkList_link.isDisabled = 0 AND linkList_link.isDeleted = 0 AND linkList_link.categoryID IN(".$categoryIDs.")
			ORDER BY linkList_link.time DESC";
		$result = WCF::getDB()->sendQuery($sql, STARTPAGE_LINKS_LIMIT);
        while ($row = WCF::getDB()->fetchArray($result)) {
			$this->links[] = new ViewableLinkListLink(null, $row);
		}
        WCF::getTPL()->assign(array('links' => $this->links));
    }
}
?>