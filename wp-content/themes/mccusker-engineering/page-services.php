<?php
/**
 * Services page template.
 *
 * @package mccusker-engineering
 */

get_header();
?>

<main id="main" class="site-main page-services">

    <div class="page-hero">
        <div class="container">
            <h1><?php esc_html_e( 'Our Services', 'mccusker-engineering' ); ?></h1>
            <p><?php esc_html_e( 'Quality engineering solutions across all industries', 'mccusker-engineering' ); ?></p>
        </div>
    </div>

    <section class="services-detail section-padded">
        <div class="container">

            <div class="service-item">
                <div class="service-item-icon">&#9861;</div>
                <div class="service-item-content">
                    <h2><?php esc_html_e( 'Aluminium and Stainless Steel Welding', 'mccusker-engineering' ); ?></h2>
                    <p>
                        <?php esc_html_e( 'Our skilled welders deliver high-quality aluminium and stainless steel welding services for structural and decorative applications. We utilise industry-standard techniques to ensure strong, precise, and clean welds that meet the highest standards.', 'mccusker-engineering' ); ?>
                    </p>
                </div>
            </div>

            <div class="service-item">
                <div class="service-item-icon">&#128293;</div>
                <div class="service-item-content">
                    <h2><?php esc_html_e( 'Brazing', 'mccusker-engineering' ); ?></h2>
                    <p>
                        <?php esc_html_e( 'We offer professional brazing services for joining metal components with precision and durability. Brazing provides strong, leak-proof joints and is ideal for applications requiring high strength and resistance to elevated temperatures.', 'mccusker-engineering' ); ?>
                    </p>
                </div>
            </div>

            <div class="service-item">
                <div class="service-item-icon">&#128297;</div>
                <div class="service-item-content">
                    <h2><?php esc_html_e( 'General Machining', 'mccusker-engineering' ); ?></h2>
                    <p>
                        <?php esc_html_e( 'Our general machining services cover a wide range of precision machining requirements. From turning and milling to drilling and grinding, we have the equipment and expertise to produce components to exact specifications.', 'mccusker-engineering' ); ?>
                    </p>
                </div>
            </div>

            <div class="service-item">
                <div class="service-item-icon">&#127981;</div>
                <div class="service-item-content">
                    <h2><?php esc_html_e( 'Manufacturing', 'mccusker-engineering' ); ?></h2>
                    <p>
                        <?php esc_html_e( 'We provide comprehensive manufacturing services tailored to your specific requirements. Whether it is custom fabrication, batch production, or one-off components, our team delivers quality results on time and within budget.', 'mccusker-engineering' ); ?>
                    </p>
                </div>
            </div>

            <div class="service-item">
                <div class="service-item-icon">&#128260;</div>
                <div class="service-item-content">
                    <h2><?php esc_html_e( 'Plate Rolling', 'mccusker-engineering' ); ?></h2>
                    <p>
                        <?php esc_html_e( 'Our plate rolling services produce accurate cylindrical and conical shapes from flat metal plates. We work with a variety of metals and thicknesses to meet your structural and engineering project needs.', 'mccusker-engineering' ); ?>
                    </p>
                </div>
            </div>

        </div>
    </section>

    <?php get_template_part( 'template-parts/contact-cta' ); ?>

</main>

<?php
get_footer();
