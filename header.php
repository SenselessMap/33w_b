<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le TP2 de voyage!</title>
    <?php wp_head(); ?> 
</head>
<body>
    <header>
        <div class="entete">
            <label for="chk__burger" class="burger">
                <img src="https://s2.svgbox.net/hero-solid.svg?ic=menu-alt-1&color=000" width="32" height="32">
            </label>
            <input type="checkbox" id="chk__burger" class="chk__burger">
            <div class="entete__nav">
                <figure class="entete__logo">
                    <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                    ?>
                </figure>
                <?php wp_nav_menu(array(
                            'menu' => 'main_menu',
                            'container' => 'nav',
                            'container_class' => 'entete__menu',
                )); ?> 
                <?php
                if ( ! is_front_page() && ! is_home() ) : 
                ?>
                <form class="acceuil_recherche" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="text" class="acceuil_recherche__input" name="s" placeholder="Je veux aller...">
                    <button type="submit" class="acceuil_recherche__img">
                        <img src="https://s2.svgbox.net/hero-outline.svg?ic=search&color=000" width="20" height="20" alt="Rechercher">
                    </button>
                </form>
                <?php endif; ?>

            </div>
        </div>
    </header>