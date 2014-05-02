<?php /* Smarty version Smarty 3.1.4, created on 2014-01-12 22:23:56
         compiled from "/home/sleepdia/libinc/smarty/templates/genHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114508782852d35c4c65b9e6-02450743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf1d1f1bf3780dbc6728ec53ccbbd330749bfa48' => 
    array (
      0 => '/home/sleepdia/libinc/smarty/templates/genHeader.tpl',
      1 => 1388870869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114508782852d35c4c65b9e6-02450743',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dynInclude' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52d35c4c69d84',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d35c4c69d84')) {function content_52d35c4c69d84($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dynInclude']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['foo']->value['type']=='js'){?>
		<script src="<?php echo $_smarty_tpl->tpl_vars['foo']->value['script'];?>
"></script>
	<?php }elseif($_smarty_tpl->tpl_vars['foo']->value['type']=='css'){?>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['foo']->value['script'];?>
" />
	<?php }else{ ?>
	<?php }?>
<?php } ?>

<?php if (isset($_COOKIE['hash'])){?>
	<script src="/js/private.js"></script>
<?php }?><?php }} ?>