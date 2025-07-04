<?php
/**
 * Template-part hero.php
 * permet d’afficher la section « Hero »
 */
?>

<?php 
$hero_auteur = get_theme_mod('hero_title', 'Hannah Lauzon'); 
$hero_adresse = get_theme_file_uri();
$bg_image = get_theme_mod('hero_bg_image');
?>


<div class="hero_contenu">
    <h1 class="hero_titre"><?php bloginfo('name') ?></h1>
    <p class="hero_description">
        <?php bloginfo('description') ?>
    </p>
    <p>Site d'<?= $hero_auteur ?></p>
</div>
