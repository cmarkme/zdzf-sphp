<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?php echo show_title(); ?></title>
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?php echo site_url('application/views/css/style.css'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo site_url('application/views/css/custom-theme/jquery-ui-1.8.18.custom.css'); ?>" type="text/css" media="screen" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('application/views/js/scripts.js'); ?>"></script>
</head>
 
<body>
<div id="wrapper">
	<div id="menu_area" class="ui-tabs ui-widget ui-widget-content">

		<?php echo img(array('src' => 'application/views/images/logo_alz.png', 'id' => 'alz_logo')); ?>
		<?php list_admin_menu() ?>
	</div>
	<div id="body">
		<div id="content">