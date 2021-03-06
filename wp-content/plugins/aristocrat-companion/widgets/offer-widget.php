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
class Offer extends \Elementor\Widget_Base {

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
		return 'offer';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Offer', 'aristocrat-companion' );
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
				'label' => __( 'Offer', 'aristocrat-companion' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'offer_image',
			[
				'type'    => Controls_Manager::MEDIA,
				'label'   => __( 'Offer Image', 'aristocrat-companion' ),
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'offer_title',
			[
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'label'       => __( 'Title', 'aristocrat-companion' ),
				'placeholder' => __( 'Type title here', 'aristocrat-companion' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'offer_sub_title',
			[
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'show_label'  => false,
				'label'       => __( 'Subtitle', 'aristocrat-companion' ),
				'placeholder' => __( 'Type subtitle here', 'aristocrat-companion' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'offer_button_text',
			[
				'label'       => __( 'Read Text', 'aristocrat-companion' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Button Text',
				'placeholder' => __( 'Type button text here', 'aristocrat-companion' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'offer_button_link',
			[
				'label'       => __( 'Read Link', 'aristocrat-companion' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'http://elementor.bdevs.net/',
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'offer_button_icon',
			[
				'label'            => __( 'Read Icon', 'aristocrat-companion' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'button_icon',
				'label_block'      => true,
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

		$image = wp_get_attachment_image_url( $settings['offer_image']['id'], 'large' );
		if ( ! $image ) {
			$image = $settings['offer_image']['url'];
		}

		?>
		<div class="offer-area pt-150 pb-150" style="background-image: url(<?php echo $image; ?>)">
			<div class="container">
				<div class="row">
					<div class="col-xl-6">
						<div class="offer-content">
							<?php if ( $settings['offer_sub_title'] ) : ?>
								<h5>
									<?php echo aristocrat_kses_basic( $settings['offer_sub_title'] ); ?>
								</h5>
							<?php endif; ?>
							<?php if ( $settings['offer_title'] ) : ?>
								<h4>
									<?php echo aristocrat_kses_basic( $settings['offer_title'] ); ?>
								</h4>
							<?php endif; ?>
							<?php if ( $settings['offer_button_text'] ) : ?>
								<a href="<?php echo esc_html( $settings['offer_button_link'] ) ?>"
								   class="btn btn-theme">
									<?php echo esc_html( $settings['offer_button_text'] ) ?>
									<i class="<?php echo esc_attr( $settings['offer_button_icon']['value'] ); ?>"></i>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
