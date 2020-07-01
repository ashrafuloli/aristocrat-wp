<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aristocrat
 */

?>
<?php
$aristocrat_site_logo = theme_option( 'about-widget-logo' );
?>
<footer class="footer-area bg-off-white">
	<div class="footer-area-wrap">
		<?php if (theme_option('footer-widget')): ?>
		<div class="footer-top pt-80 pb-30">
			<div class="container">
				<div class="row footer-wid-border-wrap">
					<div class="col-xl-4 col-lg-4 footer-wid-border">
						<div class="footer-widget about-widget">
							<div class="w-logo">
								<?php if ($aristocrat_site_logo): ?>
								<a href="<?php print esc_url( home_url( '/' ) ); ?>">
									<img src="<?php print esc_url( $aristocrat_site_logo['url'] ); ?>"
									     alt="<?php print esc_attr( 'logo', 'aristocrat-ltd' ); ?>"/>
								</a>
								<?php endif; ?>
							</div>
							<p>
								<?php echo theme_option( 'about-widget-content' ); ?>
							</p>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 footer-wid-border">
						<?php
						if ( is_active_sidebar( 'footer-1' ) ) {
							dynamic_sidebar( 'footer-1' );
						}
						?>
					</div>
					<div class="col-xl-4 col-lg-4 footer-wid-border">
						<?php
						if ( is_active_sidebar( 'footer-2' ) ) {
							dynamic_sidebar( 'footer-2' );
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-border-wrap">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 footer-bottom-wrap"></div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ( theme_option( 'copyright' ) ): ?>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-xl-12">
							<p class="copyright">
								<?php echo theme_option( 'copyright' ); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</footer>

<span id="scrollUp"><i class="far fa-angle-up"></i></span>

<?php wp_footer(); ?>

</body>
</html>
