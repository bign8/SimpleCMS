<?php /* Smarty version Smarty 3.1.4, created on 2014-02-11 00:03:29
         compiled from "/home/sleepdia/libinc/smarty/templates/blocks/text/render.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120821096552d35c4dd1b697-01190141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b90556ab8c7a1d1db191c8cba34b8768e25537a' => 
    array (
      0 => '/home/sleepdia/libinc/smarty/templates/blocks/text/render.tpl',
      1 => 1392069656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120821096552d35c4dd1b697-01190141',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52d35c4dd7c23',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d35c4dd7c23')) {function content_52d35c4dd7c23($_smarty_tpl) {?><div class="block text">
<?php $_template = new Smarty_Internal_Template('eval:'.$_smarty_tpl->tpl_vars['item']->value['content'], $_smarty_tpl->smarty, $_smarty_tpl);echo $_template->fetch(); ?>
</div><?php }} ?>