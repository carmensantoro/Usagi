<?php
/**
 * Page Title & Breadcrumbs
 */

$usagi_page_title = '';

if ( is_singular() ) :

	$usagi_page_title = get_the_title();

else :

	/* 404 ERROR CONDITIONAL TITLE */
	if ( is_404() ) :
		$usagi_page_title = __( '404: Page Not Found', 'usagi' );
	endif;

	/* SEARCH CONDITIONAL TITLE */
	if ( is_search() ) :
		// Translators: %s is the search term.
		$usagi_page_title = sprintf( __( 'Search Results for "%s"', 'usagi' ), get_search_query() );
	endif;

	/* ARCHIVE CONDITIONAL TITLE */
	if ( is_archive() ) :
		$usagi_page_title = get_the_archive_title();
	endif;

	/* DEFAULT BLOG INDEX TITLE */
	if ( is_home() && ! is_front_page() ) :
		/* If the blog index is not the front page
		 * then use the "posts page" (page_for_posts) title */
		$usagi_page_for_posts = get_option( 'page_for_posts' );
		$usagi_page_title = get_the_title( $usagi_page_for_posts );
	endif;

endif;

if ( $usagi_page_title ) :

	?>
	<div id="page-title">
		<div class="container">
			<?php
			if ( ! is_front_page() ) :
				?>
				<div id="breadcrumbs">
					<?php usagi_breadcrumbs(); ?>
				</div>
				<?php
			endif;
			?>
			<h1><?php echo esc_html( $usagi_page_title ); ?></h1>
		</div>
	</div>
	<?php

endif;
