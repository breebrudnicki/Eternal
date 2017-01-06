<?php
/**
 * Eternal Theme Customizer
 *
 * @package Eternal
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eternal_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	//Adding a Setting
	$wp_customize->add_setting( 'header_textcolor' , array(
		'default'     => '#000000',
		'transport'   => 'refresh',
	) );
	//Adding a New Section
	$wp_customize->add_section( 'mytheme_new_section_name' , array(
    'title'      => __( 'Visible Section Name', 'mytheme' ),
    'priority'   => 30,
	) );
	//Adding a new control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	'label'        => __( 'Header Color', 'mytheme' ),
	'section'    => 'mytheme_new_section_name',
	'settings'   => 'header_textcolor',
	) ) );
	//COLOR EXAMPLE
	//Creating a setting
	$wp_customize->add_setting('eternal_link_color', array(
		'default' => '#fff',
		'transport' => 'refresh',
	));
	//Creating a section
	$wp_customize->add_section('eternal_standard_colors', array(
		'title' => __('Standard Colors', 'Eternal'),
		'priority' => 30,
	));
	//Creating a control
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'eternal_link_color_control', array(
		'label' => __('Link Color', 'Eternal'),
		'section' => 'eternal_standard_colors',
		'settings' => 'eternal_link_color',
	)));

	//MY OWN THING
	$wp_customize->add_setting('eternal_custom-logo', array(
		'default' => '',
		'transport' => 'refresh',
	));
	//Creating a section
	$wp_customize->add_section('eternal_logo', array(
		'title' => __('Logo', 'Eternal'),
		'priority' => 30,
	));
	//Creating a control
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'eternal-logo-control', array(
		'label' => __('Logo', 'Eternal'),
		'section' => 'eternal_logo',
		'settings' => 'eternal_custom-logo',
	)));
}
add_action( 'customize_register', 'eternal_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eternal_customize_preview_js() {
	wp_enqueue_script( 'eternal_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'eternal_customize_preview_js' );
