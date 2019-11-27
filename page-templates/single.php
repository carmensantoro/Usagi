<?php
/**
 * Single Post Template
 * Template Name: Singolo post con sidebar
 */

get_header();
get_template_part( 'part-title' );

?>
<div class="container" id="main-content">
	<div id="page-container" class="with-sidebar">
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
					<?php

					/* Post Metadata */
					?>
					<div class="postmetadata">
						<?php

						/* Meta: entry title
						 * (Not displayed on the front end, but needed for valid structured data
						 * as the title is displayed outside of the hentry container in this
						 * template) */
						?>
						<span class="entry-title hatom-feed-info"><?php the_title(); ?></span>
						<?php

						/* Meta: Date */
						?>
						<span class="meta-date post-date updated"><i class="fa fa-calendar"></i><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php the_time( get_option( 'date_format' ) ); ?>
						</a></span>
						<?php

						/* Meta: Author */
						$author = sprintf(
							'<a class="fn" href="%1$s" title="%2$s" rel="author">%3$s</a>',
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
							// Translators: %s is the author's name
							esc_attr( sprintf( __( 'View all posts by %s', 'usagi' ), get_the_author() ) ),
							get_the_author()
						);
						?>
						<span class="meta-author author vcard"><i class="fa fa-user"></i><?php echo wp_kses_post( $author ); ?></span>
						<?php

						/* Meta: Category */
						?>
						<div class="meta-category">
							<span class="category-icon" title="<?php esc_attr_e( 'Category', 'usagi' ); ?>"><i class="fa fa-tag"></i></span>
							<?php
							foreach ( get_the_category() as $category ) :
								echo '<a href="', esc_url( get_category_link( $category->term_id ) ), '">', esc_html( $category->cat_name ), '</a>';
							endforeach;
							?>
						</div>
						<?php

						/* Meta: Comments */
						if ( ( comments_open() || '0' !== get_comments_number() ) ) :
							?>
							<span class="meta-comments"><i class="fa fa-comment"></i>
								<?php
								comments_popup_link(
									__( '0 Comment', 'usagi' ),
									__( '1 Comment', 'usagi' ),
									__( '% Comments', 'usagi' ),
									'',
									__( 'Comments Off', 'usagi' )
								);
								?>
							</span>
							<?php
						endif;

						/* Meta: Tags */
						if ( has_tag() ) :
							the_tags( '<div class="meta-tags"><span class="tags-icon"><i class="fa fa-tags"></i></span>', '', '</div>' );
						endif;

						/* Edit link (only for logged in users allowed to edit post) */
						edit_post_link(
							__( 'Edit', 'usagi' ),
							'<span class="editlink"><i class="fa fa-pencil"></i>',
							'</span>'
						);

						?>
					</div>
					<?php

					/* Post thumbnail (Featured Image) */
					if ( '' !== get_the_post_thumbnail() ) : // As recommended from the WP codex, has_post_thumbnail() is not reliable
						?>
						<div class="thumbnail">
							<?php
							the_post_thumbnail(
								'full',
								array(
									'class' => 'scale-with-grid',
								)
							);
							?>
						</div>
						<?php
					endif;

					?>
					<div class="post-contents entry-content">
						<?php

						the_content();

						?>
						<div class="clear"></div>
						<?php

						wp_link_pages(
							array(
								'before'           => '<br class="clear" /><div class="paged_nav"><span>' . __( 'Pages:', 'usagi' ) . '</span>',
								'after'            => '</div>',
								'link_before'      => '<span>',
								'link_after'       => '</span>',
								'next_or_number'   => 'number',
								'nextpagelink'     => __( 'Next page', 'usagi' ),
								'previouspagelink' => __( 'Previous page', 'usagi' ),
								'pagelink'         => '%',
								'echo'             => 1,
							)
						);

						?>
					</div>
					<br class="clear" />
				</div>
				<?php

				usagi_article_nav();

				// Display comments section only if comments are open or if there are comments already.
				if ( comments_open() || '0' !== get_comments_number() ) :
					?>
					<hr />
					<div class="comments">
						<?php comments_template( '', true ); ?>
					</div>
					<?php
					usagi_article_nav();
				endif;

			endwhile;

		else : // Empty loop (this should never happen!)

			?>
			<h2><?php esc_html_e( 'Not Found', 'usagi' ); ?></h2>
			<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'usagi' ); ?></p>
			<?php

		endif;

	?>
	</div>

	<div id="sidebar-container">
		<?php get_sidebar(); ?>
	</div>

</div>
<?php

get_footer();
