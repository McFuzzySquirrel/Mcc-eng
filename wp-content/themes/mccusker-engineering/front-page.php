<?php
/**
 * Front page template.
 *
 * @package mccusker-engineering
 */

get_header();
?>

<main id="main" class="site-main front-page">

    <?php get_template_part( 'template-parts/hero' ); ?>

    <section class="about-section">
        <div class="container">
            <h2>About McCusker General Engineering</h2>
            <p>
                McCusker General Engineering is committed to delivering precision engineering
                and exceptional quality across all industries. With expertise in aluminium and
                stainless steel welding, brazing, general machining, manufacturing, and plate
                rolling, we bring dedication and skill to every project.
            </p>
            <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'View Our Services', 'mccusker-engineering' ); ?>
            </a>
        </div>
    </section>

    <?php get_template_part( 'template-parts/services' ); ?>

    <?php get_template_part( 'template-parts/contact-cta' ); ?>

</main>

<?php
get_footer();
