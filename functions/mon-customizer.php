<?php
/**
 * Configuration des nouveaux panneaux de customizer
 */

function theme_customize_register($wp_customize) {

    $wp_customize->add_panel('hero_panel', array(
      'title' => __('Section Hero', 'theme-33w'),
      'priority' => 30,
    ));

    $wp_customize->add_section('hero_section', array(
      'title' => __('Personnalisation Hero', 'theme-33w'),
      'panel' => 'hero_panel',
    ));

    $wp_customize->add_setting('hero_bg_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'hero_bg_image_control',
        array(
            'label' => __('Image de fond du Hero'),
            'section' => 'hero_section',
            'settings' => 'hero_bg_image'
        )
    ));

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("hero_carousel_image_$i", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            "hero_carousel_image_{$i}_control",
            array(
                'label'    => __("Image du carrousel #$i", 'theme-33w'),
                'section'  => 'hero_section',
                'settings' => "hero_carousel_image_$i",
            )
        ));
    }

    $wp_customize->add_setting('footer_github_icon', array(
        'default' => '',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'footer_github_icon_control',
        array(
            'label' => __('Icône GitHub pour le pied de page'),
            'section' => 'title_tagline',
            'settings' => 'footer_github_icon',
        )
    ));

    $wp_customize->add_setting('footer_github_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control('footer_github_url_control', array(
        'label' => __('Lien GitHub'),
        'section' => 'title_tagline',
        'settings' => 'footer_github_url',
        'type' => 'url',
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => 'Explorez le monde',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_title_control', array(
        'label' => __('Titre principal du Hero'),
        'section' => 'hero_section',
        'settings' => 'hero_title',
        'type' => 'text',
    ));
    $wp_customize->add_setting('hero_text_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_text_color_control', array(
        'label' => __('Couleur du texte du Hero'),
        'section' => 'hero_section',
        'settings' => 'hero_text_color',
    )));

        // ========================= Footer =================================
        $wp_customize->add_panel('footer_panel', array(
            'title' => __('Footer', 'theme-33w'),
            'priority' => 40,
        ));
        $wp_customize->add_section('footer_section', array(
            'title' => __('Informations de contact', 'theme-33w'),
            'panel' => 'footer_panel',
        ));

        $wp_customize->add_setting('footer_email', array(
            'default' => 'ClubVoyage33w@hotmail.com',
            'sanitize_callback' => 'sanitize_email',
        ));
        $wp_customize->add_control('footer_email_control', array(
            'label' => __('Adresse courriel'),
            'section' => 'footer_section',
            'settings' => 'footer_email',
            'type' => 'email',
        ));

        $wp_customize->add_setting('footer_phone', array(
            'default' => '555 555-5555',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('footer_phone_control', array(
            'label' => __('Téléphone'),
            'section' => 'footer_section',
            'settings' => 'footer_phone',
            'type' => 'text',
        ));


        $wp_customize->add_setting('footer_description', array(
            'default' => 'Recherche de destination:',
            'sanitize_callback' => 'sanitize_text_field',
        )); 
        $wp_customize->add_control('footer_description_control', array(
            'label' => __('Ligne de description'),
            'section' => 'footer_section',
            'settings' => 'footer_description',
            'type' => 'text',
        ));

            $wp_customize->add_section('section_404', array(
        'title' => __('Page 404', 'theme-33w'),
        'priority' => 40,
    ));

    //examen

    $wp_customize->add_setting('titre_404', array('default' => '404 Oops!'));
    $wp_customize->add_control('titre_404', array(
        'label' => __('Titre', 'theme-33w'),
        'section' => 'section_404',
        'type' => 'text',
    ));

    $wp_customize->add_setting('message_404', array('default' => 'La page demandée est introuvable.'));
    $wp_customize->add_control('message_404', array(
        'label' => __('Message', 'theme-33w'),
        'section' => 'section_404',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('image_bg_404');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_bg_404', array(
        'label' => __('Image d’arrière-plan', 'theme-33w'),
        'section' => 'section_404',
    )));

    $wp_customize->add_setting('couleur_404', array('default' => '#000000'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur_404', array(
        'label' => __('Couleur boutons et recherche', 'theme-33w'),
        'section' => 'section_404',
    )));
}
add_action('customize_register', 'theme_customize_register');

