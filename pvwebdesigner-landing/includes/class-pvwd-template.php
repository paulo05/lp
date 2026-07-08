<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers a full-bleed page template (no theme header/footer) so the
 * landing page can be used as a true standalone landing page.
 */
class PVWD_Template {

	const SLUG = 'pvwd-landing-template';

	public function __construct() {
		add_filter( 'theme_page_templates', array( $this, 'register_template' ) );
		add_filter( 'template_include', array( $this, 'load_template' ) );
	}

	public function register_template( $templates ) {
		$templates[ self::SLUG ] = 'PV Web Designer - Landing';
		return $templates;
	}

	public function load_template( $template ) {
		if ( is_page() && self::SLUG === get_page_template_slug() ) {
			$custom = PVWD_PATH . 'templates/landing-page.php';
			if ( file_exists( $custom ) ) {
				return $custom;
			}
		}
		return $template;
	}
}
