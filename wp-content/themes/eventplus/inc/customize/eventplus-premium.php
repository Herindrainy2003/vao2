<?php
function eventplus_premium_setting( $wp_customize ) {
/*=========================================
	Premium Theme Details Page
	=========================================*/
	/*=========================================
	Page Layout Settings Section
	=========================================*/
	$wp_customize->add_section(
        'upgrade_premium',
        array(
            'title' 		=> __('Upgrade to Pro','eventplus'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	Add Buttons
	=========================================*/
	
	class Eventplus_WP_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'upgrade_premium';

	   function render_content() {
		?>
			<div class="premium_info">
				<ul>
					<li><a class="documentation" href="http://help.nayrathemes.com/category/free-themes/eventplus-free/" target="_blank"><i class="dashicons dashicons-visibility"></i><?php _e( 'View Documentation','eventplus' ); ?> </a></li>
					
					<li><a class="support" href="https://nayrathemes.ticksy.com/" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php _e( 'Get Support','eventplus' ); ?> </a></li>
					
					<li><a class="free-pro" href="https://www.nayrathemes.com/eventplus-free/" target="_blank"><i class="dashicons dashicons-visibility"></i><?php _e( 'Free Vs Pro','eventplus' ); ?> </a></li>
					
					<li><a class="upgrade-to-pro" href="https://www.nayrathemes.com/eventplus-free/" target="_blank"><i class="dashicons dashicons-update-alt"></i><?php _e( 'Upgrade to Pro','eventplus' ); ?> </a></li>
					
					<li><a class="show-love" href="https://wordpress.org/support/theme/eventplus/reviews/#new-post" target="_blank"><i class="dashicons dashicons-smiley"></i><?php _e( 'Show Some Love','eventplus' ); ?> </a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting(
		'premium_info_buttons',
		array(
		   'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'eventplus_sanitize_text',
		)	
	);
	
	$wp_customize->add_control( new Eventplus_WP_Button_Customize_Control( $wp_customize, 'premium_info_buttons', array(
		'section' => 'upgrade_premium',
    ))
);
}
add_action( 'customize_register', 'eventplus_premium_setting', 999 );