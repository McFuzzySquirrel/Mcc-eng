<footer id="colophon" class="site-footer">
    <div class="footer-inner container">

        <?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
            <div class="footer-widgets">
                <?php dynamic_sidebar( 'footer-widgets' ); ?>
            </div>
        <?php endif; ?>

        <div class="footer-contact">
            <p class="footer-cta">CALL GORDON &ndash; <a href="tel:0734959727">0734959727</a></p>
            <p class="footer-website">
                <a href="https://www.mccuskerengineering.co.za" target="_blank" rel="noopener noreferrer">
                    www.mccuskerengineering.co.za
                </a>
            </p>
        </div>

        <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Navigation', 'mccusker-engineering' ); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer',
                    'menu_id'        => 'footer-menu',
                    'container'      => false,
                    'depth'          => 1,
                    'fallback_cb'    => false,
                )
            );
            ?>
        </nav>

        <div class="footer-bottom">
            <p class="copyright">
                &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
                <?php echo esc_html( get_bloginfo( 'name' ) ); ?>.
                <?php esc_html_e( 'All rights reserved.', 'mccusker-engineering' ); ?>
            </p>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
