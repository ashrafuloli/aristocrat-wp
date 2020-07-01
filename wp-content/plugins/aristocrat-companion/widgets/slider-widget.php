<?php

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Slider extends \Elementor\Widget_Base {

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
		return 'slider';
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
		return __( 'Slider', 'aristocrat-companion' );
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
				'label' => __( 'Slides', 'aristocrat-companion' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'type'    => Controls_Manager::MEDIA,
				'label'   => __( 'Image', 'aristocrat-companion' ),
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'title',
			[
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'label'       => __( 'Title & Subtitle', 'aristocrat-companion' ),
				'placeholder' => __( 'Type title here', 'aristocrat-companion' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'subtitle',
			[
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'show_label'  => false,
				'placeholder' => __( 'Type subtitle here', 'aristocrat-companion' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label'       => __( 'Text', 'aristocrat-companion' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Button Text',
				'placeholder' => __( 'Type button text here', 'aristocrat-companion' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'button_link',
			[
				'label'       => __( 'Link', 'aristocrat-companion' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'http://elementor.bdevs.net/',
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'button_selected_icon',
			[
				'label'            => __( 'Icon', 'aristocrat-companion' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'button_icon',
				'label_block'      => true,
			]
		);

		$this->add_control(
			'slides',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(title || "Slider Item"); #>',
				'default'     => [
					[
						'image' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'image' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'image' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					]
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_settings',
			[
				'label' => __( 'Settings', 'aristocrat-companion' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'animation_speed',
			[
				'label'              => __( 'Animation Speed', 'aristocrat-companion' ),
				'type'               => Controls_Manager::NUMBER,
				'min'                => 100,
				'step'               => 10,
				'max'                => 10000,
				'default'            => 10000,
				'description'        => __( 'Slide speed in milliseconds', 'aristocrat-companion' ),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'              => __( 'Autoplay?', 'aristocrat-companion' ),
				'type'               => Controls_Manager::SWITCHER,
				'label_on'           => __( 'Yes', 'aristocrat-companion' ),
				'label_off'          => __( 'No', 'aristocrat-companion' ),
				'return_value'       => 'yes',
				'default'            => 'yes',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'loop',
			[
				'label'              => __( 'Infinite Loop?', 'aristocrat-companion' ),
				'type'               => Controls_Manager::SWITCHER,
				'label_on'           => __( 'Yes', 'aristocrat-companion' ),
				'label_off'          => __( 'No', 'aristocrat-companion' ),
				'return_value'       => 'yes',
				'default'            => 'yes',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'nav',
			[
				'label'        => __( 'Navigation Arrow', 'oswan' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'oswan' ),
				'label_off'    => __( 'Hide', 'oswan' ),
				'return_value' => 'true',
				'default'      => 'false',
			]
		);
		$this->add_control(
			'dots',
			[
				'label'        => __( 'Dots', 'oswan' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'oswan' ),
				'label_off'    => __( 'Hide', 'oswan' ),
				'return_value' => 'true',
				'default'      => 'true',
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

		if ( empty( $settings['slides'] ) ) {
			return;
		}

		if ( $settings['slides'] ) {
			$sliderDynamicId = rand( 12036456, 25693487 );
			$countSlide      = count( $settings['slides'] );
			$loop            = $settings['loop'] ? $settings['loop'] : 'false';
			$autoplay        = $settings['autoplay'] ? $settings['autoplay'] : 'false';
			$autoplayTimeout = $settings['animation_speed'] ? $settings['animation_speed'] : '0';
			$nav             = $settings['nav'] ? $settings['nav'] : 'false';
			$dots            = $settings['dots'] ? $settings['dots'] : 'false';

			$this->add_render_attribute(
				'slider-wrapper',
				[
					'class'                 => 'slider-active home-slider owl-carousel',
					'id'                    => 'aristocrat-slider-' . esc_attr( $sliderDynamicId ),
					'data-countslide'       => $countSlide,
					'data-dots'             => $dots,
					'data-nav'              => $nav,
					'data-loop'             => $loop,
					'data-autoplay'         => $autoplay,
					'data-autoplay-timeout' => $autoplayTimeout,
				]
			);
		}
		?>
		<div class="slider-area">
			<div <?php echo $this->get_render_attribute_string( 'slider-wrapper' ); ?>>
				<?php
				foreach ( $settings['slides'] as $slide ) :

					$image = wp_get_attachment_image_url( $slide['image']['id'], 'large' );
					if ( ! $image ) {
						$image = $slide['image']['url'];
					}

					?>
					<div class="single-slide" style="background-image: url(<?php echo $image; ?>)">
						<div class="container">
							<div class="row">
								<div class="col-xl-8 col-lg-10 offset-lg-1">
									<div class="slider-text">
										<?php if ( $slide['title'] ) : ?>
											<h2 data-animation="fadeInUp" data-delay="0.2s">
												<?php echo aristocrat_kses_basic( $slide['title'] ); ?>
											</h2>
										<?php endif; ?>

										<?php if ( $slide['subtitle'] ) : ?>
											<p data-animation="fadeInUp" data-delay="0.6s">
												<?php echo aristocrat_kses_basic( $slide['subtitle'] ); ?>
											</p>
										<?php endif; ?>

										<?php if ( $slide['button_text'] ) : ?>
											<div class="read-more" data-animation="fadeInUp" data-delay="0.6s">
												<a href="<?php echo esc_html( $slide['button_link'] ) ?>">
													<?php echo esc_html( $slide['button_text'] ) ?>
													<i class="<?php echo esc_attr( $slide['button_selected_icon']['value'] ); ?>"></i>
												</a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
				endforeach; ?>
			</div>
		</div>
		<?php
	}
}
