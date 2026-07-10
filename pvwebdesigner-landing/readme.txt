=== PV Web Designer - Landing Page ===
Contributors: pvwebdesigner
Tags: landing page, whatsapp, agencia, sites, automacoes
Requires at least: 5.8
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.2.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Landing page completa (dark/glass, inspirada em portfólios de desenvolvedor) para captação de leads via WhatsApp, com a copy oficial da pvwebdesigner.

== Description ==

Este plugin adiciona uma landing page pronta, com todas as 8 seções da copy da pvwebdesigner (hero, premissas, serviços, como funciona, prova social, para quem é, CTA final e FAQ), estilo visual escuro com gradientes e cards em glassmorphism, botão flutuante de WhatsApp, FAQ em acordeão e animações de entrada ao rolar a página.

**Como usar**

1. Ative o plugin — a landing já passa a ser exibida automaticamente, em tela cheia (sem header/footer do tema), na página inicial do site. Não é preciso criar página, template ou shortcode.
2. Vá em *Ajustes > PVWD Landing* e configure o número de WhatsApp, a mensagem padrão e os dados de prova social (estatísticas e cases).
3. Se preferir não usar a página inicial automática, desmarque a opção "Página inicial automática" nas configurações e use, em vez disso:
   - o shortcode `[pvwebdesigner_landing]` em qualquer página, **ou**
   - uma página nova com o template **"PV Web Designer - Landing"** selecionado em *Atributos da página*, para uma landing em tela cheia numa URL específica.

== Installation ==

1. Envie a pasta `pvwebdesigner-landing` para `/wp-content/plugins/`.
2. Ative o plugin no menu "Plugins" do WordPress — a página inicial do site já passa a exibir a landing automaticamente.
3. Configure o WhatsApp em *Ajustes > PVWD Landing*.

== Changelog ==

= 1.2.0 =
* A landing page agora é exibida automaticamente em tela cheia na página inicial do site, sem depender de shortcode ou de seleção manual de template. Comportamento pode ser desligado em *Ajustes > PVWD Landing* ("Página inicial automática").

= 1.1.0 =
* Corrigido texto em degradê do headline, que podia renderizar de forma corrompida em navegadores/preview sem suporte total a `background-clip: text` (agora com fallback via `-webkit-text-fill-color` e `@supports`).
* Animações de entrada por scroll agora são "progressive enhancement": o conteúdo fica visível por padrão e só anima se o JavaScript rodar, evitando seções que sumiam caso o script fosse bloqueado.
* Reforçada a centralização do CTA final e do botão do hero.
* Adicionado upload de imagem (Biblioteca de Mídia), nome do site e link opcional para cada case do bloco "Por que confiar", com preview no admin.

= 1.0.0 =
* Versão inicial: shortcode, template de página, painel de configurações e landing completa com a copy da pvwebdesigner.
