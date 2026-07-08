=== PV Web Designer - Landing Page ===
Contributors: pvwebdesigner
Tags: landing page, whatsapp, agencia, sites, automacoes
Requires at least: 5.8
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Landing page completa (dark/glass, inspirada em portfólios de desenvolvedor) para captação de leads via WhatsApp, com a copy oficial da pvwebdesigner.

== Description ==

Este plugin adiciona uma landing page pronta, com todas as 8 seções da copy da pvwebdesigner (hero, premissas, serviços, como funciona, prova social, para quem é, CTA final e FAQ), estilo visual escuro com gradientes e cards em glassmorphism, botão flutuante de WhatsApp, FAQ em acordeão e animações de entrada ao rolar a página.

**Como usar**

1. Ative o plugin.
2. Vá em *Ajustes > PVWD Landing* e configure o número de WhatsApp, a mensagem padrão e os dados de prova social (estatísticas e cases).
3. Use o shortcode `[pvwebdesigner_landing]` em qualquer página, **ou**
4. Crie uma página nova, e em *Atributos da página* selecione o template **"PV Web Designer - Landing"** para uma landing page em tela cheia (sem header/footer do tema).

== Installation ==

1. Envie a pasta `pvwebdesigner-landing` para `/wp-content/plugins/`.
2. Ative o plugin no menu "Plugins" do WordPress.
3. Configure o WhatsApp em *Ajustes > PVWD Landing*.

== Changelog ==

= 1.1.0 =
* Corrigido texto em degradê do headline, que podia renderizar de forma corrompida em navegadores/preview sem suporte total a `background-clip: text` (agora com fallback via `-webkit-text-fill-color` e `@supports`).
* Animações de entrada por scroll agora são "progressive enhancement": o conteúdo fica visível por padrão e só anima se o JavaScript rodar, evitando seções que sumiam caso o script fosse bloqueado.
* Reforçada a centralização do CTA final e do botão do hero.
* Adicionado upload de imagem (Biblioteca de Mídia), nome do site e link opcional para cada case do bloco "Por que confiar", com preview no admin.

= 1.0.0 =
* Versão inicial: shortcode, template de página, painel de configurações e landing completa com a copy da pvwebdesigner.
