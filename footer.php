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
                    Foo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footer
                </div>
                <div class="piedpage__s1__adresse__recherche">
                    <?php get_search_form();   ?>
                </div>
            </div>
            <div class="piedpage__s1__description">
                Foo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footerFoo foo foo footer
            </div>
        </section>
        <section class="piedpage__s2"></section>
    </div>
</footer>
<?php wp_footer() ?>
</body>
</html>