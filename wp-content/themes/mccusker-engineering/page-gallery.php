<?php
/**
 * Gallery page template.
 *
 * Template Name: Gallery Page
 *
 * Displays project images and videos from the "Project" custom post type.
 * Admins can upload content via Projects → Add New in the WordPress dashboard.
 *
 * @package mccusker-engineering
 */

get_header();
?>

<main id="main" class="site-main page-gallery">

    <div class="page-hero">
        <div class="container">
            <h1><?php esc_html_e( 'Our Work', 'mccusker-engineering' ); ?></h1>
            <p><?php esc_html_e( 'Browse images and videos from our completed projects', 'mccusker-engineering' ); ?></p>
        </div>
    </div>

    <section class="gallery-section section-padded">
        <div class="container">

            <?php
            $categories = get_terms(
                array(
                    'taxonomy'   => 'project_category',
                    'hide_empty' => true,
                )
            );

            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
            ?>
                <div class="gallery-filters">
                    <button class="gallery-filter-btn active" data-filter="all">
                        <?php esc_html_e( 'All', 'mccusker-engineering' ); ?>
                    </button>
                    <?php foreach ( $categories as $cat ) : ?>
                        <button class="gallery-filter-btn" data-filter="<?php echo esc_attr( $cat->slug ); ?>">
                            <?php echo esc_html( $cat->name ); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php
            $projects = new WP_Query(
                array(
                    'post_type'      => 'mccusker_project',
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                )
            );

            if ( $projects->have_posts() ) :
            ?>
                <div class="gallery-grid">
                    <?php
                    while ( $projects->have_posts() ) :
                        $projects->the_post();

                        $video_url  = get_post_meta( get_the_ID(), '_mccusker_video_url', true );
                        $terms      = get_the_terms( get_the_ID(), 'project_category' );
                        $term_slugs = '';
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                            $term_slugs = implode( ' ', wp_list_pluck( $terms, 'slug' ) );
                        }
                    ?>
                        <div class="gallery-item reveal <?php echo esc_attr( $term_slugs ); ?>"
                             <?php if ( ! empty( $video_url ) ) : ?>
                                 data-video="<?php echo esc_url( $video_url ); ?>"
                             <?php elseif ( has_post_thumbnail() ) : ?>
                                 data-full="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>"
                             <?php endif; ?>>
                            <div class="gallery-item-media">
                                <?php if ( ! empty( $video_url ) ) : ?>
                                    <div class="gallery-video-overlay">
                                        <span class="gallery-play-icon" aria-hidden="true">&#9654;</span>
                                    </div>
                                <?php endif; ?>
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium_large', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
                                <?php else : ?>
                                    <div class="gallery-placeholder">
                                        <span>&#128247;</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="gallery-item-caption">
                                <h3><?php the_title(); ?></h3>
                                <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                                    <span class="gallery-item-category">
                                        <?php echo esc_html( implode( ', ', wp_list_pluck( $terms, 'name' ) ) ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="gallery-empty">
                    <?php esc_html_e( 'No projects have been added yet. Check back soon!', 'mccusker-engineering' ); ?>
                </p>
            <?php endif; ?>

        </div>
    </section>

    <!-- Lightbox overlay -->
    <div class="gallery-lightbox" id="galleryLightbox" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Project viewer', 'mccusker-engineering' ); ?>">
        <button class="lightbox-close" aria-label="<?php esc_attr_e( 'Close', 'mccusker-engineering' ); ?>">&times;</button>
        <div class="lightbox-content"></div>
    </div>

    <?php get_template_part( 'template-parts/contact-cta' ); ?>

</main>

<?php
get_footer();
