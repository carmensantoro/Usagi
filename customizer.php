<?php
/**
 * Customizer functions
 */

class usagi_Customizer {

	public static function register( $wp_customize ) {

		// Move default settings "background_color" in the same section as background image settings
		// and rename the section just "Background"
		$wp_customize->get_control( 'background_color' )->section = 'background_image';
		$wp_customize->get_section( 'background_image' )->title = __( 'Background', 'usagi' );

		// Add new sections
		$wp_customize->add_section(
			'usagi_blog_settings',
			array(
				'title'      => __( 'Blog Settings', 'usagi' ),
				'priority'   => 80,
			)
		);

		$wp_customize->add_section(
			'usagi_misc_settings',
			array(
				'title'      => __( 'Misc', 'usagi' ),
				'priority'   => 100,
			)
		);

		$wp_customize->add_section(
			'usagi_more',
			array(
				'title'      => __( 'More', 'usagi' ),
				'priority'   => 130,
			)
		);

		// Setting and control for blog index content switch
		$wp_customize->add_setting(
			'usagi_blog_index_content',
			array(
				'default'           => 'excerpt',
				'sanitize_callback' => 'usagi_sanitize_blog_index_content',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'usagi_blog_index_content',
				array(
					'label'    => __( 'Blog Index Content', 'usagi' ),
					'section'  => 'usagi_blog_settings',
					'settings' => 'usagi_blog_index_content',
					'type'     => 'radio',
					'choices'  => array(
						'excerpt'  => __( 'Excerpt', 'usagi' ),
						'content'  => __( 'Full content', 'usagi' ),
					),
				)
			)
		);

		// Setting and control for responsive mode
		$wp_customize->add_setting(
			'usagi_responsive_mode' ,
			array(
				'default'           => 'on',
				'sanitize_callback' => 'usagi_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'usagi_responsive_mode',
				array(
					'label'    => __( 'Responsive Mode', 'usagi' ),
					'section'  => 'usagi_misc_settings',
					'settings' => 'usagi_responsive_mode',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'usagi' ),
						'off' => __( 'Off', 'usagi' ),
					),
				)
			)
		);

		// Settings and controls for header image display
		$wp_customize->add_setting(
			'home_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'usagi_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_header_image',
				array(
					'label'    => __( 'Display header on Homepage', 'usagi' ),
					'section'  => 'header_image',
					'settings' => 'home_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'usagi' ),
						'off' => __( 'Off', 'usagi' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'blog_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'usagi_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'blog_header_image',
				array(
					'label'    => __( 'Display header on Blog Index', 'usagi' ),
					'section'  => 'header_image',
					'settings' => 'blog_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'usagi' ),
						'off' => __( 'Off', 'usagi' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'single_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'usagi_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'single_header_image',
				array(
					'label'    => __( 'Display header on Single Posts', 'usagi' ),
					'section'  => 'header_image',
					'settings' => 'single_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'usagi' ),
						'off' => __( 'Off', 'usagi' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'pages_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'usagi_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pages_header_image',
				array(
					'label'    => __( 'Display header on Pages', 'usagi' ),
					'section'  => 'header_image',
					'settings' => 'pages_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'usagi' ),
						'off' => __( 'Off', 'usagi' ),
					),
				)
			)
		);


	}

}
add_action( 'customize_register' , array( 'usagi_Customizer', 'register' ) );
add_action( 'customize_controls_enqueue_scripts', array( 'usagi_Customizer', 'customize_controls_scripts' ) );

// Create custom controls for customizer
if ( class_exists( 'WP_Customize_Control' ) ) {
	class usagi_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'button';
		public function render_content() {
			?>
			<label>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<a class="button" href="<?php echo esc_url( $this->value() ); ?>" target="_blank"><?php echo esc_html( $this->label ); ?></a>
			</label>
			<?php
		}
	}
}

// Sanitation callback functions
function usagi_sanitize_blog_index_content( $input ) {

	$choices = array( 'excerpt', 'content' );

	if ( in_array( $input, $choices, true ) ) :
		return $input;
	else :
		return '';
	endif;

}

function usagi_sanitize_on_off( $input ) {

	$choices = array( 'on', 'off' );

	if ( in_array( $input, $choices, true ) ) :
		return $input;
	else :
		return '';
	endif;

}

function usagi_sanitize_button( $input ) {
	return '';
}
