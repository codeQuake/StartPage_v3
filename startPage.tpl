{include file='documentHeader'}
<head>
    <title>{lang}wbb.startPage.title{lang} - {lang}{PAGE_TITLE}{/lang}</title>
    {include file='headInclude' sandbox=false}
</head>
<body {if $templateName|isset} id ="{$templateName|ucfirst}"{/if}>
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
        <!--TODO-->

    </div>
    {include file='footer' sandbox=false}
</body>
</html>