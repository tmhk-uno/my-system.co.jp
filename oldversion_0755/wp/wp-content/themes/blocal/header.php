<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blocal
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="container">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blocal' ); ?></a>

<?php
    $social_facebook = esc_url( get_theme_mod('social_facebook') );
    $social_twitter = esc_url( get_theme_mod('social_twitter') );
    $social_google_plus = esc_url( get_theme_mod('social_google_plus') );
    $social_pinterest = esc_url( get_theme_mod('social_pinterest') );
    $social_linkedin = esc_url( get_theme_mod('social_linkedin') );
    $social_youtube = esc_url( get_theme_mod('social_youtube') );
?>
		<div class="top-nav-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="mobile-menu">
                        <a href="#mmenu">
                            <span class="mmenu_icon">
                                <span class="mmenu_icon-bar"></span>
                                <span class="mmenu_icon-bar"></span>
                                <span class="mmenu_icon-bar"></span>
                            </span>
                        </a>
                    </div>

					<div class="social-links">
					<?php if ( isset($social_facebook) && $social_facebook != '') { ?>
						<a href="<?php echo $social_facebook; ?>" alt="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
					<?php } ?>

					<?php if ( isset($social_twitter) && $social_twitter != '') { ?>
						<a href="<?php echo $social_twitter; ?>" alt="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
					<?php } ?>

					<?php if ( isset($social_google_plus) && $social_google_plus != '') { ?>
						<a href="<?php echo $social_google_plus; ?>" alt="Google-Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
					<?php } ?>

					<?php if ( isset($social_linkedin) && $social_linkedin != '') { ?>
						<a href="<?php echo $social_linkedin; ?>" alt="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
					<?php } ?>

					<?php if ( isset($social_pinterest) && $social_pinterest != '') { ?>
						<a href="<?php echo $social_pinterest; ?>" alt="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
					<?php } ?>

					<?php if ( isset($social_youtube) && $social_youtube != '') { ?>
						<a href="<?php echo $social_youtube; ?>" alt="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>  
					<?php } ?>
 
					</div>
				</div>
			</div>
		</div>

		<header id="masthead" class="site-header" role="banner">
			<div class="row">
				<div class="col-md-4">
					<div class="site-branding">
						<?php if ( get_theme_mod('logo') != '' ): ?> 
                            <a href="<?php echo esc_url( home_url() ); ?>">
                                <img src="<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>" alt="<?php bloginfo('name'); ?>">
                            </a>
                        <?php else: ?>
                            <a href="<?php echo esc_url( home_url() ); ?>">
                                <h1><?php bloginfo('name'); ?></a></h1>
                                <p><?php bloginfo('description'); ?></p>
                            </a>
                        <?php endif; ?>
					</div><!-- .site-branding -->
				</div>
				<div class="col-md-8">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'blocal' ); ?></button> -->
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->

					<nav id="mmenu">
			            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => '' ) ); ?>
			        </nav>
				</div>
			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content">
