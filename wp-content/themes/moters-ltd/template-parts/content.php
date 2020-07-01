<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
?>

<?php if(!is_single()): ?>
	<div class="blog-box-wrap mb-80">
		<div class="blog-box-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
				?>
			</a>
		</div>
		<div class="blog-box-details">
			<div class="blog-box-meta">
				<div class="blog-meta-date">
					<?php the_time( 'd F, Y' ); ?>
				</div>
				<div class="blog-meta-user">
					<i class="fal fa-user"></i> BY <?php echo esc_html( get_the_author() ) ?>
				</div>
			</div>
			<div class="blog-box-title">
				<h3>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
			</div>
			<div class="blog-box-content">
				<p>
					<?php the_excerpt(); ?>
				</p>
				<a href="<?php the_permalink(); ?>" class="read-more-btn">
					<i class="far fa-arrow-right"></i> VIEW MORE
				</a>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if(is_single()): ?>
	<div class="blog-single-details">
		<div class="blog-box-thumb">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			?>
		</div>
		<div class="blog-box-details">
			<div class="blog-box-meta">
				<div class="blog-meta-date">
					<?php the_time( 'd F, Y' ); ?>
				</div>
				<div class="blog-meta-user">
					<i class="fal fa-user"></i> <?php echo esc_html( get_the_author() ) ?>
				</div>
			</div>
			<div class="blog-box-title">
				<h3>
					<?php the_title(); ?>
				</h3>
			</div>
			<div class="blog-box-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>