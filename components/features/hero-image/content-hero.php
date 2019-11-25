<?php
/**
 * The template used for displaying hero content
 *
 * @package usagi
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="usagi-hero">
		<?php the_post_thumbnail( 'usagi-hero' ); ?>
	</div>
<?php endif; ?>
