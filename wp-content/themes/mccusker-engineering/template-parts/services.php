<?php
/**
 * Services grid template part.
 *
 * @package mccusker-engineering
 */
?>

<section class="services-section section-padded">
    <div class="container">
        <h2 class="section-heading"><?php esc_html_e( 'Our Services', 'mccusker-engineering' ); ?></h2>

        <div class="services-grid">

            <div class="service-card reveal">
                <div class="service-card-icon">&#9881;</div>
                <h3><?php esc_html_e( 'Aluminium and Stainless Steel Welding', 'mccusker-engineering' ); ?></h3>
                <p><?php esc_html_e( 'Precision welding of aluminium and stainless steel for structural and decorative applications.', 'mccusker-engineering' ); ?></p>
            </div>

            <div class="service-card reveal">
                <div class="service-card-icon">&#128293;</div>
                <h3><?php esc_html_e( 'Brazing', 'mccusker-engineering' ); ?></h3>
                <p><?php esc_html_e( 'Strong, heat-resistant joints for metal components requiring durable, leak-proof connections.', 'mccusker-engineering' ); ?></p>
            </div>

            <div class="service-card reveal">
                <div class="service-card-icon">&#128297;</div>
                <h3><?php esc_html_e( 'General Machining', 'mccusker-engineering' ); ?></h3>
                <p><?php esc_html_e( 'Turning, milling, drilling and grinding to exact specifications for any engineering requirement.', 'mccusker-engineering' ); ?></p>
            </div>

            <div class="service-card reveal">
                <div class="service-card-icon">&#127981;</div>
                <h3><?php esc_html_e( 'Manufacturing', 'mccusker-engineering' ); ?></h3>
                <p><?php esc_html_e( 'Custom fabrication and batch production delivered on time and within budget.', 'mccusker-engineering' ); ?></p>
            </div>

            <div class="service-card reveal">
                <div class="service-card-icon">&#128260;</div>
                <h3><?php esc_html_e( 'Plate Rolling', 'mccusker-engineering' ); ?></h3>
                <p><?php esc_html_e( 'Accurate cylindrical and conical shapes from flat metal plates across a range of metals and thicknesses.', 'mccusker-engineering' ); ?></p>
            </div>

        </div>

        <div class="services-cta">
            <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'View All Services', 'mccusker-engineering' ); ?>
            </a>
        </div>

    </div>
</section>
