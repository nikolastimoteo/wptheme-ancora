<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body>
<div class="header">
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-custom">
		<div class="container">
	      <a class="navbar-brand" href="#"><h2><?php bloginfo( 'name' ); ?></h2></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <?php require_once('assets/includes/bs4navwalker.php');
	      wp_nav_menu([
				     'menu'            => 'top',
				     'theme_location'  => 'primary', // criado na register_nav_menus do functions.php
				     'container'       => 'div',
				     'container_id'    => 'navbarSupportedContent',
				     'container_class' => 'collapse navbar-collapse',
				     'menu_id'         => false,
				     'menu_class'      => 'navbar-nav mr-auto',
				     'depth'           => 2,
				     'fallback_cb'     => 'bs4navwalker::fallback',
				     'walker'          => new bs4navwalker()
				   ]);
		  ?>
      	</div>
    </nav>
</div>
