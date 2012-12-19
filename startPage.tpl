{include file='documentHeader'}
<head>
    <title>{lang}wbb.startPage.title{/lang} - {lang}{PAGE_TITLE}{/lang}</title>
    {include file='headInclude' sandbox=false}
</head>
<body {if $templateName|isset} id ="{$templateName|ucfirst}"{/if}>
{include file='header' sandbox=false}
    <div id="main">
        <div class="mainHeadline">
            <img src="{icon}startL.png{/icon} alt="" />
            <div class="headlineContainer">
                <h2>{lang}{PAGE_TITLE}{/lang}</h2>
                <p>{lang}{PAGE_DESCRIPTION}{/lang}</p>
            </div>
        </div>
        {if $userMessages|isset}{@$userMessages}{/if}
        {if $additionalTopContents|isset}{@$additionalTopContents}{/if}
        
		<div>
			{foreach from=$rightBoxes item=box}
				{assign var=boxName value=$box->boxName}
				{include file="$boxName"}
			{/foreach}
		</div>

    </div>
    {include file='footer' sandbox=false}
</body>
</html>