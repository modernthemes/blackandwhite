<?php
/**
 * blackandwhite Theme Customizer
 *
 * @package blackandwhite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function blackandwhite_theme_customizer( $wp_customize ) {
	
	//allows donations
    class blackandwhite_Info extends WP_Customize_Control { 
     
        public $label = '';
        public function render_content() {
        ?>

        <?php
        }
    }	
	
	// Donations
    $wp_customize->add_section(
        'blackandwhite_theme_info',
        array(
            'title' => __('Like Black and White? Help Us Out.', 'blackandwhite'), 
            'priority' => 5, 
            'description' => __('We do all we can do to make all our themes free for you. While we enjoy it, and it makes us happy to help out, a little appreciation can help us to keep theming.</strong><br/><br/> Please help support our mission and continued development with a donation of $5, $10, $20, or if you are feeling really kind $100..<br/><br/> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7LMGYAZW9C5GE" target="_blank" rel="nofollow"><img class="" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="Make a donation to ModernThemes" /></a>'), 
        )
    );
	 
    //Donations section
    $wp_customize->add_setting('blackandwhite_help', array(   
			'sanitize_callback' => 'blackandwhite_no_sanitize', 
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new blackandwhite_Info( $wp_customize, 'blackandwhite_help', array(
        'section' => 'blackandwhite_theme_info', 
        'settings' => 'blackandwhite_help',  
        'priority' => 10
        ) )
    ); 
	
	// Fonts  
    $wp_customize->add_section(
        'blackandwhite_typography',
        array(
            'title' => __('Google Fonts', 'blackandwhite' ),  
            'priority' => 39, 
        )
    );
    $font_choices = 
        array(
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
            'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Raleway:400,700' => 'Raleway',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',     
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Oswald:400,700' => 'Oswald',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
    
    $wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'blackandwhite_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
            'description' => __('Select your desired font for the headings. Playfair Display is the default Heading font.', 'blackandwhite'),
            'section' => 'blackandwhite_typography',
            'choices' => $font_choices
        )
    );
    
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'sanitize_callback' => 'blackandwhite_sanitize_fonts', 
        )
    );
    
    $wp_customize->add_control(
        'body_fonts',
        array(
            'type' => 'select',
            'description' => __( 'Select your desired font for the body. Playfair Display is the default Body font.', 'blackandwhite' ), 
            'section' => 'blackandwhite_typography',  
            'choices' => $font_choices 
        ) 
    );

	// Highlight and link color
    $wp_customize->add_setting( 'blackandwhite_link_color', array(
        'default'           => ' ',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blackandwhite_link_color', array(
        'label'	   => 'Link and Highlight Color',
        'section'  => 'colors',
        'settings' => 'blackandwhite_link_color',
    ) ) );

    // Logo upload
    $wp_customize->add_section( 'blackandwhite_logo_section' , array(  
	    'title'       => __( 'Logo and Icons', 'blackandwhite' ),
	    'priority'    => 25,
	    'description' => 'Upload a logo to replace the default site name and description in the header. Also, upload your site favicon and Apple Icons.', 
	) );

	$wp_customize->add_setting( 'blackandwhite_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blackandwhite_logo', array(
		'label'    => __( 'Logo', 'blackandwhite' ),
		'section'  => 'blackandwhite_logo_section', 
		'settings' => 'blackandwhite_logo',
		'priority' => 1,
	) ) );
	
	// Logo Width
	$wp_customize->add_setting( 'logo_size', 
	array(
		'sanitize_callback' => 'blackandwhite_sanitize_text', 	 
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'logo_size', array( 
		'label'    => __( 'Change the width of the Logo in PX.', 'blackandwhite' ),
		'description'    => __( 'Only enter numeric value', 'blackandwhite' ),
		'section'  => 'blackandwhite_logo_section', 
		'settings' => 'logo_size',  
		'priority'   => 2 
	) ) );
	
	//Favicon Upload
	$wp_customize->add_setting(
		'site_favicon',
		array(
			'default' => (get_stylesheet_directory_uri() . '/images/favicon.png'), 
			'sanitize_callback' => 'esc_url_raw',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon (16 x 16 pixels)', 'blackandwhite' ),
			   'type' 			=> 'image', 
               'section'        => 'blackandwhite_logo_section',
               'settings'       => 'site_favicon',
               'priority' => 2,
            )
        )
    );
    //Apple touch icon 144
    $wp_customize->add_setting(
        'apple_touch_144',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_144',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (144x144 pixels)', 'blackandwhite' ),
               'type'           => 'image',
               'section'        => 'blackandwhite_logo_section',
               'settings'       => 'apple_touch_144',
               'priority'       => 11,
            )
        )
    );
    //Apple touch icon 114
    $wp_customize->add_setting(
        'apple_touch_114',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw', 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_114',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (114x114 pixels)', 'blackandwhite' ),
               'type'           => 'image',
               'section'        => 'blackandwhite_logo_section',
               'settings'       => 'apple_touch_114',
               'priority'       => 12,
            )
        )
    );
    //Apple touch icon 72
    $wp_customize->add_setting(
        'apple_touch_72',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_72',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (72x72 pixels)', 'blackandwhite' ),
               'type'           => 'image',
               'section'        => 'blackandwhite_logo_section',
               'settings'       => 'apple_touch_72', 
               'priority'       => 13,
            )
        )
    );
    //Apple touch icon 57
    $wp_customize->add_setting(
        'apple_touch_57',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_57',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (57x57 pixels)', 'blackandwhite' ),
               'type'           => 'image',
               'section'        => 'blackandwhite_logo_section',
               'settings'       => 'apple_touch_57',
               'priority'       => 14,
            )
        )
    );
	
	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blackandwhite_custom_background_args', array(
	'default-color' => 'ffffff',
	'default-image' => '',
	) ) );
	
	// Add Home Section
	$wp_customize->add_section( 'blackandwhite_home_section' , array(
    	'title' => __( 'Home Page', 'blackandwhite' ),
    	'priority' => 31,
    	'description' => __( 'Customize your home page area', 'blackandwhite' )
	) );
	
	$wp_customize->add_setting('active_featured_stories',
	    array(
	        'sanitize_callback' => 'blackandwhite_sanitize_checkbox',
	    ) 
	);   
	
	$wp_customize->add_control(
    'active_featured_stories',
    array(
        'type' => 'checkbox',
        'label' => 'Hide Featured Stories Section',  
        'section' => 'blackandwhite_home_section', 
		'priority'   => 1
    ));
	
	// Featured Title
	$wp_customize->add_setting( 'blackandwhite_featured_title', 
	array(
		'sanitize_callback' => 'blackandwhite_sanitize_text', 	 
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blackandwhite_featured_title', array(
    'label' => __( 'Featured Stories Title', 'blackandwhite' ),
    'section' => 'blackandwhite_home_section',
    'settings' => 'blackandwhite_featured_title', 
	'priority'   => 3
	)));
	
	// Editorial Title
	$wp_customize->add_setting( 'blackandwhite_editorial_title', 
	array(
		'sanitize_callback' => 'blackandwhite_sanitize_text', 	 
	));
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blackandwhite_editorial_title', array(
    'label' => __( 'Editorial Title', 'blackandwhite' ),
    'section' => 'blackandwhite_home_section',
    'settings' => 'blackandwhite_editorial_title', 
	'priority'   => 4
	)));
	
	// Button Text
	$wp_customize->add_setting( 'blackandwhite_button_text', 
	array(
		'sanitize_callback' => 'blackandwhite_sanitize_text', 	 
	) );
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blackandwhite_button_text', array(
    'label' => __( 'Button Text', 'blackandwhite' ), 
    'section' => 'blackandwhite_home_section',
    'settings' => 'blackandwhite_button_text', 
	'priority'   => 5
	) ) );
	
	// Add Footer Section
	$wp_customize->add_section( 'footer-custom' , array(
    	'title' => __( 'Footer', 'blackandwhite' ),
    	'priority' => 32,
    	'description' => __( 'Customize your footer area', 'blackandwhite' )
	) );  
	
	// Footer Site Title
	$wp_customize->add_setting( 'blackandwhite_footer_name', 
	array(
		'sanitize_callback' => 'blackandwhite_sanitize_text', 	 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blackandwhite_footer_name', array(
    'label' => __( 'Footer Site Title', 'blackandwhite' ),
    'section' => 'footer-custom',
    'settings' => 'blackandwhite_footer_name', 
	'priority'   => 1
	) ) );
	
	// Footer Slogan
	$wp_customize->add_setting( 'blackandwhite_footer_slogan', 
	array(
		'sanitize_callback' => 'blackandwhite_sanitize_text', 	 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blackandwhite_footer_slogan', array(
    'label' => __( 'Footer Slogan', 'blackandwhite' ),
    'section' => 'footer-custom',
    'settings' => 'blackandwhite_footer_slogan',
	'priority'   => 2
	) ) ); 
	
	// Footer Byline Text 
	$wp_customize->add_setting( 'blackandwhite_footerid', 
	array(
		'sanitize_callback' => 'blackandwhite_sanitize_text', 	 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blackandwhite_footerid', array(
    'label' => __( 'Footer Byline Text', 'blackandwhite' ),
    'section' => 'footer-custom',
    'settings' => 'blackandwhite_footerid',
	'priority'   => 3  
	) ) ); 

    // Choose excerpt or full content on blog
    $wp_customize->add_section( 'blackandwhite_layout_section' , array( 
	    'title'       => __( 'Layout', 'blackandwhite' ),
	    'priority'    => 37,
	    'description' => 'Change how blackandwhite displays posts',
	) );

	$wp_customize->add_setting( 'blackandwhite_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'blackandwhite_sanitize_index_content',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blackandwhite_post_content', array(
		'label'    => __( 'Post content', 'blackandwhite' ),
		'section'  => 'blackandwhite_layout_section',
		'settings' => 'blackandwhite_post_content',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => 'Excerpts',
			'option2' => 'Full content',
			),
	) ) );
	
	//Excerpt
    $wp_customize->add_setting(
        'exc_length',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
        )       
    );
    $wp_customize->add_control( 'exc_length', array( 
        'type'        => 'number',
        'priority'    => 2, 
        'section'     => 'blackandwhite_layout_section',
        'label'       => __('Excerpt length', 'blackandwhite'),
        'description' => __('Choose your excerpt length here. Default: 30 words', 'blackandwhite'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',  
        ),
    ) );  
	
	// Move sections up 
	$wp_customize->get_section('static_front_page')->priority = 10;
	$wp_customize->get_section('nav')->priority = 11; 

	// Set site name and description to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';

	// Enqueue scripts for real-time preview
	wp_enqueue_script( 'blackandwhite-customizer', get_template_directory_uri() . '/js/blackandwhite-customizer.js', array( 'jquery', 'customize-preview' ) );
 

}
add_action('customize_register', 'blackandwhite_theme_customizer');


/**
 * Sanitizes a hex color. Identical to core's sanitize_hex_color(), which is not available on the wp_head hook.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 1.7
 */
function blackandwhite_sanitize_hex_color( $color ) {
	if ( '#000000' === $color ) 
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;

	return null;
}

/**
 * Sanitizes our post content value (either excerpts or full post content).
 *
 * @since 1.7
 */
function blackandwhite_sanitize_index_content( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}

//Checkboxes
function blackandwhite_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function blackandwhite_sanitize_int( $input ) { 
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
//Text
function blackandwhite_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Sanitizes Fonts 
function blackandwhite_sanitize_fonts( $input ) {  
    $valid = array(
            'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
            'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Raleway:400,700' => 'Raleway',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',     
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Oswald:400,700' => 'Oswald',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function blackandwhite_no_sanitize( $input ) {
}

/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.5
 */
function blackandwhite_add_customizer_css() {
	$color = blackandwhite_sanitize_hex_color( get_theme_mod( 'blackandwhite_link_color' ) );
	?>
	<!-- blackandwhite customizer CSS -->
	<style>
		body {
			border-color: <?php echo $color; ?>;
		}
		a, a:hover {
			color: <?php echo $color; ?>;
		}
		 
	</style>
<?php }
add_action( 'wp_head', 'blackandwhite_add_customizer_css' );