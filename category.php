<?php
/**
 * modèle category.php pour afficher les articles d'une catégorie spécifique
 */
?>

<?php get_header(); ?>

<?php theme_33w_display_fake_hero(); ?>

<div class="populaire__grid">
  <section class="populaire">
      <div class="global">
          <?php
            theme_33w_display_galerie();
          ?>
      </div>
  </section>
</div>
<div class="svg-wave-container">
    <?php theme_33w_svg_wave(); ?>
</div>
<?php get_footer(); ?>