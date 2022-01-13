<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blocal
 */

?>

		</div><!-- #content -->

		        <!--footer widget start here --> 
        <div class="footer-widget-wrapper">
            <div class="row">
                <div class="col-md-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('first-footer-widget-area'); ?>
                        <?php endif; ?>
                    </div>    
                </div>
                    
                <div class="col-md-4 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('second-footer-widget-area'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                    
                <div class="col-md-4 wow fadeInUp" data-wow-duration="2s">
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('third-footer-widget-area'); ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- footer sidebar end here --> 

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
                <?php  $footer_credits = esc_attr( get_theme_mod('footer_credits') ); ?>

                <?php if( isset($footer_credits) && $footer_credits != ''){ ?>
                    <p><?php echo $footer_credits; ?></p>
                <?php }else{ ?>

				    <p>
                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'blocal' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'blocal' ), 'WordPress' ); ?></a>
    				    <span class="sep"> | </span>

                        <?php printf( esc_html__( 'Theme: blocal by', 'blocal' ) ); ?>

                        <a href="<?php echo esc_url( __( 'https://themesflow.com/', 'blocal' ) ); ?>">
                            <?php printf( esc_html__( 'ThemesFlow.com', 'blocal' ) ); ?>
                        </a>
                    </p>
                    
                <?php } ?>

			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->
</div><!-- .container -->

<?php wp_footer(); ?>

</body>
</html>
