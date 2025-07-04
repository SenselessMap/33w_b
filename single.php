<?php get_header(); ?>

<main class="single-post">
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post(); ?>
      <article>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
      </article>
    <?php endwhile;
  else : ?>
    <p>Sorry, no posts found.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
