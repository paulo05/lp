<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$s = PVWD_Settings::get();

$wa_hero    = PVWD_Settings::whatsapp_link( 'Hero' );
$wa_nav     = PVWD_Settings::whatsapp_link( 'Menu' );
$wa_final   = PVWD_Settings::whatsapp_link( 'CTA final' );
$wa_float   = PVWD_Settings::whatsapp_link( 'Botao flutuante' );

$whatsapp_icon = '<svg viewBox="0 0 32 32" fill="currentColor" aria-hidden="true"><path d="M16.001 3C9.096 3 3.5 8.596 3.5 15.5c0 2.31.633 4.474 1.735 6.328L3 29l7.36-2.192a12.44 12.44 0 0 0 5.64 1.36h.001c6.905 0 12.5-5.596 12.5-12.5S22.906 3 16.001 3zm0 22.7a10.17 10.17 0 0 1-5.19-1.424l-.372-.221-4.37 1.301 1.322-4.259-.242-.39A10.14 10.14 0 0 1 5.8 15.5c0-5.628 4.573-10.2 10.201-10.2 5.627 0 10.2 4.572 10.2 10.2 0 5.628-4.573 10.2-10.2 10.2zm5.593-7.64c-.307-.153-1.812-.894-2.093-.996-.281-.102-.485-.153-.69.154-.204.306-.792.995-.97 1.2-.178.204-.357.23-.663.076-.307-.153-1.296-.478-2.469-1.523-.913-.814-1.529-1.82-1.708-2.127-.178-.306-.019-.472.134-.624.138-.137.307-.357.46-.536.153-.178.204-.306.307-.51.102-.205.05-.383-.026-.536-.077-.153-.69-1.663-.945-2.279-.249-.598-.502-.517-.69-.526l-.588-.01a1.13 1.13 0 0 0-.817.383c-.281.306-1.073 1.05-1.073 2.56 0 1.51 1.098 2.97 1.251 3.174.153.204 2.16 3.298 5.234 4.625.731.316 1.301.505 1.746.646.734.234 1.402.2 1.93.121.589-.088 1.812-.74 2.068-1.455.255-.714.255-1.326.178-1.455-.076-.128-.28-.204-.587-.357z"/></svg>';
?>
<div class="pvwd-root">

	<!-- Barra fixa flutuante do WhatsApp -->
	<a href="<?php echo esc_url( $wa_float ); ?>" class="pvwd-float-wa" target="_blank" rel="noopener noreferrer" aria-label="Falar no WhatsApp">
		<?php echo $whatsapp_icon; ?>
	</a>

	<!-- HEADER -->
	<header class="pvwd-header">
		<div class="pvwd-container pvwd-header-inner">
			<a href="#topo" class="pvwd-logo"><?php echo esc_html( $s['brand_name'] ); ?><span class="pvwd-dot">.</span></a>
			<nav class="pvwd-nav">
				<a href="#servicos">Serviços</a>
				<a href="#como-funciona">Como funciona</a>
				<a href="#faq">Dúvidas</a>
			</nav>
			<a href="<?php echo esc_url( $wa_nav ); ?>" class="pvwd-btn pvwd-btn-sm" target="_blank" rel="noopener noreferrer">
				<?php echo $whatsapp_icon; ?>
				<span>WhatsApp</span>
			</a>
		</div>
	</header>

	<main id="topo">

		<!-- 1. HERO -->
		<section class="pvwd-hero">
			<div class="pvwd-glow pvwd-glow-1" aria-hidden="true"></div>
			<div class="pvwd-glow pvwd-glow-2" aria-hidden="true"></div>
			<div class="pvwd-container pvwd-hero-inner pvwd-reveal">
				<span class="pvwd-badge">Sites · Sistemas · Automações</span>
				<h1 class="pvwd-hero-title">Seu negócio já está pronto pra vender online. <span class="pvwd-gradient-text">Falta só a estrutura certa.</span></h1>
				<p class="pvwd-hero-sub">Sites, sistemas e automações sob medida para pequenos negócios que querem parar de perder tempo e cliente por falta de uma presença digital profissional.</p>
				<div class="pvwd-hero-cta">
					<a href="<?php echo esc_url( $wa_hero ); ?>" class="pvwd-btn pvwd-btn-lg" target="_blank" rel="noopener noreferrer">
						<?php echo $whatsapp_icon; ?>
						<span>Falar com um especialista no WhatsApp</span>
					</a>
					<p class="pvwd-microtext">Resposta em poucas horas, sem compromisso</p>
				</div>
			</div>
		</section>

		<!-- 2. PREMISSAS -->
		<section class="pvwd-section">
			<div class="pvwd-container pvwd-reveal">
				<p class="pvwd-kicker">Isso é pra você?</p>
				<h2 class="pvwd-h2">Se você se identifica com pelo menos uma dessas situações, essa página foi feita pra você:</h2>

				<div class="pvwd-premises">
					<div class="pvwd-premise-card">
						<span class="pvwd-check">✕</span>
						<p>Você responde os mesmos clientes, no WhatsApp, todos os dias, sempre com as mesmas informações.</p>
					</div>
					<div class="pvwd-premise-card">
						<span class="pvwd-check">✕</span>
						<p>Seu site (quando existe) foi feito há anos, não passa confiança e ninguém mexe nele.</p>
					</div>
					<div class="pvwd-premise-card">
						<span class="pvwd-check">✕</span>
						<p>Você já perdeu uma venda porque o cliente não te achou no Google ou achou primeiro o concorrente.</p>
					</div>
					<div class="pvwd-premise-card">
						<span class="pvwd-check">✕</span>
						<p>Você sabe que automatizar tarefas economizaria seu tempo, mas nunca teve quem fizesse isso de forma simples.</p>
					</div>
				</div>

				<p class="pvwd-premise-close">Nenhuma dessas situações é sobre falta de esforço. É sobre <strong>falta de estrutura</strong>. E estrutura é exatamente o que a gente constrói.</p>
			</div>
		</section>

		<!-- 3. O QUE FAZEMOS -->
		<section class="pvwd-section pvwd-section-alt" id="servicos">
			<div class="pvwd-container pvwd-reveal">
				<p class="pvwd-kicker">O que fazemos</p>
				<h2 class="pvwd-h2">Estrutura digital completa para o seu negócio crescer com previsibilidade</h2>

				<div class="pvwd-services">
					<div class="pvwd-service-card">
						<span class="pvwd-service-icon">🖥️</span>
						<h3>Sites e sistemas</h3>
						<p>Um site não é cartão de visita — é o funcionário que trabalha por você 24 horas por dia. Desenvolvemos sites institucionais, landing pages e sistemas web sob medida, pensados para gerar credibilidade e converter visitantes em clientes.</p>
					</div>
					<div class="pvwd-service-card">
						<span class="pvwd-service-icon">⚙️</span>
						<h3>Automações (N8N)</h3>
						<p>Tarefas repetitivas consomem tempo que você poderia usar para atender melhor ou vender mais. Criamos automações que cuidam de follow-up, respostas automáticas, integração entre sistemas e organização de dados — sem que você precise contratar mais ninguém pra isso.</p>
					</div>
					<div class="pvwd-service-card">
						<span class="pvwd-service-icon">🔧</span>
						<h3>Suporte e evolução contínua</h3>
						<p>Diferente de quem entrega e some, acompanhamos o resultado depois da entrega, ajustando o que for necessário para o sistema continuar gerando valor.</p>
					</div>
				</div>
			</div>
		</section>

		<!-- 4. COMO FUNCIONA -->
		<section class="pvwd-section" id="como-funciona">
			<div class="pvwd-container pvwd-reveal">
				<p class="pvwd-kicker">Como funciona</p>
				<h2 class="pvwd-h2">Um processo simples, sem enrolação</h2>

				<div class="pvwd-steps">
					<div class="pvwd-step">
						<span class="pvwd-step-number">01</span>
						<h3>Diagnóstico</h3>
						<p>Conversamos sobre o seu negócio, seus processos atuais e onde estão os gargalos.</p>
					</div>
					<div class="pvwd-step">
						<span class="pvwd-step-number">02</span>
						<h3>Proposta clara</h3>
						<p>Você recebe um escopo definido, com prazo e investimento, antes de qualquer compromisso.</p>
					</div>
					<div class="pvwd-step">
						<span class="pvwd-step-number">03</span>
						<h3>Desenvolvimento</h3>
						<p>Construímos a solução com atualizações periódicas, sem surpresas no meio do caminho.</p>
					</div>
					<div class="pvwd-step">
						<span class="pvwd-step-number">04</span>
						<h3>Entrega e suporte</h3>
						<p>Você recebe o projeto funcionando, com orientação de uso e suporte para ajustes.</p>
					</div>
				</div>
			</div>
		</section>

		<!-- 5. POR QUE CONFIAR -->
		<section class="pvwd-section pvwd-section-alt">
			<div class="pvwd-container pvwd-reveal">
				<p class="pvwd-kicker">Por que confiar</p>
				<h2 class="pvwd-h2">Sistemas em produção, resolvendo problemas reais</h2>

				<div class="pvwd-stats">
					<div class="pvwd-stat-card"><p><?php echo esc_html( $s['stat_projects'] ); ?></p></div>
					<div class="pvwd-stat-card"><p><?php echo esc_html( $s['stat_systems'] ); ?></p></div>
				</div>

				<div class="pvwd-cases">
					<div class="pvwd-case-card">
						<span class="pvwd-case-tag">Case</span>
						<h3><?php echo esc_html( $s['case1_title'] ); ?></h3>
						<p><?php echo esc_html( $s['case1_desc'] ); ?></p>
					</div>
					<div class="pvwd-case-card">
						<span class="pvwd-case-tag">Case</span>
						<h3><?php echo esc_html( $s['case2_title'] ); ?></h3>
						<p><?php echo esc_html( $s['case2_desc'] ); ?></p>
					</div>
					<div class="pvwd-case-card">
						<span class="pvwd-case-tag">Case</span>
						<h3><?php echo esc_html( $s['case3_title'] ); ?></h3>
						<p><?php echo esc_html( $s['case3_desc'] ); ?></p>
					</div>
				</div>
			</div>
		</section>

		<!-- 6. PARA QUEM É / NÃO É -->
		<section class="pvwd-section">
			<div class="pvwd-container pvwd-reveal">
				<p class="pvwd-kicker">Para quem é</p>
				<h2 class="pvwd-h2">Vamos ver se faz sentido pro seu momento</h2>

				<div class="pvwd-fit">
					<div class="pvwd-fit-card pvwd-fit-yes">
						<h3>Esse serviço é para você que:</h3>
						<ul>
							<li>Tem um negócio em funcionamento e sente que a parte digital está travando o crescimento.</li>
							<li>Quer um site ou sistema que realmente funcione, não só "bonito".</li>
							<li>Está disposto a investir em algo feito sob medida, e não em modelos genéricos.</li>
						</ul>
					</div>
					<div class="pvwd-fit-card pvwd-fit-no">
						<h3>Não é para você que:</h3>
						<ul>
							<li>Busca soluções prontas, gratuitas, sem nenhuma personalização.</li>
							<li>Quer resultado sem definir minimamente o que precisa (não tem problema não saber tudo — mas é preciso disposição pra construir junto).</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- 7. OFERTA E CTA FINAL -->
		<section class="pvwd-section pvwd-cta-final">
			<div class="pvwd-glow pvwd-glow-3" aria-hidden="true"></div>
			<div class="pvwd-container pvwd-reveal">
				<h2 class="pvwd-h2">Vamos entender o que o seu negócio precisa?</h2>
				<p class="pvwd-cta-final-text">Cada negócio tem uma necessidade diferente — por isso não trabalhamos com pacote fechado sem antes te ouvir. Chame no WhatsApp e vamos conversar sobre o seu cenário, sem compromisso.</p>
				<a href="<?php echo esc_url( $wa_final ); ?>" class="pvwd-btn pvwd-btn-lg" target="_blank" rel="noopener noreferrer">
					<?php echo $whatsapp_icon; ?>
					<span>Falar no WhatsApp agora</span>
				</a>
			</div>
		</section>

		<!-- 8. FAQ -->
		<section class="pvwd-section" id="faq">
			<div class="pvwd-container pvwd-reveal">
				<p class="pvwd-kicker">Dúvidas frequentes</p>
				<h2 class="pvwd-h2">Perguntas que você provavelmente tem</h2>

				<div class="pvwd-faq">
					<details class="pvwd-faq-item" open>
						<summary>Quanto custa um site ou sistema?<span class="pvwd-faq-icon">+</span></summary>
						<p>O investimento varia conforme a complexidade do projeto. Por isso o primeiro passo é sempre uma conversa de diagnóstico, sem custo, pra te passar um valor justo e real.</p>
					</details>
					<details class="pvwd-faq-item">
						<summary>Quanto tempo leva?<span class="pvwd-faq-icon">+</span></summary>
						<p>Depende do escopo, mas você recebe um prazo definido logo na proposta — sem enrolação.</p>
					</details>
					<details class="pvwd-faq-item">
						<summary>E se eu não souber exatamente o que preciso?<span class="pvwd-faq-icon">+</span></summary>
						<p>Sem problema. Parte do nosso trabalho é justamente ajudar você a identificar onde a automação ou o sistema vai gerar mais resultado.</p>
					</details>
					<details class="pvwd-faq-item">
						<summary>Vocês dão suporte depois da entrega?<span class="pvwd-faq-icon">+</span></summary>
						<p>Sim. Acompanhamos o projeto após a entrega para garantir que ele continue funcionando e gerando valor.</p>
					</details>
				</div>
			</div>
		</section>

	</main>

	<!-- FOOTER -->
	<footer class="pvwd-footer">
		<div class="pvwd-container pvwd-footer-inner">
			<span class="pvwd-logo"><?php echo esc_html( $s['brand_name'] ); ?><span class="pvwd-dot">.</span></span>
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $s['brand_name'] ); ?>. Estrutura digital para negócios que querem crescer.</p>
			<a href="<?php echo esc_url( $wa_nav ); ?>" target="_blank" rel="noopener noreferrer"><?php echo $whatsapp_icon; ?></a>
		</div>
	</footer>

</div>
