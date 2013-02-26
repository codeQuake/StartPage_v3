{include file='header'}
<div class="mainHeadline">
    <img src="{@RELATIVE_WBB_DIR}icon/boxPatternL.png" alt="" />
    <div class="headlineContainer">
        <h2>{lang}wbb.acp.startpage.pattern{/lang}</h2>
    </div>
</div>

<div class="border content patternleft">
    <div class="container-1">
        <h2>{lang}wbb.acp.startpage.pattern.left{/lang}</h2>
		<div class="border" style="width: 300px; float:right;">
            <img src="images/startpage/patternLeft.png" alt="" style="width:300px;" />
        </div>
        <div>{lang}wbb.acp.startpage.pattern.left.description{/lang}</div>
        <br style="clear:both;"/>
        <form action="index.php?form=StartPageBoxAdd" method="post">
            <div class="formSubmit">
                <input type="submit" accesskey="s" value="{lang}wbb.acp.startpage.pattern.choose{/lang}" />
                <input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
                <input type="hidden" name="boxtype" value="left"/>
                <input type="hidden" name="source" value="{$patternLeft}"/>
                 {@SID_INPUT_TAG}
            </div>
        </form>
    </div>
</div>

<div class="border content patternright">
    <div class="container-1">
        <h2>{lang}wbb.acp.startpage.pattern.right{/lang}</h2>
        <div class="border" style="width: 300px; float:right;">
            <img src="images/startpage/patternRight.png" alt="" style="width:300px;"/>
        </div>
        <div>{lang}wbb.acp.startpage.pattern.right.description{/lang}</div>
            <br style="clear:both;"/>
        <form action="index.php?form=StartPageBoxAdd" method="post">
            <div class="formSubmit">
                <input type="submit" accesskey="s" value="{lang}wbb.acp.startpage.pattern.choose{/lang}" />
                <input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
                <input type="hidden" name="boxtype" value="right"/>
                <input type="hidden" name="source" value="{$patternRight}"/>
                 {@SID_INPUT_TAG}
            </div>
        </form>
    </div>
</div>

<div class="border content patternRightList">
    <div class="container-1">
        <h2>{lang}wbb.acp.startpage.pattern.rightlist{/lang}</h2>
        <div class="border" style="width: 300px; float:right;">
            <img src="images/startpage/patternRightList.png" alt="" style="width:300px;"/>
        </div>
        <div>{lang}wbb.acp.startpage.pattern.rightlist.description{/lang}</div>
        <br style="clear:both;"/>
        <form action="index.php?form=StartPageBoxAdd" method="post">
            <div class="formSubmit">
                <input type="submit" accesskey="s" value="{lang}wbb.acp.startpage.pattern.choose{/lang}" />
                <input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
                <input type="hidden" name="boxtype" value="right"/>
                <input type="hidden" name="source" value="{$patternRightList}"/>
                 {@SID_INPUT_TAG}
            </div>
        </form>
    </div>
</div>