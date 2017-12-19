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

/**************************************
 * Registro Custom Post type Produtos
 **************************************/
add_action('init', 'register_post_produtos');
function register_post_produtos() { 
  $labels = array(
    'name' => _x('Produtos', 'post type general name'),
    'singular_name' => _x('Produto', 'post type singular name'),
    'add_new' => _x('Adicionar Produto', 'Novo Produto'),
    'add_new_item' => __('Novo Produto'),
    'edit_item' => __('Editar Produto'),
    'new_item' => __('Novo Produto'),
    'view_item' => __('Ver Produto'),
    'search_items' => __('Procurar Produtos'),
    'not_found' =>  __('Nenhum registro encontrado'),
    'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
    'parent_item_colon' => '',
    'menu_name' => 'Produtos'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'public_queryable' => true,
    'show_ui' => true,           
    'query_var' => true,
    'rewrite' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-pressthis',
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array('slug'=>'produtos'), 
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
  );
 
  register_post_type( 'produtos' , $args );
  flush_rewrite_rules();
}