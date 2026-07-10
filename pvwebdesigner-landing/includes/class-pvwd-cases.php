<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom post type used to let the user register/remove portfolio cases
 * (image, title and summary) from the WordPress admin, like regular posts.
 */
class PVWD_Cases {

	const POST_TYPE  = 'pvwd_case';
	const META_URL   = '_pvwd_case_url';
	const MIGRATE_KEY = 'pvwd_cases_migrated';

	public function __construct() {
		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'init', array( $this, 'maybe_seed_cases' ), 20 );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( $this, 'save_meta_box' ) );
	}

	public function register_post_type() {
		register_post_type(
			self::POST_TYPE,
			array(
				'labels'              => array(
					'name'               => 'Cases',
					'singular_name'      => 'Case',
					'add_new'            => 'Adicionar case',
					'add_new_item'       => 'Adicionar novo case',
					'edit_item'          => 'Editar case',
					'new_item'           => 'Novo case',
					'view_item'          => 'Ver case',
					'search_items'       => 'Buscar cases',
					'not_found'          => 'Nenhum case cadastrado ainda.',
					'not_found_in_trash' => 'Nenhum case na lixeira.',
					'featured_image'     => 'Imagem do case',
					'set_featured_image' => 'Definir imagem do case',
					'remove_featured_image' => 'Remover imagem do case',
					'menu_name'          => 'Cases (Portfólio)',
				),
				'public'               => false,
				'publicly_queryable'   => false,
				'exclude_from_search'  => true,
				'show_ui'              => true,
				'show_in_menu'         => true,
				'show_in_rest'         => true,
				'menu_icon'            => 'dashicons-portfolio',
				'menu_position'        => 26,
				'has_archive'          => false,
				'rewrite'              => false,
				'capability_type'      => 'post',
				'supports'             => array( 'title', 'excerpt', 'thumbnail', 'page-attributes' ),
			)
		);
	}

	public function add_meta_box() {
		add_meta_box(
			'pvwd_case_details',
			'Detalhes do case',
			array( $this, 'render_meta_box' ),
			self::POST_TYPE,
			'side',
			'default'
		);
	}

	public function render_meta_box( $post ) {
		wp_nonce_field( 'pvwd_case_save', 'pvwd_case_nonce' );
		$url = get_post_meta( $post->ID, self::META_URL, true );
		?>
		<p>
			<label for="pvwd_case_url"><strong>Link do site (opcional)</strong></label><br />
			<input type="url" id="pvwd_case_url" name="pvwd_case_url" value="<?php echo esc_attr( $url ); ?>" class="widefat" placeholder="https://" />
			<span class="description">Se preenchido, o card do case na landing vira um link clicável.</span>
		</p>
		<p class="description">Use "Imagem destacada" para o print/logo, o título do post como nome do site/projeto, e o campo "Resumo" (Excerpt) para a descrição curta exibida no card.</p>
		<?php
	}

	public function save_meta_box( $post_id ) {
		if ( ! isset( $_POST['pvwd_case_nonce'] ) || ! wp_verify_nonce( $_POST['pvwd_case_nonce'], 'pvwd_case_save' ) ) {
			return;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['pvwd_case_url'] ) ) {
			update_post_meta( $post_id, self::META_URL, esc_url_raw( trim( $_POST['pvwd_case_url'] ) ) );
		}
	}

	/**
	 * One-time seed so the section isn't empty on first activation, and so
	 * cases previously stored as case1/case2/case3 in the plugin settings
	 * (versions <= 1.2.0) aren't lost when upgrading to the Cases CPT.
	 */
	public function maybe_seed_cases() {
		if ( get_option( self::MIGRATE_KEY ) ) {
			return;
		}

		$old = get_option( PVWD_Settings::OPTION_KEY, array() );
		if ( ! is_array( $old ) ) {
			$old = array();
		}

		$fallback = array(
			array(
				'title' => 'Biblioteca Virtual (GORN)',
				'desc'  => 'Sistema web para organização e consulta de acervo, feito sob medida.',
			),
			array(
				'title' => 'Clínica Sorridente',
				'desc'  => 'Site institucional focado em credibilidade e conversão de agendamentos.',
			),
			array(
				'title' => 'Automações N8N',
				'desc'  => 'Fluxos de follow-up e integração entre sistemas, sem esforço manual.',
			),
		);

		for ( $i = 1; $i <= 3; $i++ ) {
			$title = isset( $old[ "case{$i}_title" ] ) ? $old[ "case{$i}_title" ] : $fallback[ $i - 1 ]['title'];
			$desc  = isset( $old[ "case{$i}_desc" ] ) ? $old[ "case{$i}_desc" ] : $fallback[ $i - 1 ]['desc'];
			$image = isset( $old[ "case{$i}_image" ] ) ? $old[ "case{$i}_image" ] : '';
			$url   = isset( $old[ "case{$i}_url" ] ) ? $old[ "case{$i}_url" ] : '';

			if ( empty( $title ) && empty( $desc ) ) {
				continue;
			}

			$post_id = wp_insert_post(
				array(
					'post_type'    => self::POST_TYPE,
					'post_title'   => $title,
					'post_excerpt' => $desc,
					'post_status'  => 'publish',
					'menu_order'   => $i,
				)
			);

			if ( is_wp_error( $post_id ) || ! $post_id ) {
				continue;
			}

			if ( $url ) {
				update_post_meta( $post_id, self::META_URL, esc_url_raw( $url ) );
			}

			if ( $image ) {
				$attachment_id = attachment_url_to_postid( $image );
				if ( $attachment_id ) {
					set_post_thumbnail( $post_id, $attachment_id );
				}
			}
		}

		update_option( self::MIGRATE_KEY, 1 );
	}

	/**
	 * Returns the published cases ready for the front-end template.
	 */
	public static function get_cases() {
		$query = new WP_Query(
			array(
				'post_type'      => self::POST_TYPE,
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
				'no_found_rows'  => true,
			)
		);

		$cases = array();

		foreach ( $query->posts as $post ) {
			$cases[] = array(
				'id'      => $post->ID,
				'title'   => get_the_title( $post ),
				'summary' => get_the_excerpt( $post ),
				'image'   => get_the_post_thumbnail_url( $post, 'medium' ),
				'url'     => get_post_meta( $post->ID, self::META_URL, true ),
			);
		}

		wp_reset_postdata();

		return $cases;
	}
}
