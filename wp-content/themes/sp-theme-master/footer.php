<?php

/**
 * The template for displaying the footer
 */
?>

<footer class="footer">
   <div class="footer__nav">
      <nav>
         <?php
         $menuM = wp_nav_menu([
            'theme_location'  => '',
            'menu'            => 'Menu-bottom',
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
         ?>
      </nav>
   </div>
   <div class="footer__blok">
      <div class="container">
         <div class="footer__row">
            <div class="footer__logo"><a href="../"><img src="<?php echo teo_get_image('footer-logo.png') ?>" alt=""></a></div>
            <div class="footer__title"><img src="<?php echo teo_get_image('footer-title.png') ?>" alt=""></div>
            <div class="footer__social">
               <a href="<?php the_field("fb", 8); ?>" target="blanc"><img src="<?php echo teo_get_image('soc-fb.svg') ?>" alt=""></a>
               <a href="<?php the_field("inst", 8); ?>" target="blanc"><img src="<?php echo teo_get_image('soc-inst.svg') ?>" alt=""></a>
               <a href="<?php the_field("vk", 8); ?>" target="blanc"><img src="<?php echo teo_get_image('soc-vk.svg') ?>" alt=""></a>
               <a href="<?php the_field("YT", 8); ?>" target="blanc"><img src="<?php echo teo_get_image('soc-yt.svg') ?>" alt=""></a>
            </div>
         </div>
      </div>
   </div>
   <div class="footer__copyright">© 2020 теоэстетика
   </div>

</footer>


<?php wp_footer(); ?>

</body>

</html>