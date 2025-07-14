<?php get_header(); ?>

<main class="single-post">
    <section class="row">
        <section class="col">
            <?php
                if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <h1><?php the_title(); ?></h1>
                    <div><?php the_content(); ?></div>
                </article>
                <?php endwhile;
                    else : ?>
                <p>404</p>
            <?php endif; ?>
        </section>
        <section class="col">
            
        <?php
            $appreciation = get_post_meta(get_the_ID(), 'appreciation', true);
            $temperature = get_post_meta(get_the_ID(), 'temperature', true);
            $cost = get_post_meta(get_the_ID(), 'cost', true);

            $labels = [
                'bonne' => 'Bonne',
                'tres_bonne' => 'Très bonne',
                'superbe' => 'Superbe',
            ];
        ?>


        <section class="col">
            <article class="infos-supplementaires">
                <?php if (has_post_thumbnail()) : ?>
                    <figure class="carte__image">
                        <?php the_post_thumbnail('medium', ['class' => 'card__img']); ?>
                    </figure>
                <?php endif; ?>
                <?php if ($appreciation !== '') : ?>
                    <p><strong>Appréciation :</strong> <?= esc_html($labels[$appreciation] ?? $appreciation); ?></p>
                <?php endif; ?>

                <?php if ($temperature !== '') : ?>
                    <p><strong>Température :</strong> <?= esc_html($temperature); ?> °C</p>
                <?php endif; ?>

                <?php if ($cost !== '') : ?>
                    <p><strong>Coût :</strong> <?= esc_html($cost); ?> CAD $</p>
                <?php endif; ?>
            </article>
        </section>
        <div class="svg-wave-container">
            <?php theme_33w_svg_wave(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>