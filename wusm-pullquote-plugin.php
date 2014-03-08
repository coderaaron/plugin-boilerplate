<?php
/*
Plugin Name: Plugin Boilerplate
Plugin URI: 
Description: Aaron's Plugin Boilerplate
Author: Aaron Graham
Version: 00.00.00.0
Author URI: 
*/

add_action( 'init', 'github_plugin_updater_plugin_boilerplate_init' );
function github_plugin_updater_plugin_boilerplate_init() {

		if( ! class_exists( 'WP_GitHub_Updater' ) )
			include_once 'updater.php';

		if( ! defined( 'WP_GITHUB_FORCE_UPDATE' ) )
			define( 'WP_GITHUB_FORCE_UPDATE', true );

		if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

				$config = array(
						'slug' => plugin_basename( __FILE__ ),
						'proper_folder_name' => 'plugin-boilerplate',
						'api_url' => 'https://api.github.com/repos/coderaaron/plugin-boilerplate',
						'raw_url' => 'https://raw.github.com/coderaaron/plugin-boilerplate/master',
						'github_url' => 'https://github.com/coderaaron/plugin-boilerplate',
						'zip_url' => 'https://github.com/coderaaron/plugin-boilerplate/archive/master.zip',
						'sslverify' => true,
						'requires' => '3.0',
						'tested' => '3.8',
						'readme' => 'README.md',
						'access_token' => '',
				);

				new WP_GitHub_Updater( $config );
		}

}

class plugin_boilerplate_plugin {
	private $pullquote_text;

	/**
	 *
	 */
	public function __construct() {
		wp_register_style( 'plugin-styles', plugins_url('css/plugin.css', __FILE__) );
		wp_enqueue_style( 'plugin-styles' );
		add_action( 'init', array( $this, 'plugin_function' ) );
	}

	public function plugin_function( $atts, $content = null ) {
		return false;
	}
}
new plugin_boilerplate_plugin();