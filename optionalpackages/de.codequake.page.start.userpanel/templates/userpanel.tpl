
    <div class="startUserpanel">
	{if $user->userID != 0}
        <div class="userAvatar userInfoAvatar">
            {if $user->getAvatar()}{@$user->getAvatar()}{else}<img src="{RELATIVE_WCF_DIR}images/avatars/avatar-default.png" alt="" style="width:100px;" />{/if}
        </div>
        <div class="userInfo smallFont">
            <p class="userName startName">{$user->username}</p>
            <div class="rankImage">
                {@$user->getRank()}
            </div>
            <dl>
                <dt>{lang}wbb.start.userpanel.posts{/lang}</dt>
                <dd>{#$posts}</dd>
                <dt>{lang}wbb.start.userpanel.points{/lang}</dt>
                <dd>{#$user->activityPoints}</dd>
            </dl>
        </div>
		{else}
		<div class="loginStart">
				<div class="largeButtons">
				<ul>
					<li class="loginButton" style="width: 100%;"><a href="index.php?form=UserLogin{@SID_ARG_2ND}"><img src="{icon}passwordM.png{/icon}" alt="" /> <span>{lang}wcf.user.login{/lang}</span></a></li>
					<li class="regButton" style="width: 100%;"><a href="index.php?page=Register{@SID_ARG_2ND}"><img src="{icon}registerM.png{/icon}" alt="" /> <span>{lang}wcf.user.register.title{/lang}</span></a></li>
				</ul>
				</div>
				<p><a href="index.php?form=LostPassword{@SID_ARG_2ND}"><img src="{icon}lostPasswordS.png{/icon}" alt=""/><span>{lang}wcf.user.lostPassword.title{/lang}</span></a></p>
		</div>
		{/if}
        <br />
        <div class="startStats smallFont">
            <h3>{lang}wbb.start.userpanel.stats{/lang}</h3>
            <dl>
                <dt>{lang}wbb.start.userpanel.posts{/lang}</dt>
                <dd>{#$stats.posts}</dd>
                <dt>{lang}wbb.start.userpanel.threads{/lang}</dt>
                <dd>{#$stats.threads}</dd>
                <dt>{lang}wbb.start.userpanel.users{/lang}</dt>
                <dd>{#$stats.members}</dd>
                <dt>{lang}wbb.start.userpanel.users.new{/lang}</dt>
                <dd><a href="index.php?page=User&amp;userID={@$stats.newestMember->userID}{@SID_ARG_2ND}">{$stats.newestMember->username}</a></dd>
            </dl>
        </div>
		</div>