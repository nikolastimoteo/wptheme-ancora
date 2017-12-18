<?php 

/**************************************
 *  THEME SUPORT
 **************************************/
function add_suport_theme(){
    add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme','add_suport_theme');

/**************************************
 * Registro Menu Personalizado
 **************************************/
function add_menu_support() {
    add_theme_support( 'menus' );
}
add_action( 'after_setup_theme', 'add_menu_support' );
register_nav_menus( array(
    'primary' => __( 'Menu Navbar', 'top' ),
) );

/**************************************
 *  SCRIPTS / CSS
 **************************************/
function wp_responsivo_scripts() {
  // Carregando CSS header
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  
  // Carregando Scripts footer
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery-slim', get_template_directory_uri() . '/assets/js/jquery-slim.min.js', array(), '', true);
  wp_enqueue_script('popper-js', get_template_directory_uri().'/assets/js/popper.min.js', array('jquery-slim'), '', true  );
  wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery-slim'), '', true  );
}
add_action( 'wp_enqueue_scripts', 'wp_responsivo_scripts' );