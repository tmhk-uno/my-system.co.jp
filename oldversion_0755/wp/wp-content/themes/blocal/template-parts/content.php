<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blocal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h2 class="entry-title">', '</h2>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
				if ( is_single() ) {
					blocal_posted_on();
				} else {
					blocal_post_meta();
				}
			?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php if ( !is_single() ) { ?>
		<div class="post-thumb text-center">
			<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
	            <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('blocal-blog-thumbnails'); ?>  </a>
	        <?php } else { } ?>
		</div>
	<?php } ?>

	<div class="entry-content">
		<?php
			if ( is_single() ) {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'blocal' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			}else{
				the_excerpt();
			}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blocal' ),
				'after'  => '</div>',
			) );
		?>

		<?php if ( !is_single() ) { ?>
			<a href="<?php the_permalink() ?>" class="wpanch"><?php echo sprintf(
	                    esc_html__( 'Continue reading..%s', 'blocal' ),
	                    the_title( '<span class="screen-reader-text">', '</span>', false )
	                   ) ; ?> 
        <?php } ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php blocal_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
