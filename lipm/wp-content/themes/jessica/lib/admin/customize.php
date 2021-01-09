<?php
/**
 * Jessica.
 *
 * This file adds the Customizer additions to the Jessica Theme.
 *
 * @package Jessica
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/jessica/
 */

add_action( 'customize_register', 'jessica_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function jessica_customizer_register( $wp_customize ) {

	$wp_customize->add_setting(
		'jessica_link_color',
		array(
			'default'           => jessica_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'jessica_link_color',
			array(
				'description' => __( 'Change the hover color of linked titles, menu items, footer links, and more.', 'jessica' ),
				'label'       => __( 'Link Color', 'jessica' ),
				'section'     => 'colors',
				'settings'    => 'jessica_link_color',
			)
		)
	);
    
    $wp_customize->add_setting(
		'jessica_accent_color',
		array(
			'default'           => jessica_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'jessica_accent_color',
			array(
				'description' => __( 'Change the default color for buttons and submit buttons.', 'jessica' ),
				'label'       => __( 'Accent Color', 'jessica' ),
				'section'     => 'colors',
				'settings'    => 'jessica_accent_color',
			)
		)
	);

}
