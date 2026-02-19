<?php
/**
 * McCusker Engineering Child Theme Functions
 *
 * @package mccusker-engineering
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue parent theme stylesheet, Google Fonts, custom CSS and JS.
 */
function mccusker_enqueue_styles() {
    // Parent theme stylesheet
    wp_enqueue_style(
        'twentytwentyfour-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme( 'twentytwentyfour' )->get( 'Version' )
    );

    // Child theme stylesheet
    wp_enqueue_style(
        'mccusker-style',
        get_stylesheet_uri(),
        array( 'twentytwentyfour-style' ),
        wp_get_theme()->get( 'Version' )
    );

    // Google Fonts: Montserrat + Open Sans
    wp_enqueue_style(
        'mccusker-google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Open+Sans:wght@400;600&display=swap',
        array(),
        null
    );

    // Custom CSS
    wp_enqueue_style(
        'mccusker-custom-css',
        get_stylesheet_directory_uri() . '/assets/css/custom.css',
        array( 'mccusker-style' ),
        wp_get_theme()->get( 'Version' )
    );

    // Custom JS
    wp_enqueue_script(
        'mccusker-main-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'mccusker_enqueue_styles' );

/**
 * Register navigation menus.
 */
function mccusker_register_menus() {
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Navigation', 'mccusker-engineering' ),
            'footer'  => esc_html__( 'Footer Navigation', 'mccusker-engineering' ),
        )
    );
}
add_action( 'after_setup_theme', 'mccusker_register_menus' );

/**
 * Register widget areas.
 */
function mccusker_register_widgets() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'mccusker-engineering' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'mccusker-engineering' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Widgets', 'mccusker-engineering' ),
            'id'            => 'footer-widgets',
            'description'   => esc_html__( 'Add widgets here to appear in the footer.', 'mccusker-engineering' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'mccusker_register_widgets' );

/**
 * Add theme supports.
 */
function mccusker_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 80,
            'width'       => 200,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
    add_theme_support(
        'html5',
        array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
    );
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'mccusker_theme_setup' );

/**
 * Fallback menu when no menu is assigned to the primary location.
 */
function mccusker_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'mccusker-engineering' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/services' ) ) . '">' . esc_html__( 'Services', 'mccusker-engineering' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/contact' ) ) . '">' . esc_html__( 'Contact', 'mccusker-engineering' ) . '</a></li>';
    echo '</ul>';
}
