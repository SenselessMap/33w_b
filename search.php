<?php get_header(); ?>

<main class="search-results">
  <h1>Résultats pour “<?php echo get_search_query(); ?>”</h1>

  <?php if (have_posts()) : ?>
    <ul>
      <?php while (have_posts()) : the_post(); ?>
        <li>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <p><?php echo get_the_excerpt(); ?></p>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php else : ?>
    <p>Aucun résultat trouvé.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
