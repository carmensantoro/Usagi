<?php
/**
 * Main Index
 */

get_header();

get_template_part( 'part-title' );

?>
<div id="main-content" class="container">
	<div id="page-container" class="with-sidebar">
		<h1>Dove trovarci?</h1>
		<?php echo do_shortcode('[ultimate_maps id="1"]')?>
		</div>
	</div>

	<div id="sidebar-container">
		<?php get_sidebar( 'sidebar' ); ?>
	</div>

</div>
<?php

get_footer();
