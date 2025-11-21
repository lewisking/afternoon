<?php

/**
 * Template Name: Home
 */
get_header();
?>

<div class="relative">
  <img src="<?= esc_url(afternoon_image_uri('introduction/background.jpg')); ?>" alt="" fetchpriority="high" class="select-none w-full h-auto inset-0 absolute object-cover md:block hidden" />
  <?php get_template_part('template-parts/navigation') ?>
  <main class="relative md:pt-[92px]">
    <div class="max-w-screen-xl mx-auto px-5 md:px-8 lg:px-10">
      <?php get_template_part('template-parts/sections/hero'); ?>
      <?php get_template_part('template-parts/sections/features'); ?>
    </div>

    <?php get_template_part('template-parts/sections/pricing'); ?>
    <?php get_template_part('template-parts/sections/about'); ?>
    <?php get_template_part('template-parts/sections/faq'); ?>
    <?php get_template_part('template-parts/sections/team'); ?>

    <?php get_template_part('template-parts/footer') ?>

  </main>
</div>

<?php get_footer(); ?>