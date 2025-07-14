<?php
/**
 * Template-part hero.php
 * permet d’afficher la section « Hero »
 */
?>

<?php 
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
            <h1 class="hero_titre"><?php bloginfo('name') ?></h1>
            <p class="hero_description">
                <?php bloginfo('description') ?>
            </p>
            <p><?= $hero_auteur ?></p>
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

?>