{include file="documentHeader"}
<head>
	<title>{lang}wbb.start.title{/lang} - {lang}{PAGE_TITLE}{/lang}</title>
	{include file='headInclude' sandbox=false}
</head>
<body{if $templateName|isset} id="tpl{$templateName|ucfirst}"{/if}>
{include file='header' sandbox=false}

<div id="main">
		<div class="mainHeadline">
			<img src="{icon}startL.png{/icon}" alt="" />
			<div class="headlineContainer">
				<h2>{lang}{PAGE_TITLE}{/lang}</h2>
				<p>{lang}{PAGE_DESCRIPTION}{/lang}</p>
			</div>
		</div>
		{if $userMessages|isset}{@$userMessages}{/if}
		{if $additionalTopContents|isset}{@$additionalTopContents}{/if}

		<!--Box System-->
		<div class="border">
			<div class="layout-2">
				<div class="columnContainer">
					<div class="container-1 column first">
						<div class="columnInner">
							<div class="contentBox">
								<!--left Boxes-->
								{foreach from=$leftBoxes item=box}
								{assign var=boxName value=$box->boxName}
								{include file="$boxName"}
								{/foreach}
							</div>
						</div>
					</div>
					<div class="container-3 column second">
						<div class="columnInner">
							<div class="contentBox">
								<!--right Boxes-->
								{foreach from=$rightBoxes item=box}
								{assign var=boxName value=$box->boxName}
								{include file="$boxName"}
								{/foreach}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{if $additionalBoxes|isset}
			<div class="border infoBox">
				{@$additionalBoxes}
			</div>
		{/if}
		<div style="text-align: center;">
			{lang}wbb.start.copyright{/lang}
		</div>
	</div>
	{include file='footer' sandbox=false}
</body>
</html>