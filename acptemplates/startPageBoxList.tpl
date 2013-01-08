{include file='header'}
<div class="mainHeadline">
    <img src="{@RELATIVE_WBB_DIR}icon/boxListL.png" alt="" />
    <div class="headlineContainer">
        <h2>{lang}wbb.acp.startpage.boxlist{/lang}</h2>
    </div>
</div>

<div class="contentHeader">
    <div class="largeButtons">
		<ul>
            <li>
                <a href="index.php?form=StartPageBoxAdd&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">
                    <img src="{@RELATIVE_WBB_DIR}icon/boxAddM.png" alt="" title="{lang}wbb.acp.startpage.box.add{/lang}" /> 
                    <span>{lang}wbb.acp.startpage.box.add{/lang}</span>
                </a>
            </li>
		</ul>
	</div>
</div>

<div class="border titleBarpanel">
    <div class="containerHead">
        <h3>
            {lang}wbb.acp.startpage.boxlist{/lang}
        </h3>
    </div>
</div>
<div class="border borderMarginRemove">
    <table class="tableList">
        <thead>
            <tr class="tableHead">
                <th>{lang}wbb.acp.startpage.boxlist.id{/lang}</th>                
                <th>{lang}wbb.acp.startpage.boxlist.name{/lang}</th>
                <th>{lang}wbb.acp.startpage.boxlist.type{/lang}</th>
                <th>{lang}wbb.acp.startpage.boxlist.sortorder{/lang}</th>
            </tr>
        </thead>
        <tbody id="boxList">
            {foreach from=$boxes item=box}
            <tr class="{cycle values="container-1,container-2"}">
                <td>
                    <!--TODO: can edit, can delete ;) -->
                    <img src="{@RELATIVE_WCF_DIR}icon/editDisabledS.png" alt="" title="{lang}wcf.acp.startpage.box.edit{/lang}" />
                    <img src="{@RELATIVE_WCF_DIR}icon/deleteDisabledS.png" alt="" title="{lang}wcf.acp.box.delete{/lang}" />
                    {if $box.active == 0}
                    <a href="index.php?action=StartPageEnableBox&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">
                            <img src="{@RELATIVE_WCF_DIR}icon/enabledS.png" alt="" title="{lang}wcf.acp.startpage.box.enable{/lang}" />
                     </a>
                    {else}
                    <a href="index.php?action=StartPageDisbaleBox&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">
                        <img src="{@RELATIVE_WCF_DIR}icon/disabledS.png" alt="" title="{lang}wcf.acp.startpage.box.disable{/lang}" />
                     </a>
                    {/if}
                </td>
                <td>
                    {$box.boxName}
                </td>
                <td>
                    {lang}wbb.acp.startpage.box.type.{$box.boxType}{/lang}
                </td>
                <td>
                    {$box.showOrder}
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{include file="footer"}