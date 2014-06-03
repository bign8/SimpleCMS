<?php /* Smarty version Smarty 3.1.4, created on 2014-02-09 22:52:28
         compiled from "/home/sleepdia/libinc/smarty/templates/start/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198162714252d35c4c5e2de4-07115197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a56df53a6852b03b2b02a5d624c353dea95a8d07' => 
    array (
      0 => '/home/sleepdia/libinc/smarty/templates/start/header.tpl',
      1 => 1392004306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198162714252d35c4c5e2de4-07115197',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52d35c4c658cc',
  'variables' => 
  array (
    'title' => 0,
    'desc' => 0,
    'keywords' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d35c4c658cc')) {function content_52d35c4c658cc($_smarty_tpl) {?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
">
	<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
	<link rel="shortcut icon" href="/favicon.png">
	<link rel="icon" href="/favicon.png">
	<!-- <meta name="author" content="Nate Woods"> -->

	<link rel="stylesheet" type="text/css" href="/css/ui-lightness/jquery-ui-1.8.16.custom.css" />
	<link rel="stylesheet" type="text/css" href="/css/Default.css" />
	<script src="/js/jquery-1.7.min.js" ></script>
	<script src="/js/jquery.validate.min.js" ></script>
	<script src="/js/jquery.cookie.js"></script>
	<script src="/js/jquery-ui-1.8.16.custom.min.js" ></script>
	<script src="/js/all.js" ></script>
	<link rel="stylesheet" type="text/css" href="/dynamic/blank/css.css" id="toSwitch" />
	<link rel='stylesheet' href='/js/jquery.nyroModal/styles/nyroModal.css'/>

	<?php if (isset($_GET['mode'])&&$_GET['mode']=='edit'){?>
	<script src="/js/EditAll.js" ></script>
	<?php }?>
	
	<?php echo $_smarty_tpl->getSubTemplate ("genHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body id="page_bbb56820-e12a-47d6-abff-d06189520327" >
	<div class="sf_outer_wrapper">
		<div class="sf_wrapper">

			<nav class="nav">
				<ul>
					<li><a href="/index.sd">Home</a></li>
					<li><a href="/about/index.sd">About Us</a>
						<ul class="subnav">
							<li><a href="/about/staff.sd">Staff</a></li>
							<li><a href="/about/resources.sd">Resources and Forms</a></li>
							<li><a href="/about/locations.sd">Locations</a></li>
							<li><a href="/about/sleepDisorders.sd">Sleep Disorders</a></li>
							<li><a href="/about/innovations.sd">Home Sleep Innovations</a></li>
						</ul>
					</li>
					<li><a href="#/services/">Services</a>
						<ul class="subnav">
							<li><a href="/services/testing.sd">In-Facility Testing</a></li>
							<li><a href="/services/cpap.sd">CPAP</a></li>
							<li><a href="/services/monitoring.sd">Follow Up &amp; Monitoring</a></li>
							<li><a href="/services/insurance.sd">Insurance Providers</a></li>
							<li><a href="/services/education.sd">Continuing Education</a></li>
						</ul>
					</li>
					<li><a href="/contact.sd">Contact</a></li>
				</ul>
			</nav>

			<div class="sf_extra5"><span></span></div>

			<div class="sf_main_wrapper">
				<!-- <div class="sf_main"> -->
					<div class="sf_region6">
						<div class="sf_content">
							<div class="LayoutContainer" ><?php }} ?>