<?php
/**
 * Hero/Introduction Section
 */

$intro = afternoon_get_acf_field('introduction', []);
$intro_heading_1 = isset($intro['heading_part_#1']) ? esc_html($intro['heading_part_#1']) : '';
$intro_heading_2 = isset($intro['heading_part_#2']) ? esc_html($intro['heading_part_#2']) : '';
$intro_subheading = isset($intro['subheading']) ? esc_html($intro['subheading']) : '';
$intro_free_trial = isset($intro['free_trial_button']) ? $intro['free_trial_button'] : [];
$intro_talk_button = isset($intro['talk_with_us_button']) ? $intro['talk_with_us_button'] : [];
?>

<section class="pt-32 md:py-36">
  <div class="md:w-2/3 max-w-[692px] p-6 md:p-8 lg:py-11 lg:px-8 bg-white rounded-32 border border-black/10 flex flex-col gap-5">
    <h1 class="text-[32px]/[38px] md:text-[48px]/[60px] lg:text-[52px]/[60px] text-brand-orange font-bold tracking-tighter-4xl">
      <?= $intro_heading_1; ?>&nbsp;<span class="text-brand-black"><?= $intro_heading_2; ?></span>
    </h1>
    <h2 class="max-w-[420px] text-brand-black text-xl/[125%] md:text-2xl/[125%] font-semibold"><?= $intro_subheading; ?></h2>
  </div>
  <div class="mt-3 max-w-[574px] p-3 md:p-6 bg-white rounded-full border border-black/10 flex gap-1.5">

    <?= afternoon_render_button($intro_free_trial, 'primary', 'flex-1'); ?>

    <?php afternoon_svg('divider-mobile', 'w-[26px] h-[42px] md:hidden'); ?>
    <?php afternoon_svg('divider-tablet', 'w-[31px] h-[60px] hidden md:block'); ?>
    <?php afternoon_svg('divider-desktop', 'md:block hidden'); ?>

    <?= afternoon_render_button($intro_talk_button, 'secondary', 'flex-1 md:flex-none'); ?>

  </div>
</section>

<div class="md:hidden -mx-5 w-screen max-w-none aspect-[393/314] relative">
  <img width="393" height="314" src="<?= esc_url(afternoon_image_uri('introduction/background-mobile.jpg')); ?>" alt="" fetchpriority="high" class="inset-0 absolute object-cover w-full h-auto" />
</div>
