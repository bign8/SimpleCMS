<?php /* Smarty version Smarty 3.1.4, created on 2014-04-16 22:31:44
         compiled from "/home/sleepdia/libinc/smarty/templates/start/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92853442352d35c4c75d875-14780473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd33ffc1a8cbbcaaadc356777412faa1566b8cca' => 
    array (
      0 => '/home/sleepdia/libinc/smarty/templates/start/footer.tpl',
      1 => 1397701900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92853442352d35c4c75d875-14780473',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52d35c4c7c846',
  'variables' => 
  array (
    'isEditer' => 0,
    'is404' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d35c4c7c846')) {function content_52d35c4c7c846($_smarty_tpl) {?>		<div id="uiDialogGenInfo">
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
		<!-- <?php if ($_smarty_tpl->tpl_vars['isEditer']->value){?>
			<?php if (!isset($_GET['mode'])||$_GET['mode']!='edit'){?>
				<li><a href="<?php echo $_SERVER['REQUEST_URI'];?>
?mode=edit" class="ui-icon ui-icon-pencil" title="Edit Page">Edit</a></li>
			<?php }else{ ?>
				<li><a href="<?php echo $_SERVER['REQUEST_URI'];?>
" class="ui-icon ui-icon-circle-close" title="Close Editor">Close</a></li>
			<?php }?>
			<li><a href="/user.php?action=forceLogout" onclick="return General.logout()" class="ui-icon ui-icon-power" title="Logout of Editor">Logout</a></li>
		<?php }else{ ?>
			<li><a href="/user.php?action=forceLogin" onclick="return General.login()" class="ui-icon ui-icon-key" title="Login to Editor">Login</a></li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['isEditer']->value&&$_smarty_tpl->tpl_vars['is404']->value){?>
			<li><a href="/newPage">MAKE IT A PAGE NOW!!!</a></li>
		<?php }?> -->
		<?php if ($_smarty_tpl->tpl_vars['isEditer']->value){?>
			<?php if (!isset($_GET['mode'])||$_GET['mode']!='edit'){?>
				<li><a href="<?php echo $_SERVER['REQUEST_URI'];?>
?mode=edit" class="ui-icon ui-icon-pencil" title="Edit Page">Edit</a></li>
			<?php }else{ ?>
				<li id="orderDisable" style="display:none"><a href="#shuffle!" class="ui-icon ui-icon-check" title="Save Re-order" onclick="return Editor.orderDisable();">Save Re-order</a></li>
				<li id="orderEnable"><a href="#shuffle!" class="ui-icon ui-icon-shuffle" title="Re-order Content" onclick="return Editor.orderEnable();">Re-order Content</a></li>
				<li><a href="<?php echo $_SERVER['REQUEST_URI'];?>
" onclick="return Editor.exit()" class="ui-icon ui-icon-circle-close" title="Close Editor">Close</a></li>
			<?php }?>
			<li><a href="/user.php?action=forceLogout" onclick="return General.logout()" class="ui-icon ui-icon-power" title="Logout of Editor">Logout</a></li>
		<?php }else{ ?>
			<li><a href="/user.php?action=forceLogin" onclick="return General.login()" class="ui-icon ui-icon-key" title="Login to Editor">Login</a></li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['isEditer']->value&&$_smarty_tpl->tpl_vars['is404']->value){?>
			<li><a href="/newPage">MAKE IT A PAGE NOW!!!</a></li>
		<?php }?>
		</ul>
	</div>
</body>
</html><?php }} ?>