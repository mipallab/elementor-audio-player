<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class OBJE_Podcast_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'obje_podcast_player';
	}

	public function get_title() {
		return esc_html__( 'Podcast Player', 'obje-podcast' );
	}

	public function get_icon() {
		return 'eicon-play';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'podcast', 'audio', 'player', 'music' ];
	}

	protected function register_controls() {

		// ==============================
		// Content Tab
		// ==============================
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'obje-podcast' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'podcast_type',
			[
				'label' => esc_html__( 'Type', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'audio',
				'options' => [
					'audio' => esc_html__( 'Audio Player', 'obje-podcast' ),
					'external' => esc_html__( 'External Link', 'obje-podcast' ),
				],
			]
		);

		$this->add_control(
			'podcast_title',
			[
				'label' => esc_html__( 'Title', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Why Sales Training Fails Without Competency Diagnosis', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'podcast_author',
			[
				'label' => esc_html__( 'Source / Author', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Sales Enablement PRO', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'podcast_date',
			[
				'label' => esc_html__( 'Date', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Oct 12, 2025', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'podcast_duration',
			[
				'label' => esc_html__( 'Duration', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '45m', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'badge_text',
			[
				'label' => esc_html__( 'Badge Text', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Audio', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'audio_file',
			[
				'label' => esc_html__( 'Audio File', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'audio' ],
				'condition' => [
					'podcast_type' => 'audio',
				],
			]
		);

		$this->add_control(
			'external_link',
			[
				'label' => esc_html__( 'External Link', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'obje-podcast' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition' => [
					'podcast_type' => 'external',
				],
			]
		);

		$this->add_control(
			'listen_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Listen now', 'obje-podcast' ),
				'condition' => [
					'podcast_type' => 'external',
				],
			]
		);

		$this->add_control(
			'left_icon',
			[
				'label' => esc_html__( 'Custom Left Icon', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'description' => esc_html__( 'Leave empty to use default SVG', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'play_icon',
			[
				'label' => esc_html__( 'Play Icon', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'description' => esc_html__( 'Leave empty to use default SVG', 'obje-podcast' ),
				'condition' => [
					'podcast_type' => 'audio',
				],
			]
		);

		$this->add_control(
			'pause_icon',
			[
				'label' => esc_html__( 'Pause Icon', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'description' => esc_html__( 'Leave empty to use default SVG', 'obje-podcast' ),
				'condition' => [
					'podcast_type' => 'audio',
				],
			]
		);

		$this->end_controls_section();

		// ==============================
		// Style Tab - Card Box
		// ==============================
		$this->start_controls_section(
			'style_card_section',
			[
				'label' => esc_html__( 'Card Box', 'obje-podcast' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'card_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-card' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'card_border',
				'selector' => '{{WRAPPER}} .obje-podcast-card',
			]
		);

		$this->add_control(
			'card_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'card_box_shadow',
				'selector' => '{{WRAPPER}} .obje-podcast-card',
			]
		);

		$this->add_responsive_control(
			'card_padding',
			[
				'label' => esc_html__( 'Padding', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_margin',
			[
				'label' => esc_html__( 'Margin', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_gap',
			[
				'label' => esc_html__( 'Gap', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-card' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ==============================
		// Style Tab - Content
		// ==============================
		$this->start_controls_section(
			'style_typography_section',
			[
				'label' => esc_html__( 'Content Styles', 'obje-podcast' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'obje-podcast' ),
				'selector' => '{{WRAPPER}} .obje-podcast-title',
			]
		);

		$this->add_control(
			'author_color',
			[
				'label' => esc_html__( 'Source/Author Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-source' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'author_typography',
				'label' => esc_html__( 'Source/Author Typography', 'obje-podcast' ),
				'selector' => '{{WRAPPER}} .obje-podcast-source',
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => esc_html__( 'Meta Color (Date & Time)', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-meta-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => esc_html__( 'Meta Typography', 'obje-podcast' ),
				'selector' => '{{WRAPPER}} .obje-podcast-meta-text',
			]
		);

		$this->end_controls_section();

		// ==============================
		// Style Tab - Icons
		// ==============================
		$this->start_controls_section(
			'style_icons_section',
			[
				'label' => esc_html__( 'Icons', 'obje-podcast' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'left_icon_heading',
			[
				'label' => esc_html__( 'Custom Left Icon', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'left_icon_color',
			[
				'label' => esc_html__( 'Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-icon-wrap' => 'color: {{VALUE}};',
					'{{WRAPPER}} .obje-icon-wrap svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
					'{{WRAPPER}} .obje-icon-wrap svg.obje-default-left-icon' => 'fill: none; stroke: {{VALUE}};',
					'{{WRAPPER}} .obje-icon-wrap i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'left_icon_size',
			[
				'label' => esc_html__( 'Size', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .obje-icon-wrap svg, {{WRAPPER}} .obje-icon-wrap img, {{WRAPPER}} .obje-icon-wrap i' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'left_icon_column_width',
			[
				'label' => esc_html__( 'Column Width (Spacing)', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-card' => '--left-col-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'action_icon_heading',
			[
				'label' => esc_html__( 'Play / Pause Icon', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs( 'tabs_action_icon_colors' );

		// Normal Tab
		$this->start_controls_tab(
			'tab_action_icon_normal',
			[
				'label' => esc_html__( 'Normal', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'action_icon_color',
			[
				'label' => esc_html__( 'Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-play-btn svg' => 'fill: {{VALUE}};',
					'{{WRAPPER}} .obje-podcast-play-btn i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'action_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-play-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'action_icon_border',
				'selector' => '{{WRAPPER}} .obje-podcast-play-btn',
			]
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'tab_action_icon_hover',
			[
				'label' => esc_html__( 'Hover', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'action_icon_color_hover',
			[
				'label' => esc_html__( 'Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-play-btn:hover' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .obje-podcast-play-btn:hover svg' => 'fill: {{VALUE}} !important;',
					'{{WRAPPER}} .obje-podcast-play-btn:hover i' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'action_icon_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-play-btn:hover' => 'background-color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'action_icon_border_hover',
				'selector' => '{{WRAPPER}} .obje-podcast-play-btn:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'action_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-play-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'action_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-play-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'action_icon_size',
			[
				'label' => esc_html__( 'Size', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-play-btn svg, {{WRAPPER}} .obje-arrow-icon, {{WRAPPER}} .obje-podcast-play-btn i, {{WRAPPER}} .obje-podcast-listen-btn i' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ==============================
		// Style Tab - Badge
		// ==============================
		$this->start_controls_section(
			'style_badge_section',
			[
				'label' => esc_html__( 'Badge', 'obje-podcast' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'badge_color',
			[
				'label' => esc_html__( 'Text Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-badge' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'badge_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-badge' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'badge_border',
				'selector' => '{{WRAPPER}} .obje-podcast-badge',
			]
		);

		$this->add_control(
			'badge_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'badge_padding',
			[
				'label' => esc_html__( 'Padding', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'badge_typography',
				'selector' => '{{WRAPPER}} .obje-podcast-badge',
			]
		);

		$this->end_controls_section();

		// ==============================
		// Style Tab - Listen Button (External)
		// ==============================
		$this->start_controls_section(
			'style_button_section',
			[
				'label' => esc_html__( 'Listen Button (External Link)', 'obje-podcast' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => esc_html__( 'Typography', 'obje-podcast' ),
				'selector' => '{{WRAPPER}} .obje-podcast-listen-btn',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		// Normal Tab
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' => esc_html__( 'Text/Icon Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-listen-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .obje-podcast-listen-btn svg' => 'stroke: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-listen-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'selector' => '{{WRAPPER}} .obje-podcast-listen-btn',
			]
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'obje-podcast' ),
			]
		);

		$this->add_control(
			'btn_text_color_hover',
			[
				'label' => esc_html__( 'Text/Icon Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-listen-btn:hover' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .obje-podcast-listen-btn:hover svg' => 'stroke: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'btn_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-listen-btn:hover' => 'background-color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border_hover',
				'selector' => '{{WRAPPER}} .obje-podcast-listen-btn:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-listen-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-listen-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .obje-podcast-listen-btn svg, {{WRAPPER}} .obje-podcast-listen-btn img, {{WRAPPER}} .obje-arrow-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .obje-podcast-listen-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ==============================
		// Style Tab - Global Popup Player
		// ==============================
		$this->start_controls_section(
			'style_global_player_section',
			[
				'label' => esc_html__( 'Popup Player (Spotify-style)', 'obje-podcast' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'player_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'body .obje-global-player.active-widget-{{ID}}' => '--obje-player-bg: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'player_text_color',
			[
				'label' => esc_html__( 'Text Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1e293b',
				'selectors' => [
					'body .obje-global-player.active-widget-{{ID}}' => '--obje-player-text: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'player_muted_text_color',
			[
				'label' => esc_html__( 'Muted Text Color', 'obje-podcast' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#64748b',
				'selectors' => [
					'body .obje-global-player.active-widget-{{ID}}' => '--obje-player-text-muted: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'player_title_typography',
				'label' => esc_html__( 'Title Typography', 'obje-podcast' ),
				'selector' => 'body .obje-global-player.active-widget-{{ID}} .obje-player-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'player_meta_typography',
				'label' => esc_html__( 'Meta Typography (Time & Author)', 'obje-podcast' ),
				'selector' => 'body .obje-global-player.active-widget-{{ID}} .obje-player-time, body .obje-global-player.active-widget-{{ID}} .obje-player-author',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$widget_id = $this->get_id();

		$type = isset($settings['podcast_type']) ? $settings['podcast_type'] : 'audio';
		$title = isset($settings['podcast_title']) ? $settings['podcast_title'] : '';
		$author = isset($settings['podcast_author']) ? $settings['podcast_author'] : '';
		$date = isset($settings['podcast_date']) ? $settings['podcast_date'] : '';
		$duration = isset($settings['podcast_duration']) ? $settings['podcast_duration'] : '';
		$badge = isset($settings['badge_text']) ? $settings['badge_text'] : '';
		
		$audio_url = isset( $settings['audio_file']['url'] ) ? $settings['audio_file']['url'] : '';
		$data_audio = esc_url( $audio_url );
		$brand_color = isset( $settings['brand_color'] ) && !empty( $settings['brand_color'] ) ? esc_attr( $settings['brand_color'] ) : '#fb7b63';
		
		// Left Icon
		ob_start();
		if ( isset( $settings['left_icon'] ) ) {
			\Elementor\Icons_Manager::render_icon( $settings['left_icon'], [ 'aria-hidden' => 'true' ] );
		}
		$left_icon_html = ob_get_clean();
		if ( empty( trim( $left_icon_html ) ) ) {
			if ( $type === 'audio' ) {
				$left_icon_html = '<svg class="obje-default-left-icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M14 39V28c0-12 8-21 18-21s18 9 18 21v11" /><path d="M14 39v12c0 3 2 5 5 5h3V39h-3c-3 0-5 2-5 5" /><path d="M50 39v12c0 3-2 5-5 5h-3V39h3c3 0 5 2 5 5" /></svg>';
			} else {
				$left_icon_html = '<svg class="obje-default-left-icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.4"><circle cx="32" cy="32" r="24" /><path d="M19 29c8-4 18-4 26 0" /><path d="M22 37c6-3 14-3 20 0" /><path d="M26 45c4-2 8-2 12 0" /></svg>';
			}
		}

		// Action Icons
		if ( $type === 'audio' ) {
			ob_start();
			if ( isset( $settings['play_icon'] ) ) {
				\Elementor\Icons_Manager::render_icon( $settings['play_icon'], [ 'aria-hidden' => 'true' ] );
			}
			$play_icon_html = ob_get_clean();
			if ( empty( trim( $play_icon_html ) ) ) {
				$play_icon_html = '<svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z" /></svg>';
			}

			ob_start();
			if ( isset( $settings['pause_icon'] ) ) {
				\Elementor\Icons_Manager::render_icon( $settings['pause_icon'], [ 'aria-hidden' => 'true' ] );
			}
			$pause_icon_html = ob_get_clean();
			if ( empty( trim( $pause_icon_html ) ) ) {
				// Fallback pause icon
				$pause_icon_html = '<svg viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>';
			}
		}
		
		$wrapper_attrs = [
			'class' => 'obje-podcast-wrapper',
			'data-title' => esc_attr( $title ),
			'data-author' => esc_attr( $author ),
			'data-brand' => $brand_color,
			'data-widget-id' => esc_attr( $widget_id )
		];
		if ( $type === 'audio' ) {
			$wrapper_attrs['data-audio'] = $data_audio;
		}

		$this->add_render_attribute( 'wrapper', $wrapper_attrs );

		?>
		<div <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
			
			<?php if ( $type === 'audio' ) : ?>
			<!-- Hidden Icon Storage for JS transfer -->
			<div style="display:none;" class="obje-hidden-icons">
				<div class="obje-icon-play"><?php echo $play_icon_html; ?></div>
				<div class="obje-icon-pause"><?php echo $pause_icon_html; ?></div>
			</div>
			<?php endif; ?>

			<div class="obje-podcast-card obje-type-<?php echo esc_attr($type); ?>">
				<div class="obje-icon-wrap">
					<?php echo $left_icon_html; ?>
				</div>

				<div class="obje-podcast-content">
					<h3 class="obje-podcast-title"><?php echo wp_kses_post( $title ); ?></h3>
					
					<div class="obje-podcast-meta">
						<?php if ( !empty( $author ) ) : ?>
							<span class="obje-podcast-source"><?php echo esc_html( $author ); ?></span>
							<?php if ( !empty( $date ) || !empty( $duration ) ) : ?><span class="obje-podcast-dot"></span><?php endif; ?>
						<?php endif; ?>
						
						<?php if ( !empty( $date ) ) : ?>
							<span class="obje-podcast-meta-text"><?php echo esc_html( $date ); ?></span>
							<?php if ( !empty( $duration ) ) : ?><span class="obje-podcast-dot"></span><?php endif; ?>
						<?php endif; ?>
						
						<?php if ( !empty( $duration ) ) : ?>
							<span class="obje-podcast-meta-text"><?php echo esc_html( $duration ); ?></span>
						<?php endif; ?>
					</div>
				</div>

				<?php if ( !empty( $badge ) ) : ?>
					<div class="obje-podcast-badge"><?php echo esc_html( $badge ); ?></div>
				<?php endif; ?>

				<?php if ( $type === 'audio' ) : ?>
					<button class="obje-podcast-play-btn group" type="button" aria-label="<?php esc_attr_e('Play Podcast', 'obje-podcast'); ?>">
						<span class="obje-active-icon-container">
							<?php echo $play_icon_html; ?>
						</span>
					</button>
				<?php else : 
					$target = ( isset($settings['external_link']['is_external']) && $settings['external_link']['is_external'] ) ? ' target="_blank"' : '';
					$nofollow = ( isset($settings['external_link']['nofollow']) && $settings['external_link']['nofollow'] ) ? ' rel="nofollow"' : '';
					$link_url = !empty( $settings['external_link']['url'] ) ? esc_url( $settings['external_link']['url'] ) : '#';
					$btn_text = isset($settings['listen_btn_text']) ? $settings['listen_btn_text'] : 'Listen now';
				?>
					<a href="<?php echo $link_url; ?>" class="obje-podcast-listen-btn" <?php echo $target . $nofollow; ?>>
						<?php echo esc_html( $btn_text ); ?>
						<svg class="obje-arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
							<path d="M7 17L17 7" />
							<path d="M8 7h9v9" />
						</svg>
					</a>
				<?php endif; ?>

			</div>
		</div>
		<?php
	}
}
