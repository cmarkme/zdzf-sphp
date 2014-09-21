<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?php echo show_title(); ?></title>
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?php echo site_url('themes/default/css/style.css'); ?>" type="text/css" media="all" />
<link rel="stylesheet" id="sitestyle" href="<?php get_theme_style(); ?>" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo $this->load->theme_css('print'); ?>" type="text/css" media="print" />

<script type="text/javascript" src="<?php echo site_url('themes/default/js/jquery.1.7.2 .min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('themes/default/js/jquery-ui-1.9.1.custom.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('themes/default/js/jquery-ui-timepicker-addon.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('themes/default/js/jquery.combobox.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('themes/default/js/jquery.numeric.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('themes/default/js/jquery.maskedinput.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('themes/default/js/scripts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('themes/default/js/ckeditor/ckeditor.js'); ?>"></script>
</head>
 
<body class="ui-state-default">
<div id="wrapper">
	<div id="menu_area" class="ui-tabs ui-widget ui-widget-content">

		<?php echo anchor(site_url(), img(array('src' => 'themes/default/images/logo_alz.png', 'id' => 'alz_logo'))); ?>
		<?php list_admin_menu() ?>
	</div>
	<div id="body">
		<div id="content">