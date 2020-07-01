<div class="footer-area">
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ): ?>
		<div class="footer-top pt-80 pb-50">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-1' ) ): ?>
						<div class="col-xl-4 col-lg-4 col-md-6">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-2' ) ): ?>
						<div class="col-xl-4 col-lg-4 col-md-6">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-3' ) ): ?>
						<div class="col-xl-4 col-lg-4 col-md-6">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 text-center">
					<p class="copy-right">
						<?php echo theme_option( 'copyright' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>