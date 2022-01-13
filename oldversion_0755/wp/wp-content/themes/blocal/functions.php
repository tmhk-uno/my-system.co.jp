<?php
/**
 * blocal functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blocal
 */

if ( ! function_exists( 'blocal_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blocal_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on blocal, use a find and replace
	 * to change 'blocal' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blocal', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blocal-small-thumbnails', 360, 202, true );
	add_image_size( 'blocal-blog-thumbnails', 708, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'blocal' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blocal_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'blocal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blocal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blocal_content_width', 640 );
}
add_action( 'after_setup_theme', 'blocal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blocal_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blocal' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	// First Footer Widget
    register_sidebar(array(
        'name' => __('First Footer Widget Area', 'blocal'),
        'id' => 'first-footer-widget-area',
        'description' => '',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Second Footer Widget
    register_sidebar(array(
        'name' => __('Second Footer Widget Area', 'blocal'),
        'id' => 'second-footer-widget-area',
        'description' => '',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Third Footer Widget
    register_sidebar(array(
        'name' => __('Third Footer Widget Area', 'blocal'),
        'id' => 'third-footer-widget-area',
        'description' => '',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action( 'widgets_init', 'blocal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blocal_styles() {
	wp_enqueue_style( 'font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,800');

	wp_enqueue_style( 'font-raleway', '//fonts.googleapis.com/css?family=Raleway:400,500,600,700,400italic,700italic,800,900');
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );

	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );

	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/css/jquery.mmenu.css' );

	wp_enqueue_style( 'animation', get_template_directory_uri() . '/css/animate.css' );

	wp_enqueue_style( 'blocal-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'blocal_styles' );

function blocal_scripts() {
	wp_enqueue_script( 'flexslider-script', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery') );

	wp_enqueue_script( 'navigation-script', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'mmenu-script', get_template_directory_uri() . '/js/jquery.mmenu.min.js', array('jquery'), '20130116' );

	wp_enqueue_script( 'wow-animation-script', get_template_directory_uri() . '/js/wow.js', array('jquery'), '20130116' );
	
	wp_enqueue_script( 'blocal-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blocal_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom-Customizer additions.
 */
require get_template_directory() . '/inc/custom-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function custom_theme_color(){
    $custom_theme_color = esc_html( get_theme_mod( 'custom_theme_color' ) ); 
    
    if ( $custom_theme_color != '#40bc69' && $custom_theme_color != '' ) :
    ?>
        <style type="text/css">
            a, a:visited, .main-navigation ul ul a:hover, .current-menu-parent .current-menu-item > a, form#commentform input#submit:hover,  .action-button-wrapper a:hover .action-button, .feature-heading h2, .feature i, .feature h3, .testimonial-heading h2, .testimonial .message:before, div.footer-widget ul li:before, div.footer-widget ul li a:hover, .footer-widget #wp-calendar thead th, .footer-widget #wp-calendar td#today, .widget #wp-calendar td#today, .footer-widget .searchform #s, .footer-widget .searchform #search, form.search-form input[type="submit"]:hover, .footer-widget .searchform div i.fa.fa-search, .tagcloud a:hover, .social-links .fa:hover, .social-links .fa:focus, .flex-caption h3 {
				color: <?php echo $custom_theme_color; ?>;
			}
			.main-navigation ul#primary-menu > li > a:hover, .main-navigation .current-menu-item > a {
				border-bottom-color: <?php echo $custom_theme_color; ?>;
			}
			form#commentform input#url:focus, form#commentform textarea#comment:focus,form#commentform input#author:focus, form#commentform input#email:focus, form#commentform input#submit, .action-button, .blog-feature-wrapper h2, .blog-feature-second-button a.bfeature-btn, .widget #wp-calendar thead th, .footer-widget .searchform #s, .footer-widget .searchform #search, form.search-form input[type="submit"], .footer-widget select, .widget select, blockquote, .flex-caption{
				border-color:  <?php echo $custom_theme_color; ?>;
			}
			form#commentform input#submit, .action-button, .blog-feature-second-button a.bfeature-btn, form.search-form input[type="submit"], .mm-navbar, .widget #wp-calendar thead th {
				background:  <?php echo $custom_theme_color; ?>;
			}
			.footer-widget h4:after{
				background-color: <?php echo $custom_theme_color; ?>;
			}
        </style>
    <?php
    endif;
}
add_action('wp_head', 'custom_theme_color');

function header_footer_bg_color(){
    $header_footer_bg_color = esc_html( get_theme_mod( 'header_footer_bg_color' ) ); 
    
    if ( $header_footer_bg_color != '#654e9c' && $header_footer_bg_color != '' ) :
    ?>
        <style type="text/css">
        	.top-nav-wrapper, footer.site-footer, .enquiry-form input[type="submit"] {
			    background: <?php echo $header_footer_bg_color; ?>;
			}
        </style>
    <?php
    endif;
}
add_action('wp_head', 'header_footer_bg_color');


function custom_css(){
    $custom_css = esc_attr( get_theme_mod('custom_css') );
    echo '<style type="text/css">'. stripslashes( $custom_css ).'</style>';
}
add_action('wp_head', 'custom_css');

function initilize_wow_js(){
	$animation_option = esc_attr( get_theme_mod('animation_option', 'on') );
	if($animation_option=='on'){ ?>
		<script type="text/javascript">
			new WOW().init(); // Initialization of wow effects (animation)
		</script>
<?php }
}

add_action('wp_footer', 'initilize_wow_js');