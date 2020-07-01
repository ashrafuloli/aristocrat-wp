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
class Heading extends \Elementor\Widget_Base {

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
		return 'Heading';
	}

	/**
	 * Get widget Heading.
	 *
	 * Retrieve oEmbed widget Heading.
	 *
	 * @return string Widget Heading.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Heading', 'aristocrat-companion' );
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
			'_section_slides',
			[
				'label' => __( 'Heading', 'aristocrat-companion' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'bg_image',
			[
				'type'    => Controls_Manager::MEDIA,
				'label'   => __( 'Background Image', 'aristocrat-companion' ),
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'section_heading',
			[
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'label'       => __( 'Heading', 'aristocrat-companion' ),
				'placeholder' => __( 'Type Heading here', 'aristocrat-companion' ),
				'dynamic'     => [
					'active' => true,
				]
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


		$image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'large' );
		if ( ! $image ) {
			$image = $settings['bg_image']['url'];
		}
		?>
		<?php if ( $settings['section_heading'] ) : ?>
			<div class="breadcrumb-area pt-100 pb-100" data-overlay="dark" data-opacity="7"
			     style="background-image: url(<?php print $image; ?>);">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 text-center">
							<div class="breadcrumb-content">
								<h3 class="title"><?php echo $settings['section_heading']; ?></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php
	}
}
