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
          <div class="messageContentInner container-{cycle name=messageCycle}">
              <div class="messageHeader">
                <div class="containerIconLarge">
                  <img src="{icon}{$entry->getIconName()}M.png{/icon}" alt="" />
                </div>
                <div class="containerContent" style="padding-left: 15px;">
                  <h2 class="messageTitle">
                    <a href="index.php?page=Thread&amp;threadID={$entry->threadID}{@SID_ARG_2ND}">{$entry->prefix}{$entry->topic}</a>
                  </h2>
                  <div class="firstPost light">
                    {lang}wbb.start.news.entry.by{/lang}
                  </div>
                </div>
              </div>
              <div class="messageContent newsContent" style="border-style: none;">
                <div class="messageContentInner">
                  {@$parser->parse($entry->message, $entry->enableSmilies, $entry->enableHtml, $entry->enableBBCodes)|truncatehtml:STARTPAGE_NEWS_TRUNCATE:false:'...'}
                </div>
              </div>
            <div class="messageFooter">
              <div class="smallButtons">
                <ul>
                  <li>
                    <a href="index.php?page=Thread&amp;threadID={$entry->threadID}{@SID_ARG_2ND}">
                      <span>
                        <img src="{icon}userRank1S.png{/icon}" alt="" /> {lang}wbb.start.news.continue{/lang}
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="index.php?page=Thread&amp;threadID={$entry->threadID}{@SID_ARG_2ND}">
                      <span>
                        <img src="{icon}commentS.png{/icon}" alt="" /> {lang}wbb.start.news.comments{/lang}
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    {/foreach}
</div>