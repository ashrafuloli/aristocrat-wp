<?php get_header(); ?>
	<div class="blog-area pt-100 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8">
					<div class="blog-box-wrapper">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;
							moters_pagination();
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

