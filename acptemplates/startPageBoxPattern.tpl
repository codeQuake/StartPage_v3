{include file='header'}
<div class="mainHeadline">
    <img src="{@RELATIVE_WBB_DIR}icon/boxListL.png" alt="" />
    <div class="headlineContainer">
        <h2>{lang}wbb.acp.startpage.boxlist{/lang}</h2>
    </div>
</div>

<div class="border content patternleft">
    <div class="container-1">
        <h2>{lang}wbb.acp.startpage.pattern.left{/lang}</h2>
        <form action="index.php?form=StartPageBoxAdd">
            <div class="formSubmit">
                <input type="submit" accesskey="s" value="{lang}wcf.global.button.submit{/lang}" />
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
        <form action="index.php?form=StartPageBoxAdd">
            <div class="formSubmit">
                <input type="submit" accesskey="s" value="{lang}wcf.global.button.submit{/lang}" />
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
        <form action="index.php?form=StartPageBoxAdd">
            <div class="formSubmit">
                <input type="submit" accesskey="s" value="{lang}wcf.global.button.submit{/lang}" />
                <input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
                <input type="hidden" name="boxtype" value="right"/>
                <input type="hidden" name="source" value="{$patternRightList}"/>
                 {@SID_INPUT_TAG}
            </div>
        </form>
    </div>
</div>