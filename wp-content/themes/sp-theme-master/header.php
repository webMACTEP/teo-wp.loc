<?php

/**
 * The header for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<script>
		window.onscroll = function() {
			var scrolled = window.pageYOffset || document.documentElement.scrollTop;
			var o = document.getElementById('sticky');
			if (scrolled > 170) o.setAttribute('class', 'fix');
			else o.setAttribute('class', 'not_fix');
		}
	</script>

	<header class="header" id="header">
		<div class="container">
			<div class="header__blok">
				<div class="header__logo-01"><a href="../"><img src="<?php echo teo_get_image('logo_01.svg') ?>" alt=""></a></div>
				<div class="header__logo-title"><img src="<?php echo teo_get_image('logo_title.svg') ?>" alt=""></div>
				<div class="header__text"><?php the_field("fond", 8); ?></div>
			</div>
		</div>
	</header>
	<nav class="main-menu">
		<div id="sticky">
			<?php
			$menuM = wp_nav_menu([
				'theme_location'  => '',
				'menu'            => 'Menu-top',
				'container'       => 'false',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '',
			]);
			?></div>
	</nav>