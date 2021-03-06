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
<form method="post" action="index.php?action=BoxListSort">
	<div class="border borderMarginRemove">
		<table class="tableList">
			<thead>
				<tr class="tableHead">
					<th>{lang}wbb.acp.startpage.boxlist.id{/lang}</th>                
					<th>{lang}wbb.acp.startpage.boxlist.name{/lang}</th>
					<th>{lang}wbb.acp.startpage.boxlist.type{/lang}</th>
					<th>{lang}wbb.acp.startpage.boxlist.showorder{/lang}</th>
				</tr>
			</thead>
			<tbody id="boxList">
				{foreach from=$boxes item=box}
				<tr class="{cycle values="container-1,container-2"}">
					<td class="columnIcon">
						<div class="buttons">
							{if $box.isDeletable == 0}
							<img src="{@RELATIVE_WCF_DIR}icon/editDisabledS.png" alt="" title="{lang}wbb.acp.startpage.box.edit{/lang}" />
							<img src="{@RELATIVE_WCF_DIR}icon/deleteDisabledS.png" alt="" title="{lang}wbb.acp.startpage.box.delete{/lang}" />
							{else}
							<a href="index.php?form=StartPageBoxEdit&boxID={$box.boxID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">
								<img src="{@RELATIVE_WCF_DIR}icon/editS.png" alt="" title="{lang}wbb.acp.startpage.box.edit{/lang}" />
							</a>
							<a onclick="return confirm('{lang}wbb.acp.startpage.box.delete.sure{/lang}')" href="index.php?action=StartPageBoxDelete&boxID={$box.boxID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">
								<img src="{@RELATIVE_WCF_DIR}icon/deleteS.png" alt="" title="{lang}wbb.acp.startpage.box.delete{/lang}" />
							</a>
							{/if}
							{if $box.active == 0}
							<a href="index.php?action=StartPageBoxEnable&amp;boxID={$box.boxID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">
									<img src="{@RELATIVE_WCF_DIR}icon/disabledS.png" alt="" title="{lang}wbb.acp.startpage.box.enable{/lang}" />
							 </a>
							{else}
							<a href="index.php?action=StartPageBoxDisable&amp;boxID={$box.boxID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">
								<img src="{@RELATIVE_WCF_DIR}icon/enabledS.png" alt="" title="{lang}wbb.acp.startpage.box.disable{/lang}" />
							 </a>
							{/if}
						</div>
					</td>
					<td>
						{$box.boxName}
					</td>
					<td>
						{lang}wbb.acp.startpage.box.type.{$box.boxType}{/lang}
					</td>
					<td>
						{if $this->user->getPermission('admin.startpage.canEditBoxes')}
						<select name="boxShowOrder[{$box.boxID}]">
							{section name='position' loop=$boxCount}
								<option value="{$position+1}" {if $position+1==$box.showOrder}selected="selected" {/if}>{$position+1}</option>
							{/section}
						</select>
						{else}
						{$box.showOrder}
						{/if}
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
	<div class="formSubmit">
			<input type="submit" accesskey="s" value="{lang}wcf.global.button.submit{/lang}" />
			<input type="reset" accesskey="r" id="reset" value="{lang}wcf.global.button.reset{/lang}" />
			<input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
	 		{@SID_INPUT_TAG}
	 </div>
</form>
{include file="footer"}