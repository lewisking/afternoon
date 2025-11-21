<?php
$footer = afternoon_get_acf_field('footer', []);
$footer_title = isset($footer['title']) ? esc_html($footer['title']) : '';
$footer_subtitle = isset($footer['subtitle']) ? esc_html($footer['subtitle']) : '';
$footer_free_trial = isset($footer['free_trial_button']) ? $footer['free_trial_button'] : [];
$footer_talk_button = isset($footer['talk_with_us_button']) ? $footer['talk_with_us_button'] : [];
?>

<?php if ($footer_title) { ?>
<div class="h-[52px] rounded-b-[52px] bg-brand-grey relative z-10"></div>
<?php } ?>
<footer class="relative overflow-hidden <?php if ($footer_title) { ?>-mt-[52px] pt-[52px]<?php } ?> bg-brand-orange">

  <spline-viewer url="https://prod.spline.design/4cJH-JQNw2YG4yma/scene.splinecode" class="w-full h-full absolute inset-0 object-cover"></spline-viewer>

  <?php if ($footer_title) { ?>
    <div class="relative z-10 py-32">
      <div class="max-w-screen-xl mx-auto text-center px-3">
        <h4 class="text-white text-[28px]/[110%] md:text-[48px]/[110%] tracking-tighter-xl md:tracking-tighter-3xl font-bold"><?= $footer_title; ?></h4>
        <p class="mt-3 text-white text-base/[130%] md:text-xl/[130%] font-semibold mx-auto max-w-[590px]"><?= $footer_subtitle; ?></p>

        <div class="mt-5 md:mt-11 flex items-center justify-center gap-1.5">
          <?= afternoon_render_button($footer_free_trial, 'about-primary'); ?>
          <?= afternoon_render_button($footer_talk_button, 'about-secondary'); ?>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="relative z-10 <?php if ($footer_title) { ?>rounded-t-[52px]<?php } ?> overflow-hidden">

    <div class="text-brand-black font-semibold leading-[125%] bg-brand-grey pt-16 pb-24 md:py-16">
      <div class="max-w-screen-xl mx-auto flex items-center justify-between md:justify-start px-5 md:px-10">

        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu_class' => 'flex gap-6',
          'container' => 'nav',
          'container_class' => '',
          'fallback_cb' => false,
        ));
        ?>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="flex-1 bg-brand-grey"></div>
      <div class="w-full">
        <div class="flex">
          <div class="flex-1 bg-brand-grey min-w-5 md:min-w-10 relative">
            <div class="bg-brand-grey w-px h-full absolute -right-px md:hidden"></div>
          </div>
          <div class="w-full max-w-[1200px]">
            <img src="<?= esc_url(afternoon_image_uri('footer/subtrack.svg')); ?>" alt="" class="w-full h-auto" />
          </div>
          <div class="flex-1 bg-brand-grey min-w-5 md:min-w-10 relative">
            <div class="bg-brand-grey w-px h-full absolute -left-px md:hidden"></div>

          </div>
        </div>
      </div>
      <div class="flex-1 bg-brand-grey"></div>
    </div>

    <div class="text-brand-black font-semibold flex items-center justify-start text-base leading-[125%] bg-brand-grey pt-32 md:pt-16 pb-16 md:pb-32">
      <div class="max-w-screen-xl px-5 md:px-10 w-full mx-auto flex flex-col-reverse md:flex-row items-start justify-between gap-6">
        <div class="">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'secondary',
            'menu_class' => 'flex flex-col gap-1 items-start',
            'container' => 'nav',
            'container_class' => '',
            'fallback_cb' => false,
          ));
          ?>
        </div>

        <div class="flex flex-col gap-1 items-start">
          <span>Contact</span>
          <a href="mailto:hello@afternoon.co.uk" class="text-brand-orange md:text-brand-black hover:text-brand-orange focus:outline-none focus:text-brand-orange focus:scale-100">hello@afternoon.co.uk</a>
          <a href="https://www.linkedin.com/company/afternoon-finance" target="_blank" class="mt-2 focus:outline-none" title="Visit our LinkedIn">
            <?php afternoon_svg('linkedin'); ?>
          </a>

        </div>
      </div>
    </div>
  </div>
</footer>