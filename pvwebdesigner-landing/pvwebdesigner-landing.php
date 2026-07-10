<?php
/**
 * Plugin Name: PV Web Designer - Landing Page
 * Plugin URI: https://pvwebdesigner.com.br
 * Description: Landing page completa para captação de leads da PV Web Designer (sites, sistemas e automações), com design dark/glass inspirado em portfólios de desenvolvedor. Exibida automaticamente em tela cheia na página inicial do site (configurável em Ajustes > PVWD Landing); também disponível via shortcode [pvwebdesigner_landing] ou template de página "PV Web Designer - Landing". Os cases do portfólio são gerenciados em Cases (Portfólio), no menu do admin.
 * Version: 1.3.0
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Author: PV Web Designer
 * Text Domain: pvwebdesigner-landing
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PVWD_VERSION', '1.3.0' );
define( 'PVWD_PATH', plugin_dir_path( __FILE__ ) );
define( 'PVWD_URL', plugin_dir_url( __FILE__ ) );

require_once PVWD_PATH . 'includes/class-pvwd-settings.php';
require_once PVWD_PATH . 'includes/class-pvwd-cases.php';
require_once PVWD_PATH . 'includes/class-pvwd-shortcode.php';
require_once PVWD_PATH . 'includes/class-pvwd-template.php';

final class PVWD_Plugin {

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		new PVWD_Settings();
		new PVWD_Cases();
		new PVWD_Shortcode();
		new PVWD_Template();

		register_activation_hook( __FILE__, array( $this, 'activate' ) );
	}

	public function activate() {
		if ( false === get_option( 'pvwd_settings' ) ) {
			add_option( 'pvwd_settings', PVWD_Settings::get_defaults() );
		}
		flush_rewrite_rules();
	}
}

PVWD_Plugin::instance();
