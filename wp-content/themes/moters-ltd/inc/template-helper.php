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
	<header class="header-area">
		<?php header_top_bar(); ?>
		<div class="logo-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-3 col-lg-4 d-none d-xl-block d-lg-block">
						<div class="site-logo">
							<?php moters_header_logo(); ?>
						</div>
					</div>
					<div class="col-xl-6 col-lg-4 col-md-8 col-7 text-center">
						<?php 
	
							$gallery = theme_option( 'logo-gallery' );
							$gallery_ids = explode( ',', $gallery );
							foreach ( $gallery_ids as $gallery_id ) {
							  $attachment = wp_get_attachment_image_src( $gallery_id, 'thumbnail' );
								echo '<div class="header-gallery">';
								echo '<img src="'. esc_url( $attachment[0] ) .'"/>';
								echo '</div>';
							}
						
						?>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-4 col-5">
						<div class="header-info">
							<?php if ( theme_option( 'opening-hours' ) ): ?>
								<span>opening hours</span>
								<span class="text-danger"><?php echo theme_option( 'opening-hours' ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-menu">
			<div class="container">
				<div class="row align-items-center">
					<div class="d-block d-xl-none d-lg-none col-md-4">
						<div class="site-logo">
							<?php moters_header_logo(); ?>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-8">
						<?php moters_header_menu(); ?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php

}

add_action( 'header-style', 'header_area' );

// Top Bar
function header_top_bar() {
	?>
	<div class="top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-4 col-lg-4 d-none d-xl-block d-lg-block">
					<div class="social-icon">
						<?php if ( theme_option( 'facebook' ) ): ?>
							<a href="<?php echo theme_option( 'facebook' ); ?>" class="facebook">
								<i class="fab fa-facebook-f"></i>
							</a>
						<?php endif; ?>
						<?php if ( theme_option( 'twitter' ) ): ?>
							<a href="<?php echo theme_option( 'twitter' ); ?>" class="twitter">
								<i class="fab fa-twitter"></i>
							</a>
						<?php endif; ?>
						<?php if ( theme_option( 'pinterest' ) ): ?>
							<a href="<?php echo theme_option( 'pinterest' ); ?>" class="pinterest">
								<i class="fab fa-pinterest-p"></i>
							</a>
						<?php endif; ?>
						<?php if ( theme_option( 'instagram' ) ): ?>
							<a href="<?php echo theme_option( 'instagram' ); ?>" class="instagram">
								<i class="fab fa-instagram"></i>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-6 text-center">
					<div class="topbar-info">
						<?php if ( theme_option( 'helpline' ) ): ?>
							<a href="tel:<?php echo theme_option( 'helpline' ); ?>">
								helpline: <?php echo theme_option( 'helpline' ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-6 text-right">
					<div class="topbar-info">
						<?php if ( theme_option( 'appointment' ) ): ?>
							<a href="tel:<?php echo theme_option( 'appointment' ); ?>">
								appointment: <?php echo theme_option( 'appointment' ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

// header logo
function moters_header_logo() {
	$moters_logo      = get_template_directory_uri() . '/assets/img/logo.png';
	$moters_site_logo = get_theme_mod( 'logo', $moters_logo );

	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		?>
		<a href="<?php print esc_url( home_url( '/' ) ); ?>">
			<img src="<?php print esc_url( $moters_site_logo ); ?>"
			     alt="<?php print esc_attr( 'logo', 'moters-ltd' ); ?>"/>
		</a>
		<?php
	}
}

// header menu
function moters_header_menu() {
	wp_nav_menu( array(
		'theme_location' => 'main-menu',
	) );
}

// moters posts pagination
function moters_pagination( $echo = true ) {
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