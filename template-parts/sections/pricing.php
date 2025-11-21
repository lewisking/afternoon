<?php
/**
 * Pricing Section
 */

$pricing = afternoon_get_acf_field('pricing', []);
$pricing_title = isset($pricing['title']) ? esc_html($pricing['title']) : '';
$pricing_subtitle = isset($pricing['subtitle']) ? esc_html($pricing['subtitle']) : '';
$pricing_types = isset($pricing['type']) && is_array($pricing['type']) ? $pricing['type'] : [];
?>

<section class="relative" id="pricing">
  <img loading="lazy" src="<?= esc_url(afternoon_image_uri('pricing/background.jpg')); ?>" alt="" class="w-full h-full absolute object-cover" />
  <div class="max-w-screen-xl mx-auto px-5 md:px-10 relative z-10">
    <div class="py-12 md:py-72 flex flex-col md:flex-row items-stretch justify-between gap-6 md:gap-3">
      <div class="flex flex-col gap-4 md:gap-5 md:w-1/3 md:mr-20">
        <h3 class="text-[28px]/[110%] tracking-tighter-xl md:text-[48px]/[110%] md:tracking-tighter-3xl font-bold text-black"><?= $pricing_title; ?></h3>
        <p class="text-lg/[125%] md:text-xl/[130%] text-black font-medium"><?= $pricing_subtitle; ?></p>
      </div>

      <div class="flex flex-col lg:flex-row md:w-2/3 gap-6">
        <?php foreach ($pricing_types as $index => $type) {
          $pre_title = isset($type['pre-title']) ? esc_html($type['pre-title']) : '';
          $title = isset($type['title']) ? esc_html($type['title']) : '';
          $interval = isset($type['interval']) ? esc_html($type['interval']) : '';
          $description = isset($type['description']) ? esc_html($type['description']) : '';
          $link = isset($type['link']) ? $type['link'] : [];
          $button_type = $index === 1 ? 'pricing-primary' : 'pricing-secondary';
        ?>
          <div class="p-8 rounded-40 <?= $index === 1 ? 'bg-white' : 'bg-brand-orange'; ?> flex-1 flex flex-col">
            <span class="text-[24px]/[normal] font-bold <?= $index === 1 ? 'text-black/70' : 'text-white/90'; ?>"><?= $pre_title; ?></span>
            <h4 class="text-[48px]/[110%] tracking-tighter-3xl font-bold <?= $index === 1 ? 'text-black' : 'text-white'; ?> mt-1 mb-3"><?= $title; ?><?php if ($interval) { ?>
              <span class="text-xl font-semibold">/<?= $interval; ?></span><?php } ?>
            </h4>
            <p class="flex-1 text-xl/[130%] font-medium <?= $index === 1 ? 'text-black' : 'text-white'; ?> mb-8"><?= $description; ?></p>
            <?= afternoon_render_button($link, $button_type); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
