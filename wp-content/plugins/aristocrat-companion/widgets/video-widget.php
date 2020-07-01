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
class Video extends \Elementor\Widget_Base {

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
		return 'Video';
	}

	/**
	 * Get widget Video.
	 *
	 * Retrieve oEmbed widget Video.
	 *
	 * @return string Widget Video.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Video', 'aristocrat-companion' );
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
				'label' => __( 'Video', 'aristocrat-companion' ),
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
			'section_video',
			[
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'label'       => __( 'Video', 'aristocrat-companion' ),
				'placeholder' => __( 'Type Video here', 'aristocrat-companion' ),
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

		<?php if ( $settings['section_video'] ) : ?>
		<div class="video-area bg-fix" style="background-image: url(<?php print $image; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="video-play text-center">
							<a href="javascript:void(0)" id="video-popup">
								<i class="fas fa-play"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="vidBox">
			<div id="videCont">
				<video id="demo" controls>
					<source src="<?php echo $settings['section_video']; ?>" type="video/mp4">
				</video>
			</div>
		</div>
		<?php endif; ?>
		<?php
	}
}
