<?php
/**
 * Plugin Name: DX Out of Date
 * Description: Display a notice above each post of yours that has been published a while ago and might be outdated.
 * 
 */

class DX_Out_Of_Date {
	
	public function __construct() {
		add_action( 'admin_init', array( $this, 'register_settings' ), 3 );
		add_action( 'init', array( $this, 'load_files' ) );
		// register admin pages for the plugin
		add_action( 'admin_menu', array( $this, 'register_admin_page' ) );
		add_action( 'template_redirect', array( $this, 'top_content_filter' ) );
	}
	
	public function top_content_filter() {
		if( 1 == 1 && is_single() ) {
			add_filter( 'the_content', array( $this, 'top_content_filter_callback' ) );
		}
	}
	
	public function top_content_filter_callback( $content ) {
		$box = '';
		
		$box .= '<div>' . get_the_date() . '</div>';
		
		return $box . $content;
	}
	
	public function load_files() {
		
	}
	
	public function register_settings() {
		include_once 'dx-ood-settings.php';

		new DX_OOD_Settings();
	}
	
	/**
	 * Admin pages
	 */
	public function register_admin_page() {
		add_submenu_page( 'options-general.php', __( "Out of Date", 'dxbase' ), __( "Out of Date", 'dxbase' ),
		 'manage_options', 'dx-ood', array( $this, 'register_admin_page_callback' ) );
	}
	
	public function register_admin_page_callback() {
		include_once 'dx-ood-admin.php';
	}
	
	/**
	 * Notifying box content generator
	 */
	public function old_post_box() {
		
	}
}

new DX_Out_Of_Date();