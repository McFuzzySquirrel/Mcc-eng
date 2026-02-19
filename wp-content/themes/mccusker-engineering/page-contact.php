<?php
/**
 * Contact page template.
 *
 * @package mccusker-engineering
 */

get_header();
?>

<main id="main" class="site-main page-contact">

    <div class="page-hero">
        <div class="container">
            <h1><?php esc_html_e( 'Contact Us', 'mccusker-engineering' ); ?></h1>
            <p><?php esc_html_e( 'Get in touch with McCusker General Engineering', 'mccusker-engineering' ); ?></p>
        </div>
    </div>

    <section class="contact-section section-padded">
        <div class="container">
            <div class="contact-grid">

                <div class="contact-info">
                    <h2><?php esc_html_e( 'Get In Touch', 'mccusker-engineering' ); ?></h2>

                    <div class="contact-detail">
                        <h3><?php esc_html_e( 'Phone', 'mccusker-engineering' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Call Gordon:', 'mccusker-engineering' ); ?>
                            <a href="tel:0734959727" class="contact-phone">0734959727</a>
                        </p>
                    </div>

                    <div class="contact-detail">
                        <h3><?php esc_html_e( 'Website', 'mccusker-engineering' ); ?></h3>
                        <p>
                            <a href="https://www.mccuskerengineering.co.za" target="_blank" rel="noopener noreferrer">
                                www.mccuskerengineering.co.za
                            </a>
                        </p>
                    </div>

                    <div class="contact-detail">
                        <h3><?php esc_html_e( 'Business Hours', 'mccusker-engineering' ); ?></h3>
                        <ul class="hours-list">
                            <li><?php esc_html_e( 'Monday – Friday: 7:00 AM – 5:00 PM', 'mccusker-engineering' ); ?></li>
                            <li><?php esc_html_e( 'Saturday: By appointment', 'mccusker-engineering' ); ?></li>
                            <li><?php esc_html_e( 'Sunday: Closed', 'mccusker-engineering' ); ?></li>
                        </ul>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <h2><?php esc_html_e( 'Send Us a Message', 'mccusker-engineering' ); ?></h2>
                    <?php
                    if ( function_exists( 'wpcf7_contact_form' ) ) {
                        echo do_shortcode( '[contact-form-7 id="1" title="Contact form 1"]' );
                    } else {
                        ?>
                        <p class="plugin-notice">
                            <?php esc_html_e( 'Please install the Contact Form 7 plugin to enable the contact form.', 'mccusker-engineering' ); ?>
                        </p>
                        <?php
                    }
                    ?>
                </div>

            </div>

            <div class="map-placeholder">
                <h2><?php esc_html_e( 'Find Us', 'mccusker-engineering' ); ?></h2>
                <!--
                    To embed your location:
                    1. Go to https://www.google.com/maps and search for your address.
                    2. Click "Share" → "Embed a map" → copy the <iframe> src URL.
                    3. Replace the src value below with your copied URL.
                -->
                <div class="map-embed">
                    <iframe
                        src="https://www.google.com/maps/embed"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="<?php esc_attr_e( 'McCusker General Engineering Location', 'mccusker-engineering' ); ?>">
                    </iframe>
                </div>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
