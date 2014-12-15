<?php


//Google Fonts 

function blackandwhite_custom_styles($custom) { 


	//Fonts

	$headings_font = esc_html(get_theme_mod('headings_fonts')); 	

	$body_font = esc_html(get_theme_mod('body_fonts'));	

	

	if ( $headings_font ) {

		$font_pieces = explode(":", $headings_font);

		$custom .= "h1, h2, h3, h4, h5, h6, .slider p, .entry-footer, .entry-meta, .slider p, .featured-info p, .press-info h1, .press-info p, .more-stories { font-family: {$font_pieces[0]}; }"."\n"; 

	}

	if ( $body_font ) {

		$font_pieces = explode(":", $body_font);

		$custom .= "body, button, input, select, textarea, .top-nav a, .main-navigation a, .site-description, .meta-nav, .read-up, .featured-link, .site-footer, .footer-align p, .site-footer p { font-family: {$font_pieces[0]}; }"."\n";

	}

	//Output all the styles

	wp_add_inline_style( 'blackandwhite-style', $custom );	

}

add_action( 'wp_enqueue_scripts', 'blackandwhite_custom_styles' );