<?php
error_log("PHP error log fonctionne...");

// Voir la version de eddy
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

function theme_customize_register($wp_customize) {

    // -- Hero background image (already present) --
    $wp_customize->add_setting('hero_bg_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'hero_bg_image_control',
        array(
            'label' => __('Image de fond du Hero'),
            'section' => 'title_tagline',
            'settings' => 'hero_bg_image'
        )
    ));

    $wp_customize->add_setting('footer_github_icon', array(
        'default' => '',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'footer_github_icon_control',
        array(
            'label' => __('Icône GitHub pour le pied de page'),
            'section' => 'title_tagline',
            'settings' => 'footer_github_icon',
        )
    ));

    $wp_customize->add_setting('footer_github_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control('footer_github_url_control', array(
        'label' => __('Lien GitHub'),
        'section' => 'title_tagline',
        'settings' => 'footer_github_url',
        'type' => 'url',
    ));
}
add_action('customize_register', 'theme_customize_register');