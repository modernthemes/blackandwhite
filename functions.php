<?php
/**
 * blackandwhite functions and definitions
 *
 * @package blackandwhite
*/

/**
 * Theme Updater
 */      
require_once('inc/wp-updates-theme.php');
new WPUpdatesThemeUpdater_983( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'blackandwhite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blackandwhite_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on blackandwhite, use a find and replace
	 * to change 'blackandwhite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'blackandwhite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'blackandwhite' ),
		'top-nav' => __( 'Top Nav Menu', 'blackandwhite' ), 
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blackandwhite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // blackandwhite_setup
add_action( 'after_setup_theme', 'blackandwhite_setup' );

/**
 * Load Google Fonts.
 */
function load_fonts() {
            wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic|Oswald:400,300,700');
            wp_enqueue_style( 'googleFonts'); 
        }
 
    add_action('wp_print_styles', 'load_fonts');
	
/**
* Register and load font awesome CSS files using a CDN.
*
* @link http://www.bootstrapcdn.com/#fontawesome
* @author FAT Media 
*/
	
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_awesome' );

function prefix_enqueue_awesome() {
wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.2.0' );  
}
 

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function blackandwhite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'blackandwhite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Column 2', 'blackandwhite' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s footer-align">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title footer-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Column 3', 'blackandwhite' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s footer-align">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title footer-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Column 4', 'blackandwhite' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s footer-align">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title footer-title">',
		'after_title'   => '</h2>',
	) );
	
	//Register the sidebar widgets   
	register_widget( 'blackandwhite_Video_Widget' );
	register_widget( 'blackandwhite_Contact_Info' ); 
	
}
add_action( 'widgets_init', 'blackandwhite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blackandwhite_scripts() { 
	wp_enqueue_style( 'blackandwhite-style', get_stylesheet_uri() );
	
	$headings_font = esc_html(get_theme_mod('headings_fonts'));
	$body_font = esc_html(get_theme_mod('body_fonts')); 
	
	if( $headings_font ) {
		wp_enqueue_style( 'blackandwhite-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'blackandwhite-playfair-display', '//fonts.googleapis.com/css?family=Playfair+Display:400,700');  
	}	
	if( $body_font ) {
		wp_enqueue_style( 'blackandwhite-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );	
	} else {
		wp_enqueue_style( 'blackandwhite-playfair-display', '//fonts.googleapis.com/css?family=Oswald:400,300,700');
	} 
	
	if ( file_exists( get_stylesheet_directory_uri() . '/inc/my_style.css' ) ) {
	wp_enqueue_style( 'blackandwhite-mystyle', get_stylesheet_directory_uri() . '/inc/my_style.css', array(), false, false );
	}
	
	if ( is_admin() ) {
    wp_enqueue_style( 'blackandwhite-codemirror', get_stylesheet_directory_uri() . '/css/codemirror.css', array(), '1.0' ); 
	}
	 
	wp_enqueue_script( 'blackandwhite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );  
	wp_enqueue_script( 'blackandwhite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'blackandwhite-codemirrorJS', get_template_directory_uri() . '/js/codemirror.js', array(), false, true); 
	wp_enqueue_script( 'blackandwhite-cssJS', get_template_directory_uri() . '/js/css.js', array(), false, true);
	wp_enqueue_script( 'blackandwhite-placeholder', get_template_directory_uri() . '/js/jquery.placeholder.js', array('jquery'), false, true);
 	wp_enqueue_script( 'blackandwhite-placeholdertext', get_template_directory_uri() . '/js/placeholdertext.js', array('jquery'), false, true);
	
	if ( is_page_template( 'page-contact.php' ) ) {  
	wp_enqueue_script( 'blackandwhite-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), false, true);
	wp_enqueue_script( 'blackandwhite-verify', get_template_directory_uri() . '/js/verify.js', array('jquery'), false, true);   
}
	
	if( is_front_page() ) {
	wp_enqueue_script( 'blackandwhite-masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), true );
	wp_enqueue_script( 'blackandwhite-bw-gallery', get_template_directory_uri() . '/js/bw-gallery.js', array(), true );
	wp_enqueue_script( 'blackandwhite-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), true );
	wp_enqueue_script( 'blackandwhite-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), false, false );
	}
	
	wp_enqueue_script( 'blackandwhite-scripts', get_template_directory_uri() . '/js/blackandwhite.scripts.js', array(), false, false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blackandwhite_scripts' );

/**
 * Load html5shiv
 */
function blackandwhite_html5shiv() { 
    echo '<!--[if lt IE 9]>' . "\n"; 
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'blackandwhite_html5shiv' );

/**
 * Change the excerpt length
 */
function blackandwhite_excerpt_length( $length ) {
	
	$excerpt = get_theme_mod('exc_length', '30'); 
	return $excerpt; 

}

add_filter( 'excerpt_length', 'blackandwhite_excerpt_length', 999 ); 

add_theme_support( 'post-thumbnails' ); 

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Include additional custom features.
 */
require get_template_directory() . '/inc/my-custom-css.php';
require get_template_directory() . '/inc/socialicons.php'; 
   
/**
 * Include additional custom admin panel features. 
 */
require get_template_directory() . '/panel/functions-admin.php';

/**
 * Google Fonts  
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * register your custom widgets
 */ 
require get_template_directory() . "/widgets/contact-info.php";
require get_template_directory() . "/widgets/video-widget.php";
  
/**
 * Resize Images as Squares
 */
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'featured-square', 800, 800, true ); 
	the_post_thumbnail('featured-square');
}

/**
 * Add checkboxes to posts
 */
 
function featured_metaboxes( $meta_boxes ) {
    $prefix = '_bw_'; // Prefix for all fields
    $meta_boxes['featured'] = array(
        'id' => 'featured',
        'title' => 'Feature this post?',
        'pages' => array('post'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
    			'name' => 'Feature on Slider',
    			'desc' => 'Check this box to feature this story on the main slider.',
    			'id' => $prefix . 'primary_checkbox',
    			'type' => 'checkbox'
				),
		    array(
    			'name' => 'Feature under Slider',
    			'desc' => 'Check this box to feature this story right below the slider.',
    			'id' => $prefix . 'secondary_checkbox',
    			'type' => 'checkbox'
				),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'featured_metaboxes' );

/**
 * Custom Fields
 */
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'meta/init.php' );
    }
}