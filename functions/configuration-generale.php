<?php
/**
 * Configuration general du theme
 */

function mon_theme_supports() {
  add_theme_support('title-tag');
  add_theme_support('menus');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', array(
    'height'      => 150,
    'width'       => 150,
    'flex-height' => true,
    'flex-width'  => true,
  ));

  register_nav_menus(array(
    'main_menu'   => __('Premier Menu', 'theme-33w'),
    'footer_menu' => __('Menu Pied de Page', 'theme-33w')
  ));
}
add_action( 'after_setup_theme', 'mon_theme_supports' );

//relie les feuilles de style
function theme_tp_enqueue_styles() {
  wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
  wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');

//relie le javascript
function theme_tp_enqueue_scripts() {
  wp_enqueue_script(
    'theme-main-js',
    get_template_directory_uri() . '/javascripts/SiteManager.js', 
    array(), 
    false, 
    true
  );
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_scripts');

function modifie_requete_principal( $query ) {
  if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
    $query->set( 'category_name', 'populaire' );  
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
  }
}
add_action( 'pre_get_posts', 'modifie_requete_principal' );

