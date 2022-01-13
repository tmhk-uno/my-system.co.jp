<?php
/*
 * Template Name: Left Sidebar Page
 *
 *
 * The template for displaying the front page
 *
 *
 * @package blocal
 */
get_header(); ?>

	<div class="not_home">
		<div class="row">
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		    <div class="col-md-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>

<?php get_footer();