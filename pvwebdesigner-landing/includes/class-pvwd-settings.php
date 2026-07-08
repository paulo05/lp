<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PVWD_Settings {

	const OPTION_KEY = 'pvwd_settings';

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	public static function get_defaults() {
		return array(
			'brand_name'        => 'pvwebdesigner',
			'whatsapp_number'   => '5500000000000',
			'whatsapp_message'  => 'Olá! Vim pelo site e quero entender como um site, sistema ou automação pode ajudar meu negócio.',
			'stat_projects'     => '+20 projetos entregues para negócios de diferentes áreas',
			'stat_systems'      => 'Sistemas em produção rodando hoje, atendendo clientes reais',
			'case1_title'       => 'Biblioteca Virtual (GORN)',
			'case1_desc'        => 'Sistema web para organização e consulta de acervo, feito sob medida.',
			'case2_title'       => 'Clínica Sorridente',
			'case2_desc'        => 'Site institucional focado em credibilidade e conversão de agendamentos.',
			'case3_title'       => 'Automações N8N',
			'case3_desc'        => 'Fluxos de follow-up e integração entre sistemas, sem esforço manual.',
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
			'pvwd-landing-settings',
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
			<p>Configure o WhatsApp e os números de prova social exibidos na landing page. Use o shortcode <code>[pvwebdesigner_landing]</code> em qualquer página, ou escolha o template "PV Web Designer - Landing" nos Atributos da Página.</p>
			<form method="post" action="options.php">
				<?php settings_fields( 'pvwd_settings_group' ); ?>
				<table class="form-table" role="presentation">
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
					<tr>
						<th scope="row"><label for="case1_title">Case 1 - título</label></th>
						<td><input type="text" id="case1_title" name="pvwd_settings[case1_title]" value="<?php echo esc_attr( $s['case1_title'] ); ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="case1_desc">Case 1 - descrição</label></th>
						<td><input type="text" id="case1_desc" name="pvwd_settings[case1_desc]" value="<?php echo esc_attr( $s['case1_desc'] ); ?>" class="large-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="case2_title">Case 2 - título</label></th>
						<td><input type="text" id="case2_title" name="pvwd_settings[case2_title]" value="<?php echo esc_attr( $s['case2_title'] ); ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="case2_desc">Case 2 - descrição</label></th>
						<td><input type="text" id="case2_desc" name="pvwd_settings[case2_desc]" value="<?php echo esc_attr( $s['case2_desc'] ); ?>" class="large-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="case3_title">Case 3 - título</label></th>
						<td><input type="text" id="case3_title" name="pvwd_settings[case3_title]" value="<?php echo esc_attr( $s['case3_title'] ); ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="case3_desc">Case 3 - descrição</label></th>
						<td><input type="text" id="case3_desc" name="pvwd_settings[case3_desc]" value="<?php echo esc_attr( $s['case3_desc'] ); ?>" class="large-text" /></td>
					</tr>
				</table>
				<?php submit_button( 'Salvar configurações' ); ?>
			</form>
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
