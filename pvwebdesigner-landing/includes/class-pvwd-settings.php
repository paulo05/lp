<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PVWD_Settings {

	const OPTION_KEY = 'pvwd_settings';
	const PAGE_SLUG  = 'pvwd-landing-settings';

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	public static function get_defaults() {
		return array(
			'auto_homepage'    => '1',
			'brand_name'       => 'pvwebdesigner',
			'whatsapp_number'  => '5500000000000',
			'whatsapp_message' => 'Olá! Vim pelo site e quero entender como um site, sistema ou automação pode ajudar meu negócio.',
			'stat_projects'    => '+20 projetos entregues para negócios de diferentes áreas',
			'stat_systems'     => 'Sistemas em produção rodando hoje, atendendo clientes reais',
		);
	}

	public static function get( $key = null ) {
		$settings = wp_parse_args( get_option( self::OPTION_KEY, array() ), self::get_defaults() );
		if ( null === $key ) {
			return $settings;
		}
		return isset( $settings[ $key ] ) ? $settings[ $key ] : '';
	}

	public function add_settings_page() {
		add_options_page(
			'PV Web Designer - Landing',
			'PVWD Landing',
			'manage_options',
			self::PAGE_SLUG,
			array( $this, 'render_settings_page' )
		);
	}

	public function register_settings() {
		register_setting( 'pvwd_settings_group', self::OPTION_KEY, array( $this, 'sanitize' ) );
	}

	public function sanitize( $input ) {
		$defaults = self::get_defaults();
		$output   = array();

		foreach ( $defaults as $key => $default ) {
			if ( ! isset( $input[ $key ] ) ) {
				$output[ $key ] = '';
				continue;
			}
			if ( 'whatsapp_message' === $key ) {
				$output[ $key ] = sanitize_textarea_field( $input[ $key ] );
			} elseif ( 'whatsapp_number' === $key ) {
				$output[ $key ] = preg_replace( '/[^0-9]/', '', $input[ $key ] );
			} else {
				$output[ $key ] = sanitize_text_field( $input[ $key ] );
			}
		}

		return $output;
	}

	public function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$s = self::get();
		?>
		<div class="wrap">
			<h1>PV Web Designer - Landing Page</h1>
			<p>Por padrão, a landing page é exibida automaticamente em tela cheia na página inicial do site, sem precisar de shortcode nem de configurar nada. Desligue a opção abaixo se preferir usar o shortcode <code>[pvwebdesigner_landing]</code> em uma página específica, ou o template "PV Web Designer - Landing" nos Atributos da Página.</p>
			<form method="post" action="options.php">
				<?php settings_fields( 'pvwd_settings_group' ); ?>
				<table class="form-table" role="presentation">
					<tr>
						<th scope="row">Página inicial automática</th>
						<td>
							<label>
								<input type="checkbox" name="pvwd_settings[auto_homepage]" value="1" <?php checked( '1', $s['auto_homepage'] ); ?> />
								Exibir esta landing page automaticamente, em tela cheia, como página inicial do site
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="brand_name">Nome da marca</label></th>
						<td><input type="text" id="brand_name" name="pvwd_settings[brand_name]" value="<?php echo esc_attr( $s['brand_name'] ); ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="whatsapp_number">Número do WhatsApp</label></th>
						<td>
							<input type="text" id="whatsapp_number" name="pvwd_settings[whatsapp_number]" value="<?php echo esc_attr( $s['whatsapp_number'] ); ?>" class="regular-text" placeholder="5511999999999" />
							<p class="description">Apenas números, com código do país e DDD. Ex: 5511999999999</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="whatsapp_message">Mensagem padrão</label></th>
						<td><textarea id="whatsapp_message" name="pvwd_settings[whatsapp_message]" rows="3" class="large-text"><?php echo esc_textarea( $s['whatsapp_message'] ); ?></textarea></td>
					</tr>
					<tr>
						<th scope="row"><label for="stat_projects">Estatística 1 (prova social)</label></th>
						<td><input type="text" id="stat_projects" name="pvwd_settings[stat_projects]" value="<?php echo esc_attr( $s['stat_projects'] ); ?>" class="large-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="stat_systems">Estatística 2 (prova social)</label></th>
						<td><input type="text" id="stat_systems" name="pvwd_settings[stat_systems]" value="<?php echo esc_attr( $s['stat_systems'] ); ?>" class="large-text" /></td>
					</tr>
				</table>
				<?php submit_button( 'Salvar configurações' ); ?>
			</form>

			<hr />
			<h2>Portfólio (bloco "Por que confiar")</h2>
			<p>Os cases exibidos na landing agora são gerenciados como posts: cada case tem uma imagem (destacada), um título e um resumo (excerto), e pode ser adicionado, editado ou apagado a qualquer momento.</p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=' . PVWD_Cases::POST_TYPE ) ); ?>" class="button button-primary">Gerenciar cases</a>
				<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=' . PVWD_Cases::POST_TYPE ) ); ?>" class="button">Adicionar novo case</a>
			</p>
		</div>
		<?php
	}

	public static function whatsapp_link( $context = '' ) {
		$s       = self::get();
		$number  = $s['whatsapp_number'];
		$message = $s['whatsapp_message'];
		if ( $context ) {
			$message .= ' (' . $context . ')';
		}
		return 'https://wa.me/' . rawurlencode( $number ) . '?text=' . rawurlencode( $message );
	}
}
