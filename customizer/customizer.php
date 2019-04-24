<?php
/**
 * Whimsy Framework Theme Customizer
 *
 * @package whimsy-framework
 */
add_action( 'customize_register', 'sapphire_customize_register_section', 10 );
add_action( 'customize_register', 'sapphire_customize_register', 15 );
add_action( 'customize_preview_init', 'sapphire_customize_preview_js', 10 );
add_action( 'init', 'sapphire_customize_style_output', 5 );

/**
 * Add the individual sections to the Customizer.
 */
function sapphire_customize_register_section( $wp_customize ) {	

    /* Add Display Settings */
    $wp_customize->add_section(
        'sapphire_section_type',
        array(
            'title'         => __( 'Typography', 'site-blueprint' ),
            'description'   => __( 'Fine-tune the way your website looks and functions.', 'site-blueprint' ),
            'priority'      => 38,

        )
    );

}

/**
 * Add the individual settings and controls to the Customizer.
 */
function sapphire_customize_register( $wp_customize ) {
      
    
    // Link Color
	$wp_customize->add_setting(
	    'sapphire_link_color',
	    array(
	        'default' => '#52b0c1',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'sapphire_link_color',
	        array(
	            'label' 	=> __( 'Link Color', 'site-blueprint' ),
	            'section' 	=> 'colors',
	            'settings' 	=> 'sapphire_link_color',
	        )
	    )
	);
    
    // Highlight color
	$wp_customize->add_setting(
	    'sapphire_alt_color',
	    array(
	        'default' => '#324159',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'sapphire_alt_color',
	        array(
	            'label' 	=> __( 'Highlight Color', 'site-blueprint' ),
	            'section' 	=> 'colors',
	            'settings' 	=> 'sapphire_alt_color',
	        )
	    )
	);
    
    // Body text color
	$wp_customize->add_setting(
	    'sapphire_body_color',
	    array(
	        'default' => '#4b4b4b',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'sapphire_body_color',
	        array(
	            'label' 	=> __( 'Body Text Color', 'site-blueprint' ),
	            'section' 	=> 'colors',
	            'settings' 	=> 'sapphire_body_color',
	        )
	    )
	);
    
}

// Sanitize select settings
function sapphire_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    
}

// Sanitize checkboxes
function sapphire_sanitize_checkbox( $input ) {
    
    if ( $input == 1 ) {
        return 1;
    } 
    else {
        return '';
    }
    
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sapphire_customize_preview_js() {
    wp_enqueue_script( 'sapphire_customizer', get_template_directory_uri() . '/customizer/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}

/*
 * Load Customizer styles
 */
function sapphire_customize_style_output() { include( get_template_directory() . '/customizer/customizer-styles.php'); }