<?php
/**
 * blocal Theme Customizer.
 *
 * @package blocal
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blocal_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//  ==============================
    //  ====== General Settings ======
    //  ==============================

    $wp_customize->get_section('title_tagline')->title = esc_html__('General Settings', 'blocal');
    $wp_customize->get_section('title_tagline')->priority = 3;
    //Logo upload
     $wp_customize->add_setting('logo', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'blocal_sanitize_upload'
    ));
      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo', array(
        'label'    => __('Logo Upload', 'blocal'),
        'section'  => 'title_tagline',
        'settings' => 'logo',
    )));
    $wp_customize->add_setting('header_logo_area', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'blocal_sanitize_choices',
    ));
	
	// ===============================
    // ===== Social Links Option =====
    // ===============================
    $wp_customize->add_section('social_section', array(
        'title'    => __('Top Nav Options', 'blocal'),
        'priority' => 6,
    ));

    $wp_customize->add_setting('social_facebook', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_facebook', array(
        'label'    => __('Facebook Page URL', 'blocal'),
        'section'  => 'social_section',
        'settings' => 'social_facebook',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_twitter', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_twitter', array(
        'label'    => __('Twitter Page URL', 'blocal'),
        'section'  => 'social_section',
        'settings' => 'social_twitter',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_google_plus', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_google_plus', array(
        'label'    => __('Google Plus Page URL', 'blocal'),
        'section'  => 'social_section',
        'settings' => 'social_google_plus',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_pinterest', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_pinterest', array(
        'label'    => __('Pinterest Page URL', 'blocal'),
        'section'  => 'social_section',
        'settings' => 'social_pinterest',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_linkedin', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_linkedin', array(
        'label'    => __('Linkedin Page URL', 'blocal'),
        'section'  => 'social_section',
        'settings' => 'social_linkedin',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_youtube', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_youtube', array(
        'label'    => __('Youtube Page URL', 'blocal'),
        'section'  => 'social_section',
        'settings' => 'social_youtube',
        'type'     => 'text',
    ));
   
    //  =============================
    //  ==== Footer Text Setting ====
    //  =============================

    $wp_customize->add_section('footer_text', array(
        'title'    => __('Footer Text', 'blocal'),
        'priority' => 33,
    ));
    $wp_customize->add_setting('footer_credits', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'blocal_sanitize_textarea'
    ));
    $wp_customize->add_control('footer_credits', array(
        'label'    => __('Footer Credit Text', 'blocal'),
        'section'  => 'footer_text',
        'settings' => 'footer_credits',
        'type'     => 'textarea',
    ));

    /* ----------------------------------- */
    /* ------- Custom CSS options  ------- */
    /* ----------------------------------- */
    $wp_customize->get_section('colors')->title = esc_html__('Custom Style', 'blocal');

    // theme color
    $wp_customize->add_setting('custom_theme_color', array(
        'default'  => '#40bc69',
      'sanitize_callback' => 'blocal_sanitize_color',
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_theme_color', array(
        'label' => __('Theme Color', 'blocal'),
        'section'  => 'colors',
        'settings' => 'custom_theme_color'
    ) ) );
	
	// theme color
    $wp_customize->add_setting('header_footer_bg_color', array(
        'default'  => '#654e9c',
      'sanitize_callback' => 'blocal_sanitize_color',
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_footer_bg_color', array(
        'label' => __('Header and Footer Background Color', 'blocal'),
        'section'  => 'colors',
        'settings' => 'header_footer_bg_color'
    ) ) );

    $wp_customize->add_setting('custom_css', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'blocal_sanitize_textarea'
    ));
    $wp_customize->add_control('custom_css', array(
        'label'    => __('Custom CSS', 'blocal'),
        'section'  => 'colors',
        'settings' => 'custom_css',
        'type'     => 'textarea',
    ));
    
}
add_action( 'customize_register', 'blocal_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blocal_customize_preview_js() {
	wp_enqueue_script( 'blocal_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'blocal_customize_preview_js' );

function serviceArea_icon_callback( $control ) {
    if ( $control->manager->get_setting('serviceArea_icon_image')->value() == 'icon' ) {
        return true;
    } else {
        return false;
    }
}

function serviceArea_image_callback( $control ) {
    if ( $control->manager->get_setting('serviceArea_icon_image')->value() == 'image' ) {
        return true;
    } else {
        return false;
    }
}