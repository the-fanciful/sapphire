<?php
/**
 * Customizer style output
 *
 * @package whimsy-framework
 */

/**
 * Insert Customizer styles.
 */
function sapphire_customizer_styles() {
    echo '<!-- Begin Blueprint styles --><style type="text/css">';
	
	$sapphire_link_color = get_theme_mod( 'sapphire_link_color' );
	echo 'a, a:visited { color: ' . esc_html($sapphire_link_color) . ' }';
    
	if ( class_exists( 'woocommerce' ) ) {
		echo '.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce-page .shipping-calculator-button, #infinite-handle span, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-cart .wc-proceed-to-checkout { color: ' . esc_html($sapphire_link_color) . '; border-color: ' . esc_html($sapphire_link_color) . ' }';
	} 

	$sapphire_alt_color = get_theme_mod( 'sapphire_alt_color' );
	echo 'a:hover, a:focus, a:active { color: ' . esc_html($sapphire_alt_color) . ' }';
	echo '::selection { background: ' . esc_html($sapphire_link_color) . ' }';
	echo '::-moz-selection { background: ' . esc_html($sapphire_link_color) . ' }';
	echo 'h1,h2,h3,h4,h5,h6 { color: ' . esc_html($sapphire_alt_color) . ' }';
	echo 'a.btn-shortcode:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover { border-color: ' . esc_html($sapphire_alt_color) . ' }';

	$sapphire_body_color = get_theme_mod( 'sapphire_body_color' );
	echo 'body { color: ' . esc_html($sapphire_body_color) . ' }';

	echo '</style>';
}
add_action('wp_head', 'sapphire_customizer_styles', 100);