<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package blocal
 */

if ( ! function_exists( 'blocal_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blocal_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'blocal' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'blocal' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'blocal_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blocal_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'blocal' ) );
		if ( $tags_list ) {
			//printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'blocal' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	/*if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'blocal' ), esc_html__( '1 Comment', 'blocal' ), esc_html__( '% Comments', 'blocal' ) );
		echo '</span>';
	}*/

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'blocal' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function blocal_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'blocal_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'blocal_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so blocal_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so blocal_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in blocal_categorized_blog.
 */
function blocal_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'blocal_categories' );
}
add_action( 'edit_category', 'blocal_category_transient_flusher' );
add_action( 'save_post',     'blocal_category_transient_flusher' );


function blocal_post_meta(){ ?>
	<div class="post-meta">
        <ul>
            <li class="meta-admin"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></li>
            <li class="meta-date"><?php
                $archive_year = get_the_time('Y');
                $archive_month = get_the_time('m');
                $archive_day = get_the_time('d');
                ?>
            <i class="fa fa-clock-o"></i> <a href="<?php the_permalink() ?>"> <?php echo esc_html( get_the_date('j M Y') ) ?></a></li>
            <li class="meta-cat"><i class="fa fa-folder-open"></i>  <?php the_category(', '); ?></li>
            <?php if( has_tag() ) { ?>
                <li class="meta-tag"><i class="fa fa-tag"></i> <?php the_tags(''); ?></li>
            <?php } ?>
            <li class="meta-comm"><i class="fa fa-comment"></i> <?php comments_popup_link(); ?></li>
        </ul>
    </div>
<?php }

