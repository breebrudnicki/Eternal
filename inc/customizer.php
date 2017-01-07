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
	//Creating a section
	$wp_customize->add_section('eternal_wedding-countdown', array(
		'title' => __('Wedding Countdown', 'Eternal'),
		'priority' => 30,
	));
	//wedding date setting
	$wp_customize->add_setting('eternal-wedding-date', array(
		'default' => $oneyear,
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));
	//Creating a control
	$wp_customize->add_control( new Eternal_DateControl($wp_customize, 'eternal-date-control', array(
		'label' => __('Countdown Date Picker', 'Eternal'),
		'section' => 'eternal_wedding-countdown',
		'settings' => 'eternal-wedding-date',
		'type' => 'text'
	)));
	//setting for title
	$wp_customize->add_setting('eternal-wedding-title', array(
		'default' => "We've Picked a Date!",
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));
	//control for title
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'eternal-title-control', array(
		'label' => __('Display Title', 'Eternal'),
		'section' => 'eternal_wedding-countdown',
		'settings' => 'eternal-wedding-title',
		'type' => 'text'
	)));

		/**
		 * Add Panels
		 */
		$wp_customize->add_panel( 'eternal_theme_options', array(
			'title' => esc_html__( 'Front Page Options', 'eternal' ),
		) );

		// Panel 1
		$wp_customize->add_section( 'eternal_panel1', array(
			'title'           => esc_html__( 'Registry Details', 'eternal' ),
			'active_callback' => 'is_front_page',
			'panel'           => 'eternal_theme_options',
		) );
		//Registry Title
		$wp_customize->add_setting('eternal-registry-title', array(
			'default' => "",
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'eternal-registry-title-control', array(
			'label' => __('Registry Title', 'Eternal'),
			'section' => 'eternal_panel1',
			'settings' => 'eternal-registry-title',
			'type' => 'text'
		)));
		//Registry Blurb
		$wp_customize->add_setting('eternal-registry-blurb', array(
			'default' => "",
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'eternal-registry-blurb-control', array(
			'label' => __('Registry Text', 'Eternal'),
			'section' => 'eternal_panel1',
			'settings' => 'eternal-registry-blurb',
			'type' => 'text'
		)));
		//Registry One
		$wp_customize->add_setting('eternal-registry-link-1', array(
			'default' => "",
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'eternal-registry-link-control-1', array(
			'label' => __('Registry URL', 'Eternal'),
			'section' => 'eternal_panel1',
			'settings' => 'eternal-registry-link-1',
			'type' => 'text'
		)));
		$wp_customize->add_setting('eternal_custom-registry1', array(
			'default' => '',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'eternal-registry-control-1', array(
			'label' => __('Registry One', 'Eternal'),
			'section' => 'eternal_panel1',
			'settings' => 'eternal_custom-registry1',
		)));
		//Registry Two
		$wp_customize->add_setting('eternal-registry-link-2', array(
			'default' => "",
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'eternal-registry-link-control-2', array(
			'label' => __('Registry URL', 'Eternal'),
			'section' => 'eternal_panel1',
			'settings' => 'eternal-registry-link-2',
			'type' => 'text'
		)));
		$wp_customize->add_setting('eternal_custom-registry2', array(
			'default' => '',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'eternal-registry-control-2', array(
			'label' => __('Registry Two', 'Eternal'),
			'section' => 'eternal_panel1',
			'settings' => 'eternal_custom-registry2',
		)));
		//Registry Three
		$wp_customize->add_setting('eternal-registry-link-3', array(
			'default' => "",
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'eternal-registry-link-control-3', array(
			'label' => __('Registry URL', 'Eternal'),
			'section' => 'eternal_panel1',
			'settings' => 'eternal-registry-link-3',
			'type' => 'text'
		)));
		$wp_customize->add_setting('eternal_custom-registry3', array(
			'default' => '',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'eternal-registry-control-3', array(
			'label' => __('Registry Three', 'Eternal'),
			'section' => 'eternal_panel1',
			'settings' => 'eternal_custom-registry3',
		)));
		// Panel 2
		$wp_customize->add_section( 'eternal_panel2', array(
			'title'           => esc_html__( 'Event Details', 'eternal' ),
			'active_callback' => 'is_front_page',
			'panel'           => 'eternal_theme_options',
		) );
		//date-time picker function - borrowed from together theme
		class Eternal_DateTimeControl extends WP_Customize_Control {
			function render_content() {
			?>
			<label>
				<span><?php echo esc_html($this->label); ?></span>
				<input type="datetime-local" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>">
			</label>
			<?php
			}
		}
		//Event One
		//place
		$wp_customize->add_setting('venue-one', array(
			'default' => "",
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'eternal-event-one-control', array(
			'label' => __('Location One', 'Eternal'),
			'section' => 'eternal_panel2',
			'settings' => 'venue-one',
			'type' => 'text'
		)));
		//date//time
		$wp_customize->add_setting('event-date-one', array(
			'default' => $oneyear,
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		));
		//Creating a control
		$wp_customize->add_control( new Eternal_DateTimeControl($wp_customize, 'eternal-event-one-date-control', array(
			'label' => __('Event One Date', 'Eternal'),
			'section' => 'eternal_panel2',
			'settings' => 'event-date-one',
			'type' => 'text'
		)));
		//Event Two
		//place
		$wp_customize->add_setting('venue-two', array(
			'default' => "",
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		));
		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'eternal-event-two-control', array(
			'label' => __('Location Two', 'Eternal'),
			'section' => 'eternal_panel2',
			'settings' => 'venue-two',
			'type' => 'text'
		)));
		//date//time
		$wp_customize->add_setting('event-date-two', array(
			'default' => $oneyear,
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		));
		//Creating a control
		$wp_customize->add_control( new Eternal_DateTimeControl($wp_customize, 'eternal-event-two-date-control', array(
			'label' => __('Event Two Date', 'Eternal'),
			'section' => 'eternal_panel2',
			'settings' => 'event-date-two',
			'type' => 'text'
		)));
		//page with more details
		$wp_customize->add_setting( 'eternal_panel2', array(
			'default'           => false,
			'sanitize_callback' => 'eternal_sanitize_numeric_value',
		) );
		$wp_customize->add_control( 'eternal_panel2', array(
			'label'   => esc_html__( 'Page with More Details', 'eternal' ),
			'section' => 'eternal_panel2',
			'type'    => 'dropdown-pages',
		) );
		// RSVP Section
		$wp_customize->add_section( 'eternal_panel3', array(
			'title'           => esc_html__( 'RSVP', 'eternal' ),
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
}
add_action( 'customize_register', 'eternal_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eternal_customize_preview_js() {
	wp_enqueue_script( 'eternal_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'eternal_customize_preview_js' );

/**
 * Count Down Date
 */
// Register the script
function eternal_load_scripts() {
	wp_register_script('eternal_countdown', get_template_directory_uri() . '/js/countdown.js', false, false, true);

	$eternal_countdown_date = array(
		'eternal_countdown_date' => get_theme_mod( 'eternal-wedding-date' )
	);
	wp_localize_script( 'eternal_countdown', 'eternal_countdown_date', $eternal_countdown_date );
	// Enqueued script with localized data.
	wp_enqueue_script( 'eternal_countdown' );

}
add_action('wp_enqueue_scripts', 'eternal_load_scripts');
