<?php
/**
 * Features Section
 */

$features = afternoon_get_acf_field('features', []);
$features_title = isset($features['title']) ? esc_html($features['title']) : '';
$features_subtitle = isset($features['subtitle']) ? esc_html($features['subtitle']) : '';
$features_options = isset($features['options']) && is_array($features['options']) ? $features['options'] : [];
$features_secondary = isset($features['secondary_features']) && is_array($features['secondary_features']) ? $features['secondary_features'] : [];

$typewriter_words = array_map(function ($option) {
  return isset($option['title']) ? esc_js($option['title']) : '';
}, $features_options);
?>

<section class="lg:pt-24 xl:pt-36 pb-10" id="features">
  <div class="gap-5 md:flex-row flex-col flex md:items-end justify-between lg:px-4">
    <h3 class="text-[28px]/[110%] tracking-tighter-xl md:text-[32px]/[110%] lg:text-[48px]/[110%] md:tracking-tighter-3xl text-brand-black font-bold max-w-[526px]">
      <?= $features_title; ?>
      <span class="block lg:inline" x-data="{ words: ['<?= implode("','", $typewriter_words); ?>'] }" x-typewriter.1500ms.cursor="words"></span>
    </h3>
    <p class="text-xl/[125%] lg:text-2xl/[130%] lg:mr-14 text-brand-secondary-black font-semibold max-w-[313px]"><?= $features_subtitle; ?></p>
  </div>
  <div class="mt-4 md:mt-10 rounded-32 bg-brand-orange overflow-hidden relative flex items-center justify-center md:h-[550px]">
    <video autoplay loop muted playsinline class="md:absolute top-0 bottom-0 w-full md:max-w-[430px]">
      <source src="<?= esc_url(afternoon_image_uri('features/next-steps-example.mp4')); ?>" type="video/mp4">
    </video>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-10 md:mt-20 gap-6">
    <?php foreach ($features_secondary as $index => $feature) {
      $feature_title = isset($feature['title']) ? esc_html($feature['title']) : '';
      $feature_subtitle = isset($feature['subtitle']) ? esc_html($feature['subtitle']) : '';
      $feature_image_url = isset($feature['image']['url']) ? esc_url($feature['image']['url']) : '';
      $feature_image_alt = isset($feature['image']['alt']) ? esc_attr($feature['image']['alt']) : $feature_title;
      $animation_slug = sanitize_title($feature['title']);
      $animation_path = get_template_directory_uri() . '/animations/' . $animation_slug . '.json';

      // Automate meetings plays once on view, others loop
      $is_meetings = strpos(strtolower($feature['title']), 'meeting') !== false;
      $loop_attr = $is_meetings ? '' : 'loop';
      $autoplay_attr = $is_meetings ? '' : 'autoplay';
      $data_trigger = $is_meetings ? 'data-play-on-view="true"' : '';
    ?>
      <div class="flex flex-col gap-3 md:gap-6 <?= $index == 2 ? 'md:col-span-2 lg:col-span-1' : ''; ?>">
        <div class="flex flex-col gap-1 md:px-3">
          <h4 class="text-brand-black text-xl md:text-2xl font-bold leading-[normal]"><?= $feature_title; ?></h4>
          <p class="text-base/[24px] font-medium text-brand-black/90"><?= $feature_subtitle; ?></p>
        </div>
        <div class="rounded-32 bg-brand-orange aspect-[390/443] flex items-center justify-center overflow-hidden">
          <dotlottie-player src="<?= esc_url($animation_path); ?>" background="transparent" speed="1" style="width: 100%; height: 100%;" <?= $loop_attr; ?> <?= $autoplay_attr; ?> <?= $data_trigger; ?>></dotlottie-player>
        </div>
      </div>
    <?php } ?>
  </div>

  <?php
  $ai_preview = afternoon_get_acf_field('ai_preview', []);
  $ai_title = isset($ai_preview['title']) ? esc_html($ai_preview['title']) : '';
  $ai_subtitle = isset($ai_preview['subtitle']) ? esc_html($ai_preview['subtitle']) : '';
  ?>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 mt-20 gap-2 md:gap-4">
    <div>
      <h3 class="text-xl/[125%] md:text-2xl/[130%] text-brand-black font-semibold md:max-w-[273px] md:pl-4"><?= $ai_title; ?></h3>
    </div>
    <p class="text-base/[24px] font-medium text-brand-black flex items-center"><?= $ai_subtitle; ?></p>
  </div>

  <div class="mt-6">
    <video autoplay loop muted playsinline class="w-full h-auto aspect-[1203/473] object-cover object-top rounded-58">
      <source src="<?= esc_url(afternoon_image_uri('features/ai-example.mp4')); ?>" type="video/mp4">
    </video>
  </div>
</section>
