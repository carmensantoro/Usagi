<?php
/**
* Header Template
*/
?><!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open() ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div id="main-wrap">
		<div id="header-wrap">
			<div id="tophead-wrap">
				<div class="container">
					<div class="tophead">
						<?php echo get_search_form(); ?>
					</div>
				</div>
			</div>

			<div id="header">
				<div class="container">

					<a href="<?php echo esc_url( home_url() ); ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
						<h1 class="site-title"><img style="height: 50px; width: 50px;" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon.png"></h1>
						<h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1>
					</a>
					<?php

					if ( get_bloginfo( 'description' ) ) :
						?>
						<div id="tagline"><?php bloginfo( 'description' ); ?></div>
						<?php
					endif;

					?>
				</div>
			</div>

			<div id="nav-wrap">
				<div id="navbar" class="container">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>',
						)
					);
					usagi_dropdown_nav_menu();
					?>
				</div>
			</div>
		</div>
		<?php

		if ( get_custom_header()->url ) :

			if (
				( is_front_page() && 'off' !== get_theme_mod( 'home_header_image' ) )
				|| ( is_page() && ! is_front_page() && 'off' !== get_theme_mod( 'pages_header_image' ) )
				|| ( is_single() && 'off' !== get_theme_mod( 'single_header_image' ) )
				|| ( ! is_front_page() && ! is_singular() && 'off' !== get_theme_mod( 'blog_header_image' ) )
				|| ( is_404() )
				) :

				?>
				<div id="header-image" class="container">
					<img src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt='' />
				</div>
				<?php

			endif;
		endif;
