<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blocal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php blocal_post_meta(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( !is_single() ) { ?>
		<div class="post-thumb text-center">
			<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
	            <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('blocal-blog-thumbnails'); ?>  </a>
	        <?php } else { } ?>
		</div>
	<?php } ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>

		<?php if ( !is_single() ) { ?>
			<a href="<?php the_permalink() ?>" class="wpanch"><?php echo sprintf(
	                    esc_html__( 'Continue reading..%s', 'blocal' ),
	                    the_title( '<span class="screen-reader-text">', '</span>', false )
	                   ) ; ?> 
        <?php } ?>
        
	</div><!-- .entry-summary -->



	<footer class="entry-footer">
		<?php blocal_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
