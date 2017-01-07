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
	//Choose Logo
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
	//Wedding Date
	$today = date("Y-m-d H:i:s");
	$oneyear = date('Y-m-d', strtotime('+1 years'));
	//date picker function - borrowed from together theme
	class Eternal_DateControl extends WP_Customize_Control {
		function render_content() {
		?>
		<label>
			<span><?php echo esc_html($this->label); ?></span>
			<input type="date" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>">
		</label>
		<?php
		}
	}
	$wp_customize->add_setting('eternal-wedding-date', array(
		'default' => $oneyear,
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));
	//Creating a section
	$wp_customize->add_section('eternal_date', array(
		'title' => __('Countdown Date Picker', 'Eternal'),
		'priority' => 30,
	));
	//Creating a control
	$wp_customize->add_control( new Eternal_DateControl($wp_customize, 'eternal-date-control', array(
		'label' => __('Countdown Date Picker', 'Eternal'),
		'section' => 'eternal_date',
		'settings' => 'eternal-wedding-date',
		'type' => 'text'
	)));

		/**
		 * Add the Theme Options section
		 */
		$wp_customize->add_panel( 'eternal_theme_options', array(
			'title' => esc_html__( 'Front Page Options', 'eternal' ),
		) );

		// Panel 1
		$wp_customize->add_section( 'eternal_panel1', array(
			'title'           => esc_html__( 'Panel 1', 'eternal' ),
			'active_callback' => 'is_front_page',
			'panel'           => 'eternal_theme_options',
			'description'     => esc_html__( 'Add a background image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'eternal' ),
		) );

		$wp_customize->add_setting( 'eternal_panel1', array(
			'default'           => false,
			'sanitize_callback' => 'eternal_sanitize_numeric_value',
		) );

		$wp_customize->add_control( 'eternal_panel1', array(
			'label'   => esc_html__( 'Panel Content', 'eternal' ),
			'section' => 'eternal_panel1',
			'type'    => 'dropdown-pages',
		) );

		// Panel 2
		$wp_customize->add_section( 'eternal_panel2', array(
			'title'           => esc_html__( 'Panel 2', 'eternal' ),
			'active_callback' => 'is_front_page',
			'panel'           => 'eternal_theme_options',
			'description'     => esc_html__( 'Add a background image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'eternal' ),
		) );

		$wp_customize->add_setting( 'eternal_panel2', array(
			'default'           => false,
			'sanitize_callback' => 'eternal_sanitize_numeric_value',
		) );

		$wp_customize->add_control( 'eternal_panel2', array(
			'label'   => esc_html__( 'Panel Content', 'eternal' ),
			'section' => 'eternal_panel2',
			'type'    => 'dropdown-pages',
		) );


		// Panel 3
		$wp_customize->add_section( 'eternal_panel3', array(
			'title'           => esc_html__( 'Panel 3', 'eternal' ),
			'active_callback' => 'is_front_page',
			'panel'           => 'eternal_theme_options',
			'description'     => esc_html__( 'Add a background image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'eternal' ),
		) );

		$wp_customize->add_setting( 'eternal_panel3', array(
			'default'           => false,
			'sanitize_callback' => 'eternal_sanitize_numeric_value',
		) );

		$wp_customize->add_control( 'eternal_panel3', array(
			'label'   => esc_html__( 'Panel Content', 'eternal' ),
			'section' => 'eternal_panel3',
			'type'    => 'dropdown-pages',
		) );


		// Panel 4
		$wp_customize->add_section( 'eternal_panel4', array(
			'title'           => esc_html__( 'Panel 4', 'eternal' ),
			'active_callback' => 'is_front_page',
			'panel'           => 'eternal_theme_options',
			'description'     => esc_html__( 'Add a background image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'eternal' ),
		) );

		$wp_customize->add_setting( 'eternal_panel4', array(
			'default'           => false,
			'sanitize_callback' => 'eternal_sanitize_numeric_value',
		) );

		$wp_customize->add_control( 'eternal_panel4', array(
			'label'   => esc_html__( 'Panel Content', 'eternal' ),
			'section' => 'eternal_panel4',
			'type'    => 'dropdown-pages',
		) );


		// Panel 5
		$wp_customize->add_section( 'eternal_panel5', array(
			'title'           => esc_html__( 'Panel 5', 'eternal' ),
			'active_callback' => 'is_front_page',
			'panel'           => 'eternal_theme_options',
			'description'     => esc_html__( 'Add a background image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'eternal' ),
		) );

		$wp_customize->add_setting( 'eternal_panel5', array(
			'default'           => false,
			'sanitize_callback' => 'eternal_sanitize_numeric_value',
		) );

		$wp_customize->add_control( 'eternal_panel5', array(
			'label'   => esc_html__( 'Panel Content', 'eternal' ),
			'section' => 'eternal_panel5',
			'type'    => 'dropdown-pages',
		) );

}
add_action( 'customize_register', 'eternal_customize_register' );

/**
 * Sanitize a numeric value
 */
function eternal_sanitize_numeric_value( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	} else {
		return 0;
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eternal_customize_preview_js() {
	wp_enqueue_script( 'eternal_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'eternal_customize_preview_js' );
