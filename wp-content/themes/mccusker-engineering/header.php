<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main">
    <?php esc_html_e( 'Skip to content', 'mccusker-engineering' ); ?>
</a>

<header id="masthead" class="site-header">
    <div class="header-inner container">

        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <div class="site-identity">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title-link">
                    <span class="site-title">MCCUSKER GENERAL ENGINEERING</span>
                </a>
                <p class="site-tagline">Quality engineering for all industries</p>
            </div>
        </div>

        <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'mccusker-engineering' ); ?>">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'mccusker-engineering' ); ?></span>
            </button>

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'mccusker_fallback_menu',
                )
            );
            ?>
        </nav>

    </div>
</header>
