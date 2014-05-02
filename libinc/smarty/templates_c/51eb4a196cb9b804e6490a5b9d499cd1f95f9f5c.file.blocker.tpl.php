<?php /* Smarty version Smarty 3.1.4, created on 2014-01-12 22:23:56
         compiled from "/home/sleepdia/libinc/smarty/templates/blocks/blocker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207110180352d35c4c6ae507-37878879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51eb4a196cb9b804e6490a5b9d499cd1f95f9f5c' => 
    array (
      0 => '/home/sleepdia/libinc/smarty/templates/blocks/blocker.tpl',
      1 => 1388870869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207110180352d35c4c6ae507-37878879',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'content' => 0,
    'foo' => 0,
    'vfsID' => 0,
    'blocks' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52d35c4c75994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d35c4c75994')) {function content_52d35c4c75994($_smarty_tpl) {?><?php if (isset($_GET['mode'])&&$_GET['mode']=='edit'){?>
	<div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="sortable">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value[$_smarty_tpl->tpl_vars['id']->value])){?>
			<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['content']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['foo']->value['editer'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('item'=>$_smarty_tpl->tpl_vars['foo']->value), 0);?>

			<?php } ?>
		<?php }?>
	</div>
	<div class="block add-new" onClick="Editer.displayAddForm(this)">
		<span class="add-new-text">Click Here to add a new content block</span>
		<form class="add-new-form" style="display:none;" onreset="Editer.revert(this)" onsubmit="Editer.addContent(<?php echo $_smarty_tpl->tpl_vars['vfsID']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
', this); return false;" >
			<select name="type_id" onchange="Editer.loadDesc(this)">
				<option value="null" disabled="disabled">-- Select --</option>
				<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blocks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['blockID'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['foo']->value['description'];?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
</option>
				<?php } ?>
			</select>&nbsp;
			<span class="add-new-form-desc">Content type</span>
			<br/>
			<input type="submit" value="Add Content" />
			<input type="reset" value="Cancel" />
			<img class="loader" src="/images/ajax-loader.gif" style="display:none;" />
		</form>
	</div>
<?php }else{ ?>
	<?php if (isset($_smarty_tpl->tpl_vars['content']->value[$_smarty_tpl->tpl_vars['id']->value])){?>
		<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['content']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['foo']->value['renderer'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('item'=>$_smarty_tpl->tpl_vars['foo']->value), 0);?>
<?php } ?>
	<?php }?>
<?php }?><?php }} ?>