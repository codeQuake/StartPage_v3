<div class="border newestLinks">
    <div class="containerHead">
        {lang}wbb.start.links.title{/lang}
    </div>
    <ul class="dataList">
        {cycle values='container-1,container-2' name='messageCycle' print=false advance=false}
        {foreach from=$links item=link}
            <li class="{cycle name='messageCycle'}">
                <div class="containerIcon">
                    <img src="{icon}{$link->getIconName()}M.png{/icon}" alt="" />
                </div>
                <div class="containerContent">
                    <p class="linkSubject">
                        <a href="index.php?page=LinkListLink&amp;linkID={@$link->linkID}{@SID_ARG_2ND}">
                            <span>{$link->subject}</span>
                        </a> 
                    </p>
                    <p class="light smallFont">
                        {lang}wbb.start.links.by{/lang}
                        {if $link->userID}
                            <a href="index.php?page=User&amp;userID={$link->userID}{@SID_ARG_2ND}">{$link->getAuthor()->username}</a>
                        {else}
                            {$link->username}
                        {/if} 
                        <span class="light smallFont">({@$link->time|shorttime})</span>
                    </p>
                </div>
            </li>
        {/foreach}
    </ul>
</div>