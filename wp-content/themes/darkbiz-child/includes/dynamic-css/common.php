<?php
  /**
  * Register dynamic css
  *
  * @since 1.0.0
  *
  * @package Darkbiz Child
  */
function darkbiz_child_common_css(){
 	$style = array(
 		array(
 			'selector' => 'body',
 			'props' => array(
 				'background' => array(
 					'customizer' => false,
 					'value'		=> '#' . get_theme_mod( 'background_color' ,'#0a0a0a' ),
 					'unit' => ' !important'
 				)
 			)
 		),
 		array(
			'selector' => '.darkbiz-top-bar',
			'props' => array(
				'background' => 'topbar-bg-color'
			)
		),
 		array(
			'selector' => '.darkbiz-top-bar-info, .darkbiz-top-bar-info a',
			'props' => array(
				'color' => 'topbar-text-color'
			)
		),
 	);
 	Darkbiz_Css::add_styles( $style, 'md' );
 }
 add_action( 'init', 'darkbiz_child_common_css' );