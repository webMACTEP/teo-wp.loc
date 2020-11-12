<?php
/*
Template Name: Шаблон для главной
*/

get_header(); ?>

<section class="intro">
	<video data-src="<?php echo teo_get_image('rolik5.webm') ?>" class="resize-element" autoplay loop muted playsinline width="100%" height="100%">
		<source src="<?php echo teo_get_image('rolik5.mp4') ?>" type="video/mp4">
		<source src="<?php echo teo_get_image('rolik5.webm') ?>" type="video/webm">
	</video>
	<div class="intro__bottom"></div>
</section>
<section class="about">
	<div class="container">
		<div class="about__title"><a href="<?php the_field("abautEstetik", 8); ?>"><?php the_field("title01", 8); ?></a></div>
		<div class="about__item">
			<a href="<?php the_field("abautEstetik", 8); ?>">
				<p><?php the_field("text01", 8); ?></p>
			</a>
		</div>
	</div>
	<div class="about__img"></div>
	<div class="about__bg"></div>
</section>
<section class="proects">
	<div class="container">
		<div class="proects__title"><a href="../proekty/"><?php the_field("proects-title", 8); ?></a></div>
		<div class="proects__items">
			<div class="proects__item">
				<div class="proects__item-title"><?php the_field("ptitle01", 8); ?></div>
				<a href="<?php the_field("plink_1", 8); ?>"><img src="<?php the_field("pimg01", 8); ?>" alt=""></a>
			</div>
			<div class="proects__item">
				<div class="proects__item-title"><?php the_field("ptitle02", 8); ?></div>
				<a href="<?php the_field("plink_2", 8); ?>"><img src="<?php the_field("pimg02", 8); ?>" alt=""></a>
			</div>
			<div class="proects__item">
				<div class="proects__item-title"><?php the_field("ptitle03", 8); ?></div>
				<a href="<?php the_field("plink_3", 8); ?>"><img src="<?php the_field("pimg03", 8); ?>" alt=""></a>
			</div>
			<div class="proects__item">
				<div class="proects__item-title"><?php the_field("ptitle04", 8); ?></div>
				<a href="<?php the_field("plink_4", 8); ?>"><img src="<?php the_field("pimg04", 8); ?>" alt=""></a>
			</div>
		</div>
	</div>

</section>
<section class="about-fond">
	<div class="container">
		<div class="about-fond__row">
			<div class="about-fond__left"><a href="../about/"><?php the_field("aboutTitle", 8); ?></a></div>
			<div class="about-fond__right"><?php the_field("aboutText", 8); ?></div>
		</div>
	</div>
	<div class="about-fond__bg"></div>
</section>
<section class="news">
	<div class="container">
		<div class="news__title"><a href="../news/"><?php the_field("newsTitle", 8); ?></a></div>
		<div class="news__blok">
			<?php
			$sp_obj = new SpClass();

			while (have_posts()) : the_post(); ?>

				<div class="page">


					<div class="entry-content">
						<?php the_content(); ?>
					</div>

				</div>

			<?php endwhile; ?>

			<div class="news__item">
				<!-- <a href="<?php the_field("nLink01", 8); ?>">
					<div class="news__item-title"><?php the_field("nTitle01", 8); ?></div>
					<div class="news__item-text"><?php the_field("nText01", 8); ?></div>
				</a> -->
				<div class="news__item-img"><img src="<?php the_field("nImg01", 8); ?>" alt=""></div>
			</div>
			<div class="news__item">
				<!-- <a href="<?php the_field("nLink02", 8); ?>">
					<div class="news__item-title"><?php the_field("nTitle02", 8); ?></div>
					<div class="news__item-text"><?php the_field("nText02", 8); ?></div>
				</a> -->
				<div class="news__item-img"><img src="<?php the_field("nImg02", 8); ?>" alt=""></div>
			</div>
			<div class="news__item">
				<!-- <a href="<?php the_field("nLink03", 8); ?>">
					<div class="news__item-title"><?php the_field("nTitle03", 8); ?></div>
					<div class="news__item-text"><?php the_field("nText03", 8); ?></div>
				</a> -->
				<div class="news__item-img"><img src="<?php the_field("nImg03", 8); ?>" alt=""></div>
			</div>
		</div>
	</div>
	<div class="news__bg"></div>
</section>
<section class="media">
	<div class="container">
		<div class="media__row">
			<div class="media__title"><a href="../media/"><?php the_field("mediaTitle", 8); ?></a></div>
			<div class="media__text-blok">
				<div class="media__text-title"><?php the_field("mediaSubtitle", 8); ?></div>
				<div class="media__item"><?php the_field("mediaText", 8); ?></div>
			</div>
			<div class="media__player"><?php the_field("rolik", 8); ?></div>
		</div>
	</div>
</section>
<?php
get_footer();
