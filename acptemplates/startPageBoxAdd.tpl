{include file='header'}

<div class="mainHeadline">
    <img src="{@RELATIVE_WCF_DIR}/icon/boxAddL.png" alt="" />
    <div class="headlineContainer">
        <h2>{lang}wbb.acp.startpage.box.add{/lang}</h2>
    </div>
</div>

{if $errorField}
    <p class="error">{lang}wcf.global.form.error{/lang}</p>
{/if}

{if $success|isset}
    <p class="success">{lang}wbb.acp.startpage.box.add.success{/lang}</p>
{/if}

<div class="contentHeader">
    <div class="largeButtons">
        <ul><li><a href="index.php?page=StartPageBoxList&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/boxListM.png" alt="" title="{lang}wbb.acp.menu.link.content.startpage.box.list{/lang}" /> <span>{lang}wwbb.acp.menu.link.content.startpage.box.list{/lang}</span></a></li></ul>
    </div>
</div>

<form method="POST" action="index.php?form=StartPageBoxAdd">
    <div class="border content">
        <div class="container-1">
            <fieldset>
                <legend></legend>
                <div class="formElement {if $errorField == 'boxname'} formError{/if}">
                    <div class="formFieldLabel">
                        <label for="boxname">{lang}wbb.acp.startpage.boxlist.name{/lang}</label>
                    </div>
                    <div class="formField">
                        <input type="text" class="inputText" name="boxname" id="boxname" value="{$boxname}" />
                        {if $errorField = 'boxname'}
                            <p class="innerError">
                                {if $errorType == 'empty'}{lang}wcf.global.error.empty{/lang}{/if}
                                {if $errorType == 'notUnique'}{lang}wbb.acp.startpage.box.name.error.notunique{/lang}{/if}
                            </p>
                        {/if}
                    </div>
                </div>
                <div class="formElement {if $errorField == 'boxtype'} formError{/if}">
                    <div class="formFieldLabel">
                        <label for="boxtype">{lang}wbb.acp.startpage.boxlist.type{/lang}</label>
                    </div>
                    <div class="formField">
                        <select name="boxtype" id="boxtype">
                            <option value="left" {if $boxtype == 'left'} selected ="selected"{/if}>{lang}wbb.acp.startpage.box.type.left{/lang}</option>
                            <option value="right" {if $boxtype == 'right'} selected ="selected"{/if}>{lang}wbb.acp.startpage.box.type.right{/lang}</option>
                        </select>
                        {if $errorField = 'boxtype'}
                            <p class="innerError">
                                {if $errorType == 'empty'}{lang}wcf.global.error.empty{/lang}{/if}
                            </p>
                        {/if}
                    </div>
                </div>
                <div class="formElement {if $errorField == 'source'} formError{/if}">
                    <div class="formFieldLabel">
                        <label for="source">{lang}wbb.acp.startpage.boxlist.source{/lang}</label>
                    </div>
                    <div class="formField">
                        <textarea name="source" id="source" rows="20" cols="40" wrap="off">{$source}</textarea>
                        {if $errorField = 'source'}
                            <p class="innerError">
                                {if $errorType == 'empty'}{lang}wcf.global.error.empty{/lang}{/if}
                            </p>
                        {/if}
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
        <div class="formSubmit">
        <input type="submit" accesskey="s" value="{lang}wcf.global.button.submit{/lang}" />
        <input type="reset" accesskey="r" value="{lang}wcf.global.button.reset{/lang}" />
        <input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
    </div>
</form>

{include file='footer'}
</form>