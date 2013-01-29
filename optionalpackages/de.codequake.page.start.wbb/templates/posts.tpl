<div class="border posts">
    <div class="containerHead">
        <h3>
            {lang}wbb.start.posts.title{/lang}
        </h3>
    </div>
    <ul class="dataList">
        {if $this->getStyle()->getVariable('messages.color.cycle')}
                {cycle name=messageCycle values='2,1' print=false}
           {else}
                {cycle name=messageCycle values='1' print=false}
        {/if}
        {foreach from=$threads item=thread
            <li class="container-{cycle name=messageCycle}">
                <div class="containerIcon">
                    <img src="{icon}{$thread->getIconName()}M.png{/icon}" alt="" />
                </div>
                <div class="containerContent">
                    <p class="thread">
                        <a href="index.php?page=Thread&amp;threadID={$thread->threadID}&amp;action=lastPost{@SID_ARG_2ND}">
                            <span class="prefix">
                                {$thread->prefix}
                            </span>
                            <span class="topic">
                                {$thread->topic|truncate:STARTPAGE_TOPIC_LIMIT:"..."}
                            </span>
                        </a>
                         <span class="light">
                             <a href="index.php?page=User&amp;userID={$thread->lastPosterID}{@SID_ARG_2ND}">
                                 {$thread->lastPoster}
                             </a>
                               ({@$thread->lastPostTime|time})
                        </span>
                    </p>
                    
                </div>
            </li>
        {/foreach}
    </ul>
</div>