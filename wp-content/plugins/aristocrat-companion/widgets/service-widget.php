<?php

use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;
use Elementor\Utils;

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Service extends \Elementor\Widget_Base {

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
		return 'service';
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
		return __( 'Service', 'aristocrat-companion' );
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
			'_section_service',
			[
				'label' => __( 'Service', 'aristocrat-companion' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
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

		$repeater = new Repeater();

		$repeater->add_control(
			'type',
			[
				'label'          => __( 'Media Type', 'bdevselement' ),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'options'        => [
					'icon'  => [
						'title' => __( 'Icon', 'bdevselement' ),
						'icon'  => 'fa fa-smile-o',
					],
					'image' => [
						'title' => __( 'Image', 'bdevselement' ),
						'icon'  => 'fa fa-image',
					],
				],
				'default'        => 'icon',
				'toggle'         => false,
				'style_transfer' => true,
			]
		);

		$repeater->add_control(
			'image',
			[
				'type'      => Controls_Manager::MEDIA,
				'label'     => __( 'Offer Image', 'aristocrat-companion' ),
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'type' => 'image'
				]
			]
		);

		$repeater->add_control(
			'icon',
			[
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'condition'   => [
					'type' => 'icon'
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
			'description',
			[
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'label'       => __( 'description', 'aristocrat-companion' ),
				'placeholder' => __( 'Type description here', 'aristocrat-companion' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'button_text',
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

		$repeater->add_control(
			'button_link',
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
			'services',
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

		if ( empty( $settings['services'] ) ) {
			return;
		}
		?>

		<div class="service-area pt-100 pb-70">
			<div class="container">
				<?php if ( $settings['title'] ): ?>
					<div class="row mb-50">
						<div class="col-xl-12">
							<div class="section-title text-center">
								<h3><?php echo esc_html( $settings['title'] ) ?></h3>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row">
					<?php
					foreach ( $settings['services'] as $service ) :
						?>
						<div class="col-xl-4 col-lg-4 col-md-6">
							<div class="service-wrap mb-30">
								<div class="icon">
									<?php if ( $service['type'] == 'image' ): ?>
										<img src="<?php echo $service['image']['url']; ?>">
									<?php endif; ?>
									<?php if ( $service['type'] == 'icon' ): ?>
										<i class="<?php echo $service['icon']['value']; ?>"></i>
									<?php endif; ?>
								</div>
								<div class="content">
									<h4>
										<a href="<?php echo $service['button_link']['url']; ?>">
											<?php echo $service['title']; ?>
										</a>
									</h4>
									<p>
										<?php echo $service['description']; ?>
									</p>
									<?php if ( $service['button_text'] ) : ?>
										<div class="read-more">
											<a href="<?php echo esc_html( $service['button_link']['url'] ) ?>">
												<?php echo esc_html( $service['button_text'] ) ?>
											</a>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
