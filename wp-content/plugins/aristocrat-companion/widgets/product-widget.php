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
class Product extends \Elementor\Widget_Base {

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
		return 'Product';
	}

	/**
	 * Get widget Product.
	 *
	 * Retrieve oEmbed widget Product.
	 *
	 * @return string Widget Product.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Product', 'aristocrat-companion' );
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
				'label' => __( 'Product', 'aristocrat-companion' ),
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
		<div class="product-area pt-100 pb-100">
			<div class="container">
				<div class="row justify-content-center mb-50">
					<div class="col-xl-8 col-lg-10">
						<div class="section-title text-center">
							<h3><?php echo $settings['title']; ?></h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="product-wrap">
							<div class="thumb">
								<img src="assets/img/product/product-1.jpg" alt="product">
								<div class="product-link">
									<a href="gallery-details.html">
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
								<div class="product-view">
									<a href="#">Quick View</a>
								</div>
							</div>
							<div class="content">
								<span>brand</span>
								<h4><a href="#">kid bag and mini restaurant aprone</a></h4>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="product-wrap">
							<div class="thumb">
								<img src="assets/img/product/product-2.jpg" alt="product">
								<div class="product-link">
									<a href="gallery-details.html">
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
								<div class="product-view">
									<a href="#">Quick View</a>
								</div>
							</div>
							<div class="content">
								<span>brand</span>
								<h4><a href="#">kid bag and mini restaurant aprone</a></h4>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="product-wrap">
							<div class="thumb">
								<img src="assets/img/product/product-3.jpg" alt="product">
								<div class="product-link">
									<a href="gallery-details.html">
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
								<div class="product-view">
									<a href="#">Quick View</a>
								</div>
							</div>
							<div class="content">
								<span>brand</span>
								<h4><a href="#">kid bag and mini restaurant aprone</a></h4>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="product-wrap">
							<div class="thumb">
								<img src="assets/img/product/product-1.jpg" alt="product">
								<div class="product-link">
									<a href="gallery-details.html">
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
								<div class="product-view">
									<a href="#">Quick View</a>
								</div>
							</div>
							<div class="content">
								<span>brand</span>
								<h4><a href="#">kid bag and mini restaurant aprone</a></h4>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="product-wrap">
							<div class="thumb">
								<img src="assets/img/product/product-2.jpg" alt="product">
								<div class="product-link">
									<a href="gallery-details.html">
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
								<div class="product-view">
									<a href="#">Quick View</a>
								</div>
							</div>
							<div class="content">
								<span>brand</span>
								<h4><a href="#">kid bag and mini restaurant aprone</a></h4>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="product-wrap">
							<div class="thumb">
								<img src="assets/img/product/product-3.jpg" alt="product">
								<div class="product-link">
									<a href="gallery-details.html">
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
								<div class="product-view">
									<a href="#">Quick View</a>
								</div>
							</div>
							<div class="content">
								<span>brand</span>
								<h4><a href="#">kid bag and mini restaurant aprone</a></h4>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="product-wrap">
							<div class="thumb">
								<img src="assets/img/product/product-1.jpg" alt="product">
								<div class="product-link">
									<a href="gallery-details.html">
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
								<div class="product-view">
									<a href="#">Quick View</a>
								</div>
							</div>
							<div class="content">
								<span>brand</span>
								<h4><a href="#">kid bag and mini restaurant aprone</a></h4>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="product-wrap">
							<div class="thumb">
								<img src="assets/img/product/product-2.jpg" alt="product">
								<div class="product-link">
									<a href="gallery-details.html">
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
								<div class="product-view">
									<a href="#">Quick View</a>
								</div>
							</div>
							<div class="content">
								<span>brand</span>
								<h4><a href="#">kid bag and mini restaurant aprone</a></h4>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="product-wrap">
							<div class="thumb">
								<img src="assets/img/product/product-3.jpg" alt="product">
								<div class="product-link">
									<a href="gallery-details.html">
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
								<div class="product-view">
									<a href="#">Quick View</a>
								</div>
							</div>
							<div class="content">
								<span>brand</span>
								<h4><a href="#">kid bag and mini restaurant aprone</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
