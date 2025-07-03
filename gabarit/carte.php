<?php
/**
 * Gabarit permettant d'afficher une carte
*/#
//$lien = "<a href= .get"
?>
<article class="populaire__article">
                <figure class="carte__image">
                    
                </figure>
                <div class="carte__contenu">
                    <?php
                    if (has_post_thumbnail()) {
                        // permet d'afficher la petite image associé à l'article (image mise en avant)
                        the_post_thumbnail('thumbnail'); }
                    ?>
                    <h2 class="carte__titre"><?php the_title(); ?></h2>
                    <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 20, "...") ; ?></p>
                    <a class="carte__bouton carte__bouton--actif"  href="<?php the_permalink(); ?>">Suite</a>
                </div>
</article>