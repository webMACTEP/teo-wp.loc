<?php
/*
 * The template for displaying all pages
 */

get_header();
$sp_obj = new SpClass();

while (have_posts()) : the_post(); ?>

	<div class="page">


		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	</div>

<?php endwhile;

get_sidebar();
get_footer();
