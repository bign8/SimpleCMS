		<div id="uiDialogGenInfo">
		<div id="uiGenInfoMsg">Testing</div>
	</div>
		</div> <!-- /layout container -->
						</div><!-- sf_content -->
					</div><!-- sf_region6 -->
				<!-- </div> --><!-- /sf_main_wrapper -->
			</div><!-- /sf_main -->
		</div><!-- /sf_wrapper -->
	</div><!-- /sf_outer_wrapper -->
	<footer>
		<img src="/img/facebook.png" />
		<img src="/img/twitter.png" />
		<br />
		<strong>LINKS:</strong>
		<a href="http://www.aasmnet.org" target="blank">AASM net</a>
		<a href="http://www.JournalSleep.org" target="blank">Journal Sleep</a>
		<a href="http://www.ABSM.org" target="blank">ABSM</a>
		<a href="http://www.AASTweb.org" target="blank">AASTweb</a>
		<a href="http://www.sleepfoundation.org" target="blank">Sleep Foundation</a>
		<a href="http://www.narcolepsynetwork.org/" target="blank">Narcolepsy Network</a>
		<a href="http://www.sleepapnea.org/" target="blank">Sleep Apnea</a>
		<br /><br />
		Content copyright &copy; <script type='text/javascript'>document.write(new Date().getFullYear());</script>. Sleep Diagnostics, Inc. All rights reserved.
	</footer>	
	<div id="editorNav">
		<ul>
		<!-- {if $isEditer}
			{if !isset($smarty.get.mode) || $smarty.get.mode != 'edit'}
				<li><a href="{$smarty.server.REQUEST_URI}?mode=edit" class="ui-icon ui-icon-pencil" title="Edit Page">Edit</a></li>
			{else}
				<li><a href="{$smarty.server.REQUEST_URI}" class="ui-icon ui-icon-circle-close" title="Close Editor">Close</a></li>
			{/if}
			{*<a href="/logout">LOGOUT</a>&nbsp;&nbsp;&nbsp;&nbsp;*}
			<li><a href="/user.php?action=forceLogout" onclick="return General.logout()" class="ui-icon ui-icon-power" title="Logout of Editor">Logout</a></li>
		{else}
			{*<a href="/login">LOGIN</a> need a fix for javascript-less browsers - have that user.php display a form or something*}
			<li><a href="/user.php?action=forceLogin" onclick="return General.login()" class="ui-icon ui-icon-key" title="Login to Editor">Login</a></li>
		{/if}
		{if $isEditer && $is404}
			<li><a href="/newPage">MAKE IT A PAGE NOW!!!</a></li>
		{/if} -->
		{* NEW BELOW OLD ABOVE *}
		{if $isEditer}
			{if !isset($smarty.get.mode) || $smarty.get.mode != 'edit'}
				<li><a href="{$smarty.server.REQUEST_URI}?mode=edit" class="ui-icon ui-icon-pencil" title="Edit Page">Edit</a></li>
			{else}
				<li id="orderDisable" style="display:none"><a href="#shuffle!" class="ui-icon ui-icon-check" title="Save Re-order" onclick="return Editor.orderDisable();">Save Re-order</a></li>
				<li id="orderEnable"><a href="#shuffle!" class="ui-icon ui-icon-shuffle" title="Re-order Content" onclick="return Editor.orderEnable();">Re-order Content</a></li>
				<li><a href="{$smarty.server.REQUEST_URI}" onclick="return Editor.exit()" class="ui-icon ui-icon-circle-close" title="Close Editor">Close</a></li>
			{/if}
			{*<a href="/logout">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;*}
			<li><a href="/user.php?action=forceLogout" onclick="return General.logout()" class="ui-icon ui-icon-power" title="Logout of Editor">Logout</a></li>
		{else}
			{*<a href="/login">Login</a> need a fix for javascript-less browsers - have that user.php display a form or something*}
			<li><a href="/user.php?action=forceLogin" onclick="return General.login()" class="ui-icon ui-icon-key" title="Login to Editor">Login</a></li>
		{/if}
		{if $isEditer && $is404}
			<li><a href="/newPage">MAKE IT A PAGE NOW!!!</a></li>{* only show if correct extension *}
		{/if}
		</ul>
	</div>
</body>
</html>