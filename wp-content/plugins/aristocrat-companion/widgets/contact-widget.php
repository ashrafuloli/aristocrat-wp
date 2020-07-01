<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Contact extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'Contact';
	}

	/**
	 * Get widget Contact.
	 *
	 * Retrieve oEmbed widget Contact.
	 *
	 * @return string Widget Contact.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Contact', 'aristocrat-companion' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'fas fa-compact-disc';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'_section_contacts',
			[
				'label' => __( 'Contact', 'aristocrat-companion' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'label'       => __( 'Title', 'aristocrat-companion' ),
				'placeholder' => __( 'Type Title here', 'aristocrat-companion' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'subtitle',
			[
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'label'       => __( 'Sub Title', 'aristocrat-companion' ),
				'placeholder' => __( 'Type Sub Title here', 'aristocrat-companion' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'shortcode',
			[
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'label'       => __( 'Title', 'aristocrat-companion' ),
				'placeholder' => __( 'Type shortcode here', 'aristocrat-companion' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'design_style',
			[
				'label'              => __( 'Design Style', 'aristocrat-companion' ),
				'type'               => Controls_Manager::SELECT,
				'options'            => [
					'style_1' => __( 'Style 1', 'aristocrat-companion' ),
					'style_2' => __( 'Style 2', 'aristocrat-companion' )
				],
				'default'            => 'style_1',
				'frontend_available' => true,
				'style_transfer'     => true,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		?>

		<?php if ( $settings['design_style'] === 'style_2' ): ?>
		<div class="contact-area pt-100 pb-100">
			<div class="container">
				<div class="row mb-50">
					<div class="col-xl-12">
						<div class="contact-form-text">
							<h4><?php echo $settings['title']; ?></h4>
							<p>
								<?php echo $settings['subtitle']; ?>
							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="contact-form contact-form-2">
							<?php echo do_shortcode( $settings['shortcode'] ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php else: ?>
		<div class="contact-area pb-100">
			<div class="container contact-wrap mt--100">
				<div class="row justify-content-center">
					<div class="col-xl-8 col-lg-10">
						<div class="section-title text-center mb-50">
							<h3><?php echo $settings['title']; ?></h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="contact-form contact-form-2">
							<?php echo do_shortcode( $settings['shortcode'] ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php
	}
}
