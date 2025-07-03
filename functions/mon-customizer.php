<?php
/**
 * Configuration des nouveaux panneaux de customizer
 */
function theme_33w_customize_register($wp_customize) {
    // Section Hero
    $wp_customize->add_section('hero_section', array(
        'title' => __('Section de Hero', 'theme_33w'),
        'priority' => 30,
    ));

    // Auteur du theme (titre du Hero)
    $wp_customize->add_setting('hero_auteur', array(
        'default' => __('Bienvenue sur mon site', 'theme_33w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_auteur', array(
        'label' => __('Auteur du thème', 'theme_33w'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Background
    $wp_customize->add_setting('hero_background', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_control', array(
        'label' => __('Hero Background Image', 'theme_33w'),
        'section' => 'hero_section',
        'settings' => 'hero_background',
    )));
}

add_action("customize_register", "theme_33w_customize_register");
