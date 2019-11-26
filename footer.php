<?php
/**
 * Footer Template
 */

if ( is_active_sidebar( 'footer-sidebar' ) ) :
	?>
	<div id="footer">
		<div class="container">
			<ul>
			<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			</ul>
		</div>
	</div>
	<?php
endif;

?>
<div id="sub-footer">
	<div class="container">
		<div class="sub-footer-left">
			<p>
			<?php
			printf(
				esc_html__( 'Copyright &copy; %1$s, %2$s.', 'usagi' ),
				esc_html( date( 'Y' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);
			echo ' ';
			printf(
				wp_kses_post( __( 'Proudly powered by <a href="%1$s" title="%2$s">%3$s</a>.', 'usagi' ) ),
				esc_url( __( 'https://wordpress.org/', 'usagi' ) ),
				esc_attr__( 'Semantic Personal Publishing Platform', 'usagi' ),
				esc_html__( 'WordPress', 'usagi' )
			);
			echo ' ';
			printf(
				wp_kses_post( __( 'Usagi design by %s.', 'usagi' ) ),
				'<a href="https://www.carmensantoro.it">Carmen Agnese Santoro</a>'
			);
			?>

			</p>
		</div>

		<div class="sub-footer-right">
			<?php
			$footer_menu = array(
				'theme_location' => 'footer-menu',
				'depth' => 1,
			);
			wp_nav_menu( $footer_menu );
		?>
		</div>
	</div>
</div>

</div>

<?php wp_footer(); ?>

</body>
</html>
