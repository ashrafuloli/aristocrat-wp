<?php

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

// header area
function header_area() {
	?>
	<div class="header-area">
		<?php
			if (theme_option('top-bar')){
				header_top_bar();
			}
		?>
		<div class="menu-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-3 col-lg-3 col-md-4 col-6">
						<div class="logo">
							<?php aristocrat_header_logo(); ?>
						</div>
					</div>
					<div class="col-xl-9 col-lg-9 col-md-8 col-6 text-right">
						<?php aristocrat_header_menu(); ?>
						<div class="hamburger-menu">
							<a href="javascript:void(0);">
								<svg width="21px" height="21px">
									<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M17.883,12.750 C16.696,12.750 15.737,11.790 15.737,10.603 C15.737,9.417 16.696,8.458 17.883,8.458 C19.070,8.458 20.029,9.417 20.029,10.603 C20.029,11.790 19.070,12.750 17.883,12.750 ZM17.883,4.881 C16.696,4.881 15.737,3.921 15.737,2.735 C15.737,1.548 16.696,0.589 17.883,0.589 C19.070,0.589 20.029,1.548 20.029,2.735 C20.029,3.921 19.070,4.881 17.883,4.881 ZM10.014,20.618 C8.828,20.618 7.868,19.659 7.868,18.472 C7.868,17.285 8.828,16.326 10.014,16.326 C11.201,16.326 12.160,17.285 12.160,18.472 C12.160,19.659 11.201,20.618 10.014,20.618 ZM10.014,12.750 C8.828,12.750 7.868,11.790 7.868,10.603 C7.868,9.417 8.828,8.458 10.014,8.458 C11.201,8.458 12.160,9.417 12.160,10.603 C12.160,11.790 11.201,12.750 10.014,12.750 ZM10.014,4.881 C8.828,4.881 7.868,3.921 7.868,2.735 C7.868,1.548 8.828,0.589 10.014,0.589 C11.201,0.589 12.160,1.548 12.160,2.735 C12.160,3.921 11.201,4.881 10.014,4.881 ZM2.146,20.618 C0.959,20.618 -0.000,19.659 -0.000,18.472 C-0.000,17.285 0.959,16.326 2.146,16.326 C3.333,16.326 4.292,17.285 4.292,18.472 C4.292,19.659 3.333,20.618 2.146,20.618 ZM2.146,12.750 C0.959,12.750 -0.000,11.790 -0.000,10.603 C-0.000,9.417 0.959,8.458 2.146,8.458 C3.333,8.458 4.292,9.417 4.292,10.603 C4.292,11.790 3.333,12.750 2.146,12.750 ZM2.146,4.881 C0.959,4.881 -0.000,3.921 -0.000,2.735 C-0.000,1.548 0.959,0.589 2.146,0.589 C3.333,0.589 4.292,1.548 4.292,2.735 C4.292,3.921 3.333,4.881 2.146,4.881 ZM17.883,16.326 C19.070,16.326 20.029,17.285 20.029,18.472 C20.029,19.659 19.070,20.618 17.883,20.618 C16.696,20.618 15.737,19.659 15.737,18.472 C15.737,17.285 16.696,16.326 17.883,16.326 Z"></path>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php

}

add_action( 'header-style', 'header_area' );

// Top Bar
function header_top_bar() {
	?>
	<div class="header-top d-none d-xl-block d-lg-block">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-xl-6 col-lg-6 offset-xl-6 offset-lg-6 text-right">
					<?php if ( theme_option( 'top_email' ) ): ?>
						<div class="head-info">
							<a href="mailto:<?php echo theme_option( 'top_email' ); ?>">
								<i class="fas fa-envelope"></i>
								<?php echo theme_option( 'top_email' ); ?>
							</a>
						</div>
					<?php endif; ?>
					<?php if ( theme_option( 'top_phone' ) ): ?>
						<div class="head-info">
							<a href="tel:<?php echo theme_option( 'top_phone' ); ?>">
								<i class="fas fa-phone-alt"></i>
								<?php echo theme_option( 'top_phone' ); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<!--    Slide Bar Start   -->
	<aside class="slide-bar">
		<div class="close-mobile-menu">
			<a href="javascript:void(0);"><i class="fas fa-times"></i></a>
		</div>
		<nav class="side-mobile-menu">
			<?php aristocrat_mobile_menu(); ?>
		</nav>
	</aside>
	<div class="body-overlay"></div>
	<!--    Slide Bar End    -->
	<?php
}

// header logo
function aristocrat_header_logo() {
	$aristocrat_logo      = get_template_directory_uri() . '/assets/img/logo.png';
	$aristocrat_site_logo = get_theme_mod( 'logo', $aristocrat_logo );

	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		?>
		<a href="<?php print esc_url( home_url( '/' ) ); ?>">
			<img src="<?php print esc_url( $aristocrat_site_logo ); ?>"
			     alt="<?php print esc_attr( 'logo', 'aristocrat-ltd' ); ?>"/>
		</a>
		<?php
	}
}

// header menu
function aristocrat_header_menu() {
	wp_nav_menu( array(
		'theme_location'   => 'main-menu',
		'container'        => 'div',
		'container_class'  => 'main-menu'
	) );
}

function aristocrat_mobile_menu() { ?>
	<?php
	$glee_menu = wp_nav_menu( array(
		'theme_location' => 'main-menu',
		'menu_class'     => '',
		'container'      => '',
		'menu_id'        => 'mobile-menu-active',
		'echo'           => false
	) );

	$glee_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-dropdown", $glee_menu );
	echo wp_kses_post( $glee_menu );
	?>
	<?php
}


// aristocrat posts pagination
function aristocrat_pagination( $echo = true ) {
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	$pages = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type'  => 'array',
			'prev_next'   => true,
			'prev_text'    => __('<i class="far fa-angle-left"></i>'),
			'next_text'    => __('<i class="far fa-angle-right"></i>'),
		)
	);

	if( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination = '<ul class="blog-pagination">';

		foreach ( $pages as $page ) {
			$pagination .= "<li>$page</li>";
		}

		$pagination .= '</ul>';

		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
}