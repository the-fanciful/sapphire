<?php
/**
 * Colors Customizer Options
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Sapphire_Colors_Customizer' ) ) :

	class Sapphire_Colors_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', 		array( $this, 'customizer_options' ) );

		}
		/**
		 * Customizer options
		 *
		 * @since 1.0.0
		 */
		public function customizer_options( $wp_customize ) {

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
                        'label' 	=> __( 'Primary Color', 'sapphire' ),
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
                    'sapphire_highlight_color',
                    array(
                        'label' 	=> __( 'Highlight Color', 'sapphire' ),
                        'section' 	=> 'colors',
                        'settings' 	=> 'sapphire_alt_color',
                    )
                )
            );

            // Highlight color
            $wp_customize->add_setting(
                'sapphire_heading_color',
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
                        'label' 	=> __( 'Highlight Color', 'sapphire' ),
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
                        'label' 	=> __( 'Body Text Color', 'sapphire' ),
                        'section' 	=> 'colors',
                        'settings' 	=> 'sapphire_body_color',
                    )
                )
            );
                    }
		}

		/**
		 * Loads js file for customizer preview
		 *
		 * @since 1.0.0
		 */
		public function customize_preview_init() {
			//wp_enqueue_script( 'oceanwp-typography-customize-preview', OCEANWP_INC_DIR_URI . 'customizer/assets/js/typography-customize-preview.min.js', array( 'customize-preview' ), OCEANWP_THEME_VERSION, true );
		}

endif;

return new Sapphire_Colors_Customizer();