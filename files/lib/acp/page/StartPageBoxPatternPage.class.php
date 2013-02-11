<?php
//wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');

class StartPageBoxPatternPage extends AbstractPage{
    public $templateName = "startPageBoxPattern";
    public $patternLeft;
    public $patternRight;
    public $patternRightList;
    
    public function readData(){
        parent::readData();
        $this->patternLeft = ' <div class="mybox">
                                    <h3 class="subHeadline"><!--Title--></h3>
                                    <div class="mycontent">
                                     <!--Content-->
                                    </div>
                                </div>';
        $this->patternRight = '<div class="border">
                                <div class="containerHead">
                                    <!--Title-->
                                </div>
                                 <div class="container-1">
                                    <!--Content-->
                                 </div>
                               </div>';
        $this->patternRightList = '<div class="border">
                                <div class="containerHead">
                                    <!--Title-->
                                </div>
                                 <ul class="dataList">
                                        <li class="container-1"><!--Content--></li>
                                        <li class="container-2"><!--Content--></li>
                                 </ul>
                               </div>';
    }
    public function assignVariables(){
        parent::assignVariables();
            WCFACP::getMenu()->setActiveMenuItem('wbb.acp.menu.link.content.startpage');
            WCF::getTPL()->assign(array('patternLeft' => $this->patternLeft,
                                        'patternRight' => $this->patternRight,
                                        'patternRightList' => $this->patternRightList));
        }
}
?>