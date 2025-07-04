<?php
/**
 *  index.php est le modèle par défaut
 *  si aucun modèle peut satisfaire la requête http dans ce cas c'est index.php qui affichera le contenu de la page
 */

?>
<?php
get_header();

// le slug
$page_slug = get_post_field('post_name', get_queried_object_id());

$args = array(
  'category_name' => $page_slug,
  'posts_per_page' => 10,
);

$query = new WP_Query($args);
?>

<?php get_template_part('gabarit/hero'); ?>

<section class="populaire">
  <div class="global">
    <?php if ($query->have_posts()) : ?>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <article class="populaire__article">
          <?php if (has_post_thumbnail()) : ?>
            <div class="populaire__image"><?php the_post_thumbnail('medium'); ?></div>
          <?php endif; ?>
          <h2 class="populaire__titre"><?php the_title(); ?></h2>
          <div class="populaire__contenu"><?php the_content(); ?></div>
        </article>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p>Aucun article trouvé dans la catégorie "<?php echo esc_html($page_slug); ?>"</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>