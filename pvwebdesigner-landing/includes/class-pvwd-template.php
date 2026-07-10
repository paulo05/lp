<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers a full-bleed page template (no theme header/footer) so the
 * landing page can be used as a true standalone landing page, and —
 * by default — automatically serves it on the site's front page without
 * requiring a shortcode or manual template selection.
 */
class PVWD_Template {

	const SLUG = 'pvwd-landing-template';

	public function __construct() {
		add_filter( 'theme_page_templates', array( $this, 'register_template' ) );
		add_filter( 'template_include', array( $this, 'load_template' ), 999 );
	}

	public function register_template( $templates ) {
		$templates[ self::SLUG ] = 'PV Web Designer - Landing';
		return $templates;
	}

	public static function is_auto_homepage() {
		return is_front_page() && '1' === PVWD_Settings::get( 'auto_homepage' );
	}

	public function load_template( $template ) {
		$custom = PVWD_PATH . 'templates/landing-page.php';

		if ( ! file_exists( $custom ) ) {
			return $template;
		}

		if ( is_page() && self::SLUG === get_page_template_slug() ) {
			return $custom;
		}

		if ( self::is_auto_homepage() ) {
			return $custom;
		}

		return $template;
	}
}
