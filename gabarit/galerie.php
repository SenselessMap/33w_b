<?php
function theme_33w_display_galerie() {
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('gabarit/carte');
        endwhile;
    else :
        echo "<p>Aucun article trouvé dans cette catégorie! :(</p>";
    endif;
}

?>