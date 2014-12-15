<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package blackandwhite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">  
<?php add_action( 'wp_enqueue_scripts', 'blackandwhite_scripts' ); ?>

<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php if ( get_theme_mod('apple_touch_144') ) : ?>
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('apple_touch_144')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_114') ) : ?>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('apple_touch_114')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_72') ) : ?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_theme_mod('apple_touch_72')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_57') ) : ?>
	<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('apple_touch_57')); ?>" />
<?php endif; ?> 

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<?php do_action( 'before' ); ?>
			
            <header id="masthead" class="site-header" role="banner"> 
    			
                <div class="top-nav">
        			<div class="grid">
        				<div class="col-1-2 top-menu"> 
        					<?php wp_nav_menu( array( 'theme_location' => 'top-nav' ) ); ?>
            			</div><!-- top-menu --> 
            			<div class="socials"><?php echo blackandwhite_media_icons(); ?></div><!-- socials -->
            		</div><!-- grid --> 
        		</div><!-- top-nav --> 
    
				<div class="site-branding grid">
        			<?php if ( get_theme_mod( 'blackandwhite_logo' ) ) : ?>
						<div class="site-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) );  ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'blackandwhite_logo' ) ); // change the logo ?>" <?php if ( get_theme_mod( 'logo_size' ) ) : ?>width="<?php echo get_theme_mod( 'logo_size' ); ?>"<?php endif; ?> alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a> 
						</div><!-- site-logo -->
						<?php else : ?> 
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?> 
				</div><!-- site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
            		<div class="grid nav-pad">
						<h1 class="menu-toggle"><?php _e( 'Menu', 'blackandwhite' ); ?></h1>
						<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'blackandwhite' ); ?></a>
					
                    	<div class="col-10-12">
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            			</div><!-- col-10-12 -->
            		
                    	<div class="col-2-12 nav-search"> 
            				<?php get_search_form(); ?> 
            			</div><!-- nav-search -->
         			</div><!-- grid -->
				</nav><!-- #site-navigation -->
			
            </header><!-- #masthead -->

	<section id="content" class="site-content">
