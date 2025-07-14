<footer>
    <div class="piedpage global">
        <section class="piedpage__s1">
         
            <?php wp_nav_menu(array(
                "menu"=> "footer_menu",
                "container" => "nav",
                "container_class" => "piedpage__s1__externe"
            )); ?>

            <div class="piedpage__s1__adresse">
                <div class="piedpage__s1__adresse__coord">
                    <?php echo esc_html(get_theme_mod('footer_email', 'ClubVoyage33w@hotmail.com')); ?><br />
                    <?php echo esc_html(get_theme_mod('footer_phone', '555 555-5555')); ?><br />
                    <?php echo esc_html(get_theme_mod('footer_description', 'Recherche de destination:')); ?>
                </div>
                <div class="piedpage__s1__adresse__recherche">
                    <?php get_search_form(); ?>
                </div>
            </div>

            <div class="piedpage__s1__description">
                <?php
                    $github_icon = get_theme_mod('footer_github_icon');
                    $github_url = get_theme_mod('footer_github_url');
                ?>

                <?php if ($github_icon && $github_url) : ?>
                <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="GitHub" class="footer__github-icon">
                    <img src="<?php echo esc_url($github_icon); ?>" alt="GitHub Logo" width="32" height="32" />
                </a>
                <?php endif; ?>
            </div>
        </section>

        <section class="piedpage__s2"></section>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
