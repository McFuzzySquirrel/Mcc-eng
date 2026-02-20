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
 * Register "Project" custom post type for the gallery.
 */
function mccusker_register_project_post_type() {
    $labels = array(
        'name'               => esc_html_x( 'Projects', 'post type general name', 'mccusker-engineering' ),
        'singular_name'      => esc_html_x( 'Project', 'post type singular name', 'mccusker-engineering' ),
        'menu_name'          => esc_html__( 'Projects', 'mccusker-engineering' ),
        'add_new'            => esc_html__( 'Add New', 'mccusker-engineering' ),
        'add_new_item'       => esc_html__( 'Add New Project', 'mccusker-engineering' ),
        'edit_item'          => esc_html__( 'Edit Project', 'mccusker-engineering' ),
        'new_item'           => esc_html__( 'New Project', 'mccusker-engineering' ),
        'view_item'          => esc_html__( 'View Project', 'mccusker-engineering' ),
        'search_items'       => esc_html__( 'Search Projects', 'mccusker-engineering' ),
        'not_found'          => esc_html__( 'No projects found.', 'mccusker-engineering' ),
        'not_found_in_trash' => esc_html__( 'No projects found in Trash.', 'mccusker-engineering' ),
        'all_items'          => esc_html__( 'All Projects', 'mccusker-engineering' ),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-format-gallery',
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'  => true,
        'rewrite'       => array( 'slug' => 'project' ),
    );

    register_post_type( 'mccusker_project', $args );
}
add_action( 'init', 'mccusker_register_project_post_type' );

/**
 * Register "Project Category" taxonomy for the gallery.
 */
function mccusker_register_project_taxonomy() {
    $labels = array(
        'name'              => esc_html_x( 'Project Categories', 'taxonomy general name', 'mccusker-engineering' ),
        'singular_name'     => esc_html_x( 'Project Category', 'taxonomy singular name', 'mccusker-engineering' ),
        'search_items'      => esc_html__( 'Search Categories', 'mccusker-engineering' ),
        'all_items'         => esc_html__( 'All Categories', 'mccusker-engineering' ),
        'parent_item'       => esc_html__( 'Parent Category', 'mccusker-engineering' ),
        'parent_item_colon' => esc_html__( 'Parent Category:', 'mccusker-engineering' ),
        'edit_item'         => esc_html__( 'Edit Category', 'mccusker-engineering' ),
        'update_item'       => esc_html__( 'Update Category', 'mccusker-engineering' ),
        'add_new_item'      => esc_html__( 'Add New Category', 'mccusker-engineering' ),
        'new_item_name'     => esc_html__( 'New Category Name', 'mccusker-engineering' ),
        'menu_name'         => esc_html__( 'Categories', 'mccusker-engineering' ),
    );

    register_taxonomy(
        'project_category',
        'mccusker_project',
        array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'rewrite'           => array( 'slug' => 'project-category' ),
        )
    );
}
add_action( 'init', 'mccusker_register_project_taxonomy' );

/**
 * Add a meta box for a project video URL on the Project edit screen.
 */
function mccusker_add_project_meta_boxes() {
    add_meta_box(
        'mccusker_project_video',
        esc_html__( 'Project Video URL', 'mccusker-engineering' ),
        'mccusker_project_video_callback',
        'mccusker_project',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'mccusker_add_project_meta_boxes' );

/**
 * Render the project video URL meta box.
 *
 * @param WP_Post $post Current post object.
 */
function mccusker_project_video_callback( $post ) {
    wp_nonce_field( 'mccusker_save_video', 'mccusker_video_nonce' );
    $value = get_post_meta( $post->ID, '_mccusker_video_url', true );
    echo '<label for="mccusker_video_url">' . esc_html__( 'YouTube or video embed URL:', 'mccusker-engineering' ) . '</label><br>';
    echo '<input type="url" id="mccusker_video_url" name="mccusker_video_url" value="' . esc_attr( $value ) . '" style="width:100%;" placeholder="https://www.youtube.com/embed/...">';
}

/**
 * Save the project video URL meta value.
 *
 * @param int $post_id The post ID being saved.
 */
function mccusker_save_project_video( $post_id ) {
    if ( ! isset( $_POST['mccusker_video_nonce'] ) || ! wp_verify_nonce( $_POST['mccusker_video_nonce'], 'mccusker_save_video' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['mccusker_video_url'] ) ) {
        update_post_meta( $post_id, '_mccusker_video_url', esc_url_raw( wp_unslash( $_POST['mccusker_video_url'] ) ) );
    }
}
add_action( 'save_post_mccusker_project', 'mccusker_save_project_video' );

/**
 * Fallback menu when no menu is assigned to the primary location.
 */
function mccusker_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'mccusker-engineering' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/services' ) ) . '">' . esc_html__( 'Services', 'mccusker-engineering' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/gallery' ) ) . '">' . esc_html__( 'Gallery', 'mccusker-engineering' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/contact' ) ) . '">' . esc_html__( 'Contact', 'mccusker-engineering' ) . '</a></li>';
    echo '</ul>';
}
