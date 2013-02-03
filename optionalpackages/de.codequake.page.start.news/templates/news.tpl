<div class="newsBox">
    <h3 class="subHeadline">
        <img src="{icon}newsM.png{/icon}" alt="" /> {lang}wbb.start.news.title{/lang}
    </h3>

    {if $this->getStyle()->getVariable('messages.color.cycle')}
        {cycle name=messageCycle values='2,1' print=false}
    {else}
        {cycle name=messageCycle values='1' print=false}
    {/if}

    {foreach from=$news item=entry}
        <div class="message threadNo-{$entry->threadID}">
            <div class="messageHeader">
                <div class="containerIcon">
                    <img src="{icon}newsM.png{/icon}" alt="" />
                </div>
                <div class="containerContent">
                    <a href="index.php?page=User&amp;userID={$entry->userID}">{$entry->username}</a> ({@$entry->time|time})
                </div>
            </div>
            <div class="messageBody">
                {@$parser->parse($entry->message, $entry->enableSmilies, $entry->enableHtml, $entry->enableBBCodes)}
            </div>
        </div>
    {/foreach}
</div>