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
    'footer_menu' => __('Menu Pied de Page', 'theme-33w'),
    'menu_404'    => __('Menu 404', 'theme-33w'), //examen final
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

add_filter('script_loader_tag', function($tag, $handle, $src) {
    if ($handle === 'theme-main-js') {
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}, 10, 3);
 

function modifie_requete_principal( $query ) {
  if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
    $query->set( 'category_name', 'populaire' );  
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
  }
}

add_action( 'pre_get_posts', 'modifie_requete_principal' );


function get_404_form() {
	?>
	<form class="acceuil_recherche" method="get" action="<?php echo esc_url(home_url('/')); ?>">
		<input type="text" class="acceuil_recherche__input" name="s" placeholder="Je veux aller...">
		<button type="submit" class="acceuil_recherche__img">
			<img src="https://s2.svgbox.net/hero-outline.svg?ic=search&color=000" width="20" height="20" alt="Rechercher">
		</button>
	</form>
	<?php
}
