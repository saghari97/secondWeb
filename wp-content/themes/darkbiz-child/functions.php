<?php
/**
 * Darkbiz Child functions and definitions
 * Darkbiz Child only works in WordPress 4.7 or later.
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 * @package Darkbiz Child
 */
final class Darkbiz_Child_Theme{
	public function __construct(){
		# enqueue script
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'scripts' ) );

		#change section name
		add_filter( 'bizsmart_customizer_get_panel_arg', array( __CLASS__, 'change_pannel_title' ), 20, 2 );

		# add dark mode option
		add_action( 'after_setup_theme', array( __CLASS__, 'after_parent_theme' ) );

		# adds class on body to customize blog layouts
		add_filter( 'body_class' , array( __CLASS__ , 'add_body_classes' ) );

		# Register or modify customizer options
		add_action( 'customize_register', array( __CLASS__, 'customize_register' ), 99 );

		# register nav bars
		add_action( 'after_setup_theme', array( __CLASS__ , 'nav_menu' ) );
	}

	/**
	* Register or modify customizer options
	*
	* @static
	* @access public
	* @since  1.0.0
	* @return void
	*
	* @package Darkbiz Child
	*/
	public static function customize_register( $wp_customize ){
		$wp_customize->get_setting( 'background_color' )->default = '#0a0a0a';	
	}

	/**
	* Enqueue styles and scripts
	*
	* @static
	* @access public
	* @since  1.0.0
	*
	* @package Darkbiz Child
	*/
	public static function scripts(){
		$scripts = array(
			# enqueue parent stylesheet
			array(
				'handler'  => 'smartfund',
				'style'    => get_template_directory_uri() . '/style.css',
				'version'  => wp_get_theme()->get('Version'),
				'absolute' => true,
				'minified' => false
			)
		);
		Darkbiz_Helper::enqueue( $scripts );
	}

	/**
	 * Changed panel title
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Darkbiz Child
	 */
	public static function change_pannel_title( $args, $panel ){
		if( $panel[ 'id' ] == 'panel' ){
			$panel[ 'title' ] = esc_html__( 'Darkbiz Child Options', 'smartfund' );
		}
		return $panel;
	}

	/**
	 * adds class on body to customize blog layouts
	 *
	 * @static
	 * @access public
	 * @return object
	 * @since  1.0.0
	 *
	 * @package Darkbiz Child
	 */
	public static function add_body_classes( $classes ){
		$post_per_row = darkbiz_get( 'post-per-row' );
		if( '1' == $post_per_row ){
			$classes[] = 'darkbiz-post-per-row-1';
		}
		return $classes;
	}

	/**
	 * After parent theme
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Darkbiz Child
	 */
	public static function after_parent_theme(){
		# remove post options
		remove_action( 'init', 'darkbiz_post_options' );

		# include options file
		Darkbiz_Helper::include( array(
			'topbar',
			'post-options'
		), 'includes/theme-options', '');

		# include dynamic css
		Darkbiz_Helper::include( array(
			'common'
		), 'includes/dynamic-css', '');

		# header topbar
		add_action( Darkbiz_Helper::fn_prefix( 'header' ), array( __CLASS__, 'header_top_bar' ), 0 );

		# filter to modify priority
		add_filter( Darkbiz_Helper::with_prefix( 'customizer_get_defaults','_' ), array( __CLASS__ , 'change_defaults' ), 99 ,2 );

		#filter to change default on admin
		add_filter( Darkbiz_Helper::fn_prefix( 'customizer_get_setting_arg' ), array( __CLASS__, 'change_default_admmin' ), 10, 2 );

	}

	/**
	 * print header topbar
	 *
	 * @static
	 * @since 1.0.1
	 *
	 * @package Darkbiz Child
	 */
	public static function header_top_bar(){
		if( !darkbiz_get( 'show-top-bar' ) ){
			return;
		}
		get_template_part( 'templates/header/header', 'topbar' );
	}

	/**
	 * Change default value on admin
	 *
	 * @static
	 * @access public
	 * @since  1.0.1
	 *
	 * @package Darkbiz Child
	 */	
	public static function change_default_admmin( $args, $field ){
		if( $field[ 'id' ] == Darkbiz_Helper::with_prefix( 'footer-copyright-text' ) ){
			$args[ 'default' ] = esc_html__( 'Copyright &copy; 2020 | Darkbiz Child', 'smartfund' );
		}

		if( $field[ 'id' ] == Darkbiz_Helper::with_prefix( 'primary-menu-item-color' ) ){
			$args[ 'default' ] = '#c1c1c1';
		}

		if( $field[ 'id' ] == Darkbiz_Helper::with_prefix( 'primary-color' ) ){
			$args[ 'default' ] = '#dd9933';
		}

		if( $field[ 'id' ] == Darkbiz_Helper::with_prefix( 'site-info-font' ) ){
			$args[ 'default' ] = 'font-4';
		}

		if( $field[ 'id' ] == Darkbiz_Helper::with_prefix( 'heading-font' ) ){
			$args[ 'default' ] = 'font-4';
		}

		if( $field[ 'id' ] == Darkbiz_Helper::with_prefix( 'body-font' ) ){
			$args[ 'default' ] = 'font-5';
		}

		return $args;
	}

	/**
	 * Change default value
	 *
	 * @static
	 * @access public
	 * @since  1.0.0
	 *
	 * @package Darkbiz Child
	 */	
	public static function change_defaults( $def, $instance ){
		$id = Darkbiz_Helper::with_prefix( 'footer-copyright-text' );
		$menu_color = Darkbiz_Helper::with_prefix( 'primary-menu-item-color' );
		$primary_color = Darkbiz_Helper::with_prefix( 'primary-color' );
		$site_identity = Darkbiz_Helper::with_prefix( 'site-info-font' );
		$body = Darkbiz_Helper::with_prefix( 'body-font' );
		$heading = Darkbiz_Helper::with_prefix( 'heading-font' );

		$def[ $id ] = esc_html__( 'Copyright &copy; 2020 | Darkbiz Child', 'smartfund' );
		$def[ $menu_color ] = '#c1c1c1';
		$def[ $primary_color ] = '#dd9933';
		$def[ $site_identity ] = 'font-4';
		$def[ $body ] = 'font-5';
		$def[ $heading ] = 'font-4';
		return $def;
	}

	/**
	 * checks top bar has content or not
	 *
	 * @static
	 * @since 1.0.0
	 * @return bool
	 *
	 * @package Darkbiz Child
	 */
	public static function topbar_has_content(){
		return( 
			darkbiz_get( 'location' ) ||
			darkbiz_get( 'phone-num' ) ||
			darkbiz_get( 'email' )
		);
	}

	/**
	 * Get class for post per row
	 *
	 * @static
	 * @access public
	 * @since 1.0.16
	 * @return string
	 *
	 * @package Darkbiz Child
	 */
	public static function the_post_per_row_class( $class = '' ){
		$post_per_row = darkbiz_get( 'post-per-row' );
		if( '1' == $post_per_row ){
			$class = 'col-md-12';
		}elseif( '2' == $post_per_row ){
			$class = 'col-12 col-sm-6';
		}elseif( '3' == $post_per_row ){
			$class = 'col-12 col-sm-4';
		}elseif( '4' == $post_per_row ){
			$class = 'col-12 col-sm-3';
		}

		echo esc_attr( $class );
	}

	/**
	 * Register navigation bar
	 *
	 * @static
	 * @access public
	 * @return object
	 * @since  1.0.0
	 *
	 * @package Darkbiz WordPress Theme
	 */
	public static function nav_menu(){
		register_nav_menus(
			array(
				'footer-menu' => esc_html__( 'Footer Menu', 'darkbiz' )
			)
		);
	}
}

new Darkbiz_Child_Theme();