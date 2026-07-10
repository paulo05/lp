<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PVWD_Shortcode {

	public function __construct() {
		add_shortcode( 'pvwebdesigner_landing', array( $this, 'render' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'maybe_enqueue_assets' ) );
	}

	public function maybe_enqueue_assets() {
		global $post;
		$has_shortcode    = is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'pvwebdesigner_landing' );
		$is_pvwd_template = function_exists( 'is_page' ) && is_page() && 'pvwd-landing-template' === get_page_template_slug();
		$is_auto_home     = PVWD_Template::is_auto_homepage();

		if ( $has_shortcode || $is_pvwd_template || $is_auto_home ) {
			$this->enqueue_assets();
		}
	}

	public function enqueue_assets() {
		wp_enqueue_style(
			'pvwd-landing-fonts',
			'https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap',
			array(),
			null
		);
		wp_enqueue_style( 'pvwd-landing', PVWD_URL . 'assets/css/landing.css', array(), PVWD_VERSION );
		wp_enqueue_script( 'pvwd-landing', PVWD_URL . 'assets/js/landing.js', array(), PVWD_VERSION, true );
	}

	public function render( $atts = array() ) {
		$this->enqueue_assets();
		ob_start();
		include PVWD_PATH . 'templates/landing-content.php';
		return ob_get_clean();
	}
}
