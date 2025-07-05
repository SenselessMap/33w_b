<?php
/**
 * modèle category.php pour afficher les articles d'une catégorie spécifique
 */
?>

<?php get_header(); ?>

<?php get_template_part('gabarit/fake-hero'); ?>

<div class="populaire__grid">
  <section class="populaire">
      <div class="global">
          <?php
            if (have_posts()) :
              while (have_posts()) : the_post();
                get_template_part('gabarit/carte');
              endwhile;
            else :
              echo "<p>Aucun article trouvé dans cette catégorie! :(</p>";
            endif;
          ?>
      </div>
  </section>
</div>

<?php get_footer(); ?>