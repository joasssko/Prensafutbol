<?php if ( function_exists('add_theme_support') ) {
add_theme_support('post-thumbnails');
add_image_size('mininoticias', 100, 75, true );
add_image_size('noticias', 300, 210, true );
add_image_size('noticias_destacada', 630, 443, true );
//add_image_size('portada_documento', 70, 100, true ); 

}
;?>
<?php function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }?>
<?php 
/* Add support for wp_nav_menu() */
function register_my_menu() {
	register_nav_menu( 'primary', 'Menú principal');
	register_nav_menu( 'secondary', 'Menú Secundario');
	register_nav_menu( 'third', 'Mobile');
}
add_action( 'init', 'register_my_menu' );
?>
<?php
function import_scripts() {
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
    wp_register_script('core', get_template_directory_uri() . '/js/core.js');
}

add_action('wp_print_scripts', 'import_scripts');
?>
<?php 
function call_scripts() {
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
    wp_register_script('core', get_template_directory_uri() . '/js/core.js');

    wp_enqueue_script('jquery');
    wp_enqueue_script('core');
}    
 
add_action('wp_enqueue_scripts', 'call_scripts');

?>
<?php
//Post type register

add_action('init', 'prensa_futbol_tv_register');
function prensa_futbol_tv_register() {
    $args = array(
        'label' => 'Prensa Futbol TV',
        'singular_label' => 'Video',
        'public' => true,
		'menu_position' => 16, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'prensa-futbol-tv'),
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt' )
    );

    register_post_type('prensa-futbol-tv', $args);
    flush_rewrite_rules();
}

add_action('init', 'liga_prensa_futbol_register');
function liga_prensa_futbol_register() {
    $args = array(
        'label' => 'Noticias Liga Prensa Futbol',
        'singular_label' => 'Noticia',
        'public' => true,
		'menu_position' => 16, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'liga-prensa-futbol'),
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt' )
    );

    register_post_type('liga-prensa-futbol', $args);
    flush_rewrite_rules();
}

add_action('init', 'banners_register');
function banners_register() {
    $args = array(
        'label' => 'Banners',
        'singular_label' => 'Banner',
        'public' => true,
		'menu_position' => 20, 
        '_builtin' => false,
        'capability_type' => 'page',
		'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'banners'),
        'supports' => array('title', 'editor', 'thumbnail' , 'revisions' , 'author')
    );

    register_post_type('banners', $args);
    flush_rewrite_rules();
}

register_taxonomy("posiciones", array('banners'), array("hierarchical" => true, "label" => "Posiciones", "singular_label" => "Posición", "rewrite" => true));
register_taxonomy("tipoBanner", array('banners'), array("hierarchical" => true, "label" => "Tipo Banner", "singular_label" => "Tipo", "rewrite" => true));


register_taxonomy("tipo", array('post' , 'prensa-futbol-tv' , ), array("hierarchical" => true, "label" => "Tipo de Noticia", "singular_label" => "Tipo", "rewrite" => true));
register_taxonomy("equipo", array('post' , 'prensa-futbol-tv' , ), array("hierarchical" => true, "label" => "Equipos", "singular_label" => "Equipo", 'rewrite' => array( 'hierarchical' => true )));
register_taxonomy("campeonato", array('post' , 'prensa-futbol-tv' , ), array("hierarchical" => true, "label" => "Campeonatos", "singular_label" => "Campeonato", "rewrite" => true));
register_taxonomy("tags", array('post' , 'prensa-futbol-tv' , ), array("hierarchical" => true, "label" => "Tags", "singular_label" => "Tag", "rewrite" => true));
register_taxonomy("jugadores", array('post' , 'prensa-futbol-tv' , ), array("hierarchical" => true, "label" => "Jugadores y DT's", "singular_label" => "Jugador o DT", "rewrite" => true));

register_taxonomy("categorias_liga", array('liga-prensa-futbol'), array("hierarchical" => true, "label" => "Categorías Liga PF", "singular_label" => "Categoría", "rewrite" => true));



/*
add_action('init', 'varia_register');
function varia_register() {
    $args = array(
        'label' => 'Varia',
        'singular_label' => 'Artículo',
        'public' => true,
		'menu_position' => 5, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'varia'),
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt' )
    );

    register_post_type('varia', $args);
    flush_rewrite_rules();
}
*/
/*register_taxonomy("keywords", array('resenas', 'varia', 'dossier', 'documentos', 'traducciones'), array("hierarchical" => false, "label" => "Palabras Claves", "singular_label" => "Keyword", "rewrite" => true));*/

?>
<?php //register sidebars

/* register_sidebar(array(
  'name' => __( 'Home' ),
  'id' => 'home',
  'description' => __( 'Widgets en esta área se mostrarán en el home, utlice esta área para agregar la mini encuesta' ),
  'before_title' => '<h3>',
  'after_title' => '</h3>'
)); */

/*register_sidebar(array(
  'name' => __( 'Página interior' ),
  'id' => 'category',
  'description' => __( 'Widgets en esta área se mostrarán en las páginas interiores, utlice esta área para agregar el submenú' ),
  'before_title' => '<h2>',
  'after_title' => '</h2>'
));
*/

//add_filter('widget_text', 'do_shortcode');

?>
<?php 
$wp->add_query_var('meta_key');
$wp->add_query_var('meta_value');
$wp->add_query_var('meta_compare');

/* // excluye las páginas en la lista de resultados de búsqueda
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post__not_in', array(48,52,50,46,174,176,172,178,44));
}
return $query;
} 

add_filter('pre_get_posts','SearchFilter');
*/
?>
<?php 
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Vistas";
    }
    return $count.' Vistas';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
?>
<?php

add_action( 'admin_menu', 'adjust_the_wp_menu' );
function adjust_the_wp_menu() {
  //remove_submenu_page( 'themes.php', 'widgets.php' );
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
}

?>
<?php 

add_action( 'admin_head', 'admin_css' );

function admin_css(){ ?>
     <style>
     #categorydiv , #tagsdiv-post_tag{
		 display:none
     }
     </style>
<?php
}
?>
<?php 

add_filter('post_link', 'tipo_permalink', 10, 3);
add_filter('post_type_link', 'tipo_permalink', 10, 3);
 
function tipo_permalink($permalink, $post_id, $leavename) {
    if (strpos($permalink, '%tipo%') === FALSE) return $permalink;
     
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;
 
        // Get taxonomy terms
        $terms = wp_get_post_terms($post->ID, 'tipo');   
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'tipo';
 
    return str_replace('%tipo%', $taxonomy_slug, $permalink);
}


add_filter('post_link', 'campeonato_permalink', 10, 3);
add_filter('post_type_link', 'campeonato_permalink', 10, 3);
 
function campeonato_permalink($permalink, $post_id, $leavename) {
    if (strpos($permalink, '%campeonato%') === FALSE) return $permalink;
     
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;
 
        // Get taxonomy terms
        $terms = wp_get_post_terms($post->ID, 'campeonato');   
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'campeonato';
 
    return str_replace('%campeonato%', $taxonomy_slug, $permalink);
}


add_filter('post_link', 'equipo_permalink', 10, 3);
add_filter('post_type_link', 'equipo_permalink', 10, 3);
 
function equipo_permalink($permalink, $post_id, $leavename) {
    if (strpos($permalink, '%equipo%') === FALSE) return $permalink;
     
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;
 
        // Get taxonomy terms
        $terms = wp_get_post_terms($post->ID, 'equipo');   
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'equipo';
 
    return str_replace('%equipo%', $taxonomy_slug, $permalink);
}
// /%tipo%/%campeonato%/%equipo%/%postname%/

?>
<?php 
/* 
add_action('init', 'customRSS');
function customRSS(){
        add_feed('feedname', 'sslrss');
}

function customRSSFunc(){
	get_template_part('feed', 'rss2');
}

add_filter('wp_feed_cache_transient_lifetime', create_function('', 'return 60;'));
 */

?>
<?php 
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');?>