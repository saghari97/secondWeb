<?php
/**
* Active callback function of header top bar
*
* @return boolen
* @since 1.0.0
*
* @package Darkbiz WordPress Theme
*/
if( !function_exists( 'darkbiz_acb_top_bar' ) ):
	function darkbiz_acb_top_bar( $control ){
		$value = $control->manager->get_setting( Darkbiz_Helper::with_prefix( 'show-top-bar' ) )->value();
		return $value;
	}
endif;

/**
* Active callback function of header top bar
*
* @return boolen
* @since 1.0.0
*
* @package Bizline Child theme
*/
if( !function_exists( 'darkbiz_acb_header_icon' ) ):
	function darkbiz_acb_header_icon( $control ){
		$enable =  $control->manager->get_setting( Darkbiz_Helper::with_prefix( 'show-top-bar' ) )->value();
		$value = $control->manager->get_setting( Darkbiz_Helper::with_prefix( 'header-social-menu' ) )->value();
		return $value && $enable;
	}
endif;

/**
* Register Top bar Options
*
* @return void
* @since 1.0.1
*
* @package Darkbiz WordPress Theme
*/
function Darkbiz_Child_topbar_options(){
	Darkbiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Top Bar
		'section' => array(
		    'id'    => 'top-bar',
		    'title' => esc_html__( 'Top Bar', 'darkbiz-child' ),
		    'priority'    => 0,
		),
		'fields' => array(
			array(
				'id'	=> 'show-top-bar',
				'label' => esc_html__( 'Enable', 'darkbiz-child' ),
				'default' => true,
 				'type'  => 'darkbiz-toggle'
			),
			array(
				'id'	=> 'location',
				'label' => esc_html__( 'Location', 'darkbiz-child' ),
				'default' => esc_html( '112 W 34th St, New York' ),
				'type'  => 'text',
				'partial' =>array(
					'selector' => 'span#enhanced-location',
				),
				'active_callback' =>'acb_top_bar',
			),
			array(
				'id'	=> 'phone-num',
				'label' => esc_html__( 'Phone Number', 'darkbiz-child' ),
				'default' => esc_html( ' +123455678' ),
				'type'  => 'text',
				'partial' =>array(
					'selector' => 'span#enhanced-phone',
				),
				'active_callback' =>'acb_top_bar',
			),
			array(
				'id'	=> 'email',
				'label' => esc_html__( 'Email', 'darkbiz-child' ),
				'default' => esc_html( 'info@yourdomain.com' ),
				'type'  => 'email',
				'partial' =>array(
					'selector' => 'span#enhanced-email',
				),
				'active_callback' =>'acb_top_bar',
			),
			array(
				'id'      => 'topbar-bg-color',
				'label'   => esc_html__( 'Background Color', 'darkbiz-child' ),
				'default' => '#333333',
				'type'    => 'darkbiz-color-picker',
				'active_callback' => 'acb_top_bar',
			),
			array(
				'id'      => 'topbar-text-color',
				'label'   => esc_html__( 'Text Color', 'darkbiz-child' ),
				'default' => '#ffffff',
				'type'    => 'darkbiz-color-picker',
				'active_callback' => 'acb_top_bar',
			)
		)
	));
}
add_action( 'init', 'Darkbiz_Child_topbar_options' );