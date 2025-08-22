<?php
require get_template_directory() . '/functions/configuration-generale.php';
require get_template_directory() . '/functions/mon-customizer.php';
require get_template_directory() . '/functions/vague.php';

function theme_33w_display_galerie() {
    if (have_posts()) :
        while (have_posts()) : the_post();
            theme_33w_display_carte();
        endwhile;
    else :
        echo "<p>Aucun article trouvé dans cette catégorie! :(</p>";
    endif;
}

function theme_33w_display_fake_hero() {
    ?>
    <div class="hero hero--fake">
        <section class="row">
            <div class="hero_contenu hero_contenu--centered">
                <h1 class="hero_titre"><?php single_cat_title(); ?></h1>
                <p class="hero_description">
                    <?php echo category_description(); ?>
                </p>
            </div>
        </section>
    </div>
    <?php
}

function theme_33w_display_carte() {
    ?>
    <article class="carte card">
      <?php if (has_post_thumbnail()) : ?>
        <figure class="carte__image">
          <?php the_post_thumbnail('medium', ['class' => 'card__img']); ?>
        </figure>
      <?php endif; ?>

      <div class="carte__contenu container">
        <h2 class="carte__titre"><?php the_title(); ?></h2>
        <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
        <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink(); ?>">Suite</a>
      </div>
    </article>
    <?php
}

function theme_33w_register_menus() {
    register_nav_menus(array(
        'menu_404' => __('Menu 404', 'theme-33w'),
    ));
}
add_action('after_setup_theme', 'theme_33w_register_menus');


function theme_33w_display_hero() {
    $hero_auteur = get_theme_mod('hero_title', 'Hannah Lauzon'); 
    $bg_image = get_theme_mod('hero_bg_image');

    $carousel_images = [];
    for ($i = 1; $i <= 3; $i++) {
        $img = get_theme_mod("hero_carousel_image_$i");
        if ($img) {
            $carousel_images[] = esc_url($img);
        }
    }
    ?>
    <div class="hero">
        <?php if (!empty($carousel_images)) : ?>
            <div class="hero-carousel">
                <?php foreach ($carousel_images as $img_url): ?>
                    <div class="hero-slide" style="background-image: url('<?= $img_url ?>'); background-size: cover; background-position: center;"></div>
                <?php endforeach; ?>
            </div>
        <?php elseif ($bg_image): ?>
            <div class="hero-single" style="background-image: url('<?= esc_url($bg_image) ?>'); background-size: cover; background-position: center;"></div>
        <?php endif; ?>

        <section class="hero_row">
            <div class="hero_contenu">
                <h1 class="hero_titre"><?php bloginfo('name'); ?></h1>
                <p class="hero_description"><?php bloginfo('description'); ?></p>
                <p><?= esc_html($hero_auteur); ?></p>
            </div>
            <section class="col">
                <p>Où rêvez-vous aller?</p>
                <form class="acceuil_recherche" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="text" class="acceuil_recherche__input" name="s" placeholder="Je veux aller...">
                    <button type="submit" class="acceuil_recherche__img">
                        <img src="https://s2.svgbox.net/hero-outline.svg?ic=search&color=000" width="20" height="20" alt="Rechercher">
                    </button>
                </form>
            </section>
        </section>
    </div>
    <?php
}
