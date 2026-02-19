<?php
/**
 * Hero section template part.
 *
 * @package mccusker-engineering
 */
?>

<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content container">
        <h1 class="hero-headline">
            <?php esc_html_e( 'Quality Engineering For All Industries', 'mccusker-engineering' ); ?>
        </h1>
        <p class="hero-subtext">
            <?php esc_html_e( 'McCusker General Engineering – delivering precision and quality across all industries', 'mccusker-engineering' ); ?>
        </p>
        <div class="hero-buttons">
            <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'Our Services', 'mccusker-engineering' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-secondary">
                <?php esc_html_e( 'Contact Us', 'mccusker-engineering' ); ?>
            </a>
        </div>
    </div>
</section>
