<?php /* Smarty version Smarty 3.1.4, created on 2014-01-19 13:39:24
         compiled from "/home/sleepdia/libinc/smarty/templates/blocks/text/editer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171851122152d35efb914b20-20296653%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a4e96d4c2889224c68006449d627346fca11c0b' => 
    array (
      0 => '/home/sleepdia/libinc/smarty/templates/blocks/text/editer.tpl',
      1 => 1390131402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171851122152d35efb914b20-20296653',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52d35efb97f38',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d35efb97f38')) {function content_52d35efb97f38($_smarty_tpl) {?>

<div id="<?php echo $_smarty_tpl->tpl_vars['item']->value['contentID'];?>
" class="block-edit text" data-contentid="<?php echo $_smarty_tpl->tpl_vars['item']->value['contentID'];?>
">
	<div class="content">
		<?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>

	</div>
</div>
<?php }} ?>