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
  wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.css' );
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
    'menu_icon' => 'dashicons-cart',
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array('slug'=>'produtos'), 
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
  );
 
  register_post_type( 'produtos' , $args );
  flush_rewrite_rules();
}

/**************************************
 * Registro Custom Post type Clientes
 **************************************/
add_action('init', 'register_post_clientes');
function register_post_clientes() { 
  $labels = array(
    'name' => _x('Clientes', 'post type general name'),
    'singular_name' => _x('Ciente', 'post type singular name'),
    'add_new' => _x('Adicionar Cliente', 'Novo Cliente'),
    'add_new_item' => __('Novo Cliente'),
    'edit_item' => __('Editar Cliente'),
    'new_item' => __('Novo Cliente'),
    'view_item' => __('Ver Cliente'),
    'search_items' => __('Procurar Clientes'),
    'not_found' =>  __('Nenhum registro encontrado'),
    'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
    'parent_item_colon' => '',
    'menu_name' => 'Clientes'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'public_queryable' => true,
    'show_ui' => true,           
    'query_var' => true,
    'rewrite' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-store',
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array('slug'=>'clientes'), 
    'menu_position' => 5,
    'supports' => array('title','thumbnail'),
  );
 
  register_post_type( 'clientes' , $args );
  flush_rewrite_rules();
}

/**************************************
 * Envia email de contato
 **************************************/
function enviaEmail(){
  $to = get_option('admin_email');
  $subject = "Mensagem do Site Âncora Pescados Congelados";
  $content = "De: ".$_POST['nome'].". Mensagem: ".$_POST['mensagem'];
  $headers = array(
    'Reply-To' => $_POST['email']
  );
  $status = wp_mail($to, $subject, $content, $headers);
  return $status;
}

/**************************************
 * Registro de widgets do footer
 **************************************/
function register_widgets() {
    register_sidebar( array(
        'name' => 'Descrição Footer',
        'id' => 'descricao-footer',
        'before_widget' => '<div class="col-md-4 col-lg-4 pai"><div class="filho">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar( array(
        'name' => 'Endereço Footer',
        'id' => 'endereco-footer',
        'before_widget' => '<div class="col-md-4 col-lg-4 pai"><div class="filho">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar( array(
        'name' => 'Logo Footer',
        'id' => 'logo-footer',
        'before_widget' => '<div class="col-md-4 col-lg-4 pai"><div class="filho">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'register_widgets' );

/**************************************
 * Breadcrumbs 
 **************************************/
function wp_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Resuldados de busca "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}