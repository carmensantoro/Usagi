<?php
/**
 * 404 Page Template *
 */

get_header();
get_template_part( 'part-title' );

?>
<div class="container" id="main-content">
	<div id="page-container" class="with-sidebar">
		<h2><?php esc_html_e( 'Page Not Found', 'usagi' ); ?></h2>
		<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'usagi' ); ?></p>
		<p><?php esc_html_e( 'Maybe a search will help ?', 'usagi' ); ?></p>
		<p><?php get_search_form(); ?></p>
	</div>

	<div id="sidebar-container"><ul id="sidebar">
		<?php get_sidebar(); ?>
	</ul></div>

</div>
<?php

get_footer();
