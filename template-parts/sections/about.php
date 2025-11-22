<?php
/**
 * About Section
 */

$about = afternoon_get_acf_field('about', []);
$about_title = isset($about['title']) ? esc_html($about['title']) : '';
$about_subtitle = isset($about['subtitle']) ? esc_html($about['subtitle']) : '';
$about_description = isset($about['description']) ? wp_kses_post($about['description']) : '';
$about_free_trial = isset($about['free_trial_button']) ? $about['free_trial_button'] : [];
$about_talk_button = isset($about['talk_with_us_button']) ? $about['talk_with_us_button'] : [];
?>

<section id="about" class="-mt-12 md:-mt-72 pt-12 md:pt-72">
  <div class="max-w-screen-xl mx-auto px-5 md:px-10 relative z-10">
    <div class=" relative overflow-hidden bg-brand-orange p-7 md:p-12 rounded-52">
      <img src="<?= get_template_directory_uri() ?>/images/generic-background.jpg" alt="" class="absolute top-0 left-0 w-full h-full object-cover" />

      <div class="relative z-10 flex flex-col lg:flex-row items-start justify-between md:gap-10">
        <div class="flex flex-col gap-5 flex-1 max-w-[472px]">
          <h3 class="text-[28px]/[110%] tracking-tighter-xl md:text-[48px]/[110%] md:tracking-tighter-3xl font-bold text-white"><?= $about_title; ?></h3>
        </div>

        <div class="lg:max-w-[569px] flex flex-col">
          <p class="text-2xl/[normal] text-white font-bold"><?= $about_subtitle; ?></p>

          <div class="mt-5 md:text-xl/[130%] font-semibold text-white/80 flex flex-col gap-4"><?= $about_description; ?></div>

          <div class="flex gap-2 md:gap-4 lg:gap-1.5 mt-6 flex-1">
            <?= afternoon_render_button($about_free_trial, 'about-primary', 'flex-1'); ?>
            <?= afternoon_render_button($about_talk_button, 'about-secondary', 'flex-1'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
