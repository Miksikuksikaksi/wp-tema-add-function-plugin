<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php
		if(is_singular() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
			}
		wp_head();
	?>
</head>
<body>
	<div class="wrap">
		<div id="wrapper">
			<header>
			    <div class="mh-top-menu">
			    	<?php wp_nav_menu(); ?>
			    </div>
			    <h3 class="mh-top-quote">'The enemy of art is the <br> absence of limitations. '</h3>
			</header>