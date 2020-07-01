<?php
/**
 * The searchform.php template.
 * /*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */

$moters_aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<div class="search-form-widget">
	<form role="search" <?php echo $moters_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>
	      method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="search-field"
		       placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'moters' ); ?>"
		       value="<?php echo get_search_query(); ?>" name="s"/>
		<button type="submit"><i class="fas fa-search"></i></button>
	</form>
</div>

