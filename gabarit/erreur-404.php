<div class="erreur-404" style="background-image: url('<?php echo esc_url(get_theme_mod('image_bg_404')); ?>');">
    <h1><?php echo get_theme_mod('titre_404', '404 oops'); ?></h1>
    <p><?php echo get_theme_mod('message_404', 'La page que vous cherchez est introuvable.'); ?></p>
    
    <!-- formulaire de search est ici -->
    <br>
    <?php get_404_form(); ?>

    <!-- Menu -->
    <p>Vouliez-vous dire...</p>
    <nav class="erreur-404__menu">
        <ul>
        <?php 
            $random_posts = get_posts(array(
                'posts_per_page' => 5,
                'orderby' => 'rand'
            ));
            foreach($random_posts as $post) : setup_postdata($post); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endforeach; wp_reset_postdata(); ?>
        </ul>
    </nav>
</div>