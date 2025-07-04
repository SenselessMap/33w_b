<?php
/**
 * Gabarit permettant d'afficher une carte
*/#
//$lien = "<a href= .get"
?>
<article class="carte card">
  <?php if (has_post_thumbnail()) : ?>
    <figure class="carte__image">
      <?php the_post_thumbnail('medium', ['class' => 'card__img']); ?>
    </figure>
  <?php endif; ?>

  <div class="carte__contenu container">
    <h2 class="carte__titre"><?php the_title(); ?></h2>
    <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
    <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink(); ?>">Suite</a>
  </div>
</article>
