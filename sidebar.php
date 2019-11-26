<?php
/**
 * Sidebar Template
 */

?>
<ul id="sidebar">
	<?php
	if ( ! dynamic_sidebar( 'sidebar' ) ) :
		?>
		<li id="recent" class="widget-container">
			<h3 class="widget-title"><?php esc_html_e( 'Recent Posts', 'usagi' ); ?></h3>
			<ul><?php wp_get_archives( 'type=postbypost&limit=5' ); ?></ul>
		</li>

		<li id="archives" class="widget-container">
			<h3 class="widget-title"><?php esc_html_e( 'Archives', 'usagi' ); ?></h3>
			<ul><?php wp_get_archives( 'type=monthly' ); ?></ul>
		</li>

		<li id="meta" class="widget-container">
			<h3 class="widget-title"><?php esc_html_e( 'Meta', 'usagi' ); ?></h3>
			<ul>
				<?php
				wp_register();
				?>
				<li>
					<?php wp_loginout(); ?>
				</li>
				<?php
				wp_meta();
				?>
			</ul>
		</li>
		<?php
	endif;
	?>
</ul>
