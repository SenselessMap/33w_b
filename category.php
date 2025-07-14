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

<?php get_footer(); ?>