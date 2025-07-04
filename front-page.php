<?php
/** 
 * modèle front-page.php permet d'afficher la page d'accueil
 * 
*/
?>


<?php get_header(); ?>

<?php get_template_part('gabarit/hero'); ?>

<div class="populaire__grid">
  <section class="populaire">
      <div class="global">
          <?php
            $args = array(
              'category_name' => 'populaire',
              'posts_per_page' => 10,
            );
            $populaire_query = new WP_Query($args);

            if ($populaire_query->have_posts()) :
              while ($populaire_query->have_posts()) : $populaire_query->the_post();
                get_template_part('gabarit/carte');
              endwhile;
              wp_reset_postdata();
            else :
              echo "<p>Aucun article populaire trouvé.</p>";
            endif;
          ?>
      </div>
  </section>
</div>

<?php get_footer(); ?>