<?php
/** 
 * modèle front-page.php permet d'afficher la page d'accueil
 * 
*/
?>


<?php get_header() ?>

<section class="populaire">
  <div class="global">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="populaire__article">
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="populaire__image">
            <?php the_post_thumbnail('medium'); ?>
          </div>
        <?php endif; ?>
        <h2 class="populaire__titre"><?php the_title(); ?></h2>
        <div class="populaire__contenu"><?php the_content(); ?></div>
      </article>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>