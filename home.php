<?php

/**
 * Template Name: Home
 */
get_header();
?>

<div class="relative">
  <img src="<?= esc_url(afternoon_image_uri('introduction/background.png')); ?>" alt="" fetchpriority="high" class="select-none w-full h-auto inset-0 absolute object-cover md:block hidden" />
  <?php get_template_part('template-parts/navigation') ?>
  <main class="relative md:pt-[92px]">
    <div class="max-w-screen-xl mx-auto px-5 md:px-8 lg:px-10">
      <section class="pt-32 md:py-36">
        <?php
        $intro = afternoon_get_acf_field('introduction', []);
        $intro_heading_1 = isset($intro['heading_part_#1']) ? esc_html($intro['heading_part_#1']) : '';
        $intro_heading_2 = isset($intro['heading_part_#2']) ? esc_html($intro['heading_part_#2']) : '';
        $intro_subheading = isset($intro['subheading']) ? esc_html($intro['subheading']) : '';
        $intro_free_trial = isset($intro['free_trial_button']) ? $intro['free_trial_button'] : [];
        $intro_talk_button = isset($intro['talk_with_us_button']) ? $intro['talk_with_us_button'] : [];
        ?>
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
        <img width="393" height="314" loading="lazy" src="<?= esc_url(afternoon_image_uri('introduction/background-mobile.jpg')); ?>" alt="" fetchpriority="high" class="inset-0 absolute object-cover w-full h-auto" />
      </div>


      <section class="lg:pt-24 xl:pt-36 pb-10" id="features">
        <?php
        $features = afternoon_get_acf_field('features', []);
        $features_title = isset($features['title']) ? esc_html($features['title']) : '';
        $features_subtitle = isset($features['subtitle']) ? esc_html($features['subtitle']) : '';
        $features_options = isset($features['options']) && is_array($features['options']) ? $features['options'] : [];
        $features_secondary = isset($features['secondary_features']) && is_array($features['secondary_features']) ? $features['secondary_features'] : [];

        $typewriter_words = array_map(function ($option) {
          return isset($option['title']) ? esc_js($option['title']) : '';
        }, $features_options);
        ?>
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
    </div>

    <section class="relative" id="pricing">
      <img loading="lazy" src="<?= esc_url(afternoon_image_uri('pricing/background.png')); ?>" alt="" class="w-full h-full absolute object-cover" />
      <div class="max-w-screen-xl mx-auto px-5 md:px-10 relative z-10">
        <div class="py-12 md:py-72 flex flex-col md:flex-row items-stretch justify-between gap-6 md:gap-3">
          <?php
          $pricing = afternoon_get_acf_field('pricing', []);
          $pricing_title = isset($pricing['title']) ? esc_html($pricing['title']) : '';
          $pricing_subtitle = isset($pricing['subtitle']) ? esc_html($pricing['subtitle']) : '';
          $pricing_types = isset($pricing['type']) && is_array($pricing['type']) ? $pricing['type'] : [];
          ?>
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

    <section id="about">
      <div class="max-w-screen-xl mx-auto px-5 md:px-10 relative z-10">
        <div class="relative overflow-hidden bg-brand-orange p-7 md:p-12 rounded-52">
          <?php
          $about = afternoon_get_acf_field('about', []);
          $about_title = isset($about['title']) ? esc_html($about['title']) : '';
          $about_subtitle = isset($about['subtitle']) ? esc_html($about['subtitle']) : '';
          $about_description = isset($about['description']) ? wp_kses_post($about['description']) : '';
          $about_free_trial = isset($about['free_trial_button']) ? $about['free_trial_button'] : [];
          $about_talk_button = isset($about['talk_with_us_button']) ? $about['talk_with_us_button'] : [];
          ?>
          <div class="relative z-10 flex flex-col lg:flex-row items-start justify-between md:gap-10">
            <div class="flex flex-col gap-5 flex-1 max-w-[472px]">
              <h3 class="text-[28px]/[110%] tracking-tighter-xl md:text-[48px]/[110%] md:tracking-tighter-3xl font-bold text-white"><?= $about_title; ?></h3>
            </div>

            <div class="lg:max-w-[569px] flex flex-col">
              <p class="text-2xl/[normal] text-white font-bold"><?= $about_subtitle; ?></p>

              <div class="mt-5 md:text-xl/[130%] font-semibold text-white/80 flex flex-col gap-4"><?= $about_description; ?></div>

              <div class="flex gap-2 md:gap-4 lg:gap-1.5 mt-6 flex-1">
                <?= afternoon_render_button($about_free_trial, 'about-primary'); ?>
                <?= afternoon_render_button($about_talk_button, 'about-secondary'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="relative" id="faq">
      <img loading="lazy" src="<?= esc_url(afternoon_image_uri('faqs/background.png')); ?>" alt="" class="w-full h-full absolute object-cover object-top" />
      <div class="max-w-screen-xl mx-auto px-5 md:px-10 relative z-10">
        <div class="py-12 md:py-32 flex flex-col" x-data="{ activeCategory: 'data', openFaq: 1 }">
          <div class="flex flex-col gap-5 flex-1 mb-8 md:text-center md:items-center">
            <h3 class="text-[28px]/[110%] md:text-[48px]/[110%] tracking-tighter-xl md:tracking-tighter-3xl font-bold text-black">FAQ</h3>

            <div class="md:p-1 md:bg-brand-secondary-grey md:rounded-full flex gap-0.5 overflow-auto whitespace-nowrap scrollbar-hide">
              <button @click="activeCategory = 'data'" :class="{ 'bg-brand-black text-white': activeCategory === 'data', 'hover:bg-faq-hover focus:text-white hover:text-white focus:bg-faq-hover focus:text-white hover:text-white': activeCategory !== 'data' }" class="rounded-full  focus:outline-none font-semibold py-2 px-4 text-base/[20px] text-brand-black">Data & security</button>
              <button @click="activeCategory = 'ai'" :class="{ 'bg-brand-black text-white': activeCategory === 'ai', 'hover:bg-faq-hover focus:text-white hover:text-white focus:bg-faq-hover focus:text-white hover:text-white': activeCategory !== 'ai' }" class="rounded-full  focus:outline-none font-medium py-2 px-4 text-base/[20px] text-brand-black">How AI works</button>
              <button @click="activeCategory = 'finance'" :class="{ 'bg-brand-black text-white': activeCategory === 'finance', 'hover:bg-faq-hover focus:text-white hover:text-white focus:bg-faq-hover focus:text-white hover:text-white': activeCategory !== 'finance' }" class="rounded-full  focus:outline-none font-medium py-2 px-4 text-base/[20px] text-brand-black">Finance</button>
              <button @click="activeCategory = 'team'" :class="{ 'bg-brand-black text-white': activeCategory === 'team', 'hover:bg-faq-hover focus:text-white hover:text-white focus:bg-faq-hover focus:text-white hover:text-white': activeCategory !== 'team' }" class="rounded-full  focus:outline-none font-medium py-2 px-4 text-base/[20px] text-brand-black">Our team</button>
            </div>
          </div>

          <div class="flex flex-col gap-2">
            <?php
            $faqs = afternoon_get_acf_field('faq', []);
            if ($faqs && is_array($faqs)):
              $index = 1;
              foreach ($faqs as $faq):
                $faq_category = isset($faq['category']) ? esc_attr($faq['category']) : 'data';
                $faq_title = isset($faq['title']) ? esc_html($faq['title']) : '';
                $faq_description = isset($faq['description']) ? wp_kses_post($faq['description']) : '';
            ?>
                <div class="w-full p-6 md:p-8 bg-white rounded-32 border border-black/10 mx-auto max-w-[794px]" x-show="activeCategory === '<?= $faq_category; ?>'">
                  <div class="flex items-center justify-between cursor-pointer gap-4" @click="openFaq = openFaq === <?= $index; ?> ? null : <?= $index; ?>">
                    <h4 class="text-lg/[110%] md:text-xl/[110%] tracking-tighter-md font-semibold"><?= $faq_title; ?></h4>
                    <?php afternoon_svg('chevron-down', 'flex-shrink-0 transition-transform duration-300', ['alpine_class' => "{ 'rotate-180': openFaq === {$index} }"]); ?>
                  </div>

                  <div x-show="openFaq === <?= $index; ?>" x-collapse class="mt-5 text-lg/[135%] md:text-xl/[135%] tracking-[-0.2px] text-brand-black flex flex-col gap-2">
                    <?php if ($faq_description) { ?>
                      <?= $faq_description; ?>
                    <?php } else { ?>
                      <p>No content yet</p>
                    <?php } ?>
                  </div>
                </div>
            <?php
                $index++;
              endforeach;
            endif;
            ?>
          </div>

        </div>
      </div>
    </section>

    <section class="relative" id="team">
      <?php
      $team = afternoon_get_acf_field('team', []);
      $team_title = isset($team['title']) ? str_replace(['<p>', '</p>'], '', wp_kses_post($team['title'])) : '';
      $team_description = isset($team['description']) ? wp_kses_post($team['description']) : '';
      $team_members = isset($team['team_member']) && is_array($team['team_member']) ? $team['team_member'] : [];
      $team_button = isset($team['button']) ? $team['button'] : [];
      ?>
      <div class="max-w-[972px] mx-auto px-5 sm:px-10 relative z-10 pb-10 sm:pb-28" x-data="{ activeMember: null }" @click.outside="activeMember = null">
        <h3 class="max-w-[860px] mx-auto mb-8 text-center text-brand-black text-[28px]/[110%] sm:text-[48px]/[110%] tracking-tighter-xl sm:tracking-tighter-3xl font-bold [&_br]:hidden lg:[&_br]:inline"><?= $team_title; ?></h3>

        <div class="flex flex-col gap-2 text-base/[130%] sm:text-xl/[130%] text-brand-black mx-auto max-w-[660px] w-full font-semibold sm:text-left text-center">
          <?= $team_description; ?>
        </div>

        <div class="relative">
          <div class="sm:px-12 sm:py-4 pb-[150px] sm:bg-brand-orange mt-12 sm:rounded-full flex gap-4 overflow-x-auto scrollbar-hide team-container snap-x snap-mandatory sm:snap-none" x-ref="teamContainer">
            <?php foreach ($team_members as $index => $member) {
              $member_image_url = isset($member['image']['url']) ? esc_url($member['image']['url']) : '';
              $member_image_alt = isset($member['image']['alt']) ? esc_attr($member['image']['alt']) : '';
              $member_name = isset($member['name']) ? esc_html($member['name']) : '';
              $member_link = isset($member['link']) && is_array($member['link']) && !empty($member['link']['url']) ? $member['link'] : null;
              $member_role = isset($member['role']) ? esc_html($member['role']) : '';

            ?>
              <div class="relative bg-brand-orange rounded-full p-4 sm:p-0 sm:rounded-none sm:bg-transparent w-[calc(100dvw-2.5rem)] sm:w-auto team-member flex items-center flex-shrink-0 min-w-fit snap-center sm:snap-align-none" :class="{ 'sm:opacity-50': activeMember !== null && activeMember !== <?= $index; ?> }">
                <div class="rounded-full  border border-brand-white-hover focus:outline-none bg-white/20 aspect-[120/168] w-full sm:w-[7.5rem] shadow-team  overflow-hidden cursor-pointer h-full" @click.stop="activeMember = activeMember === <?= $index; ?> ? null : <?= $index; ?>; if(activeMember === <?= $index; ?>) { setTimeout(() => { const container = $refs.teamContainer; const member = $el.closest('.team-member'); const padding = 48; const memberLeft = member.offsetLeft; const memberWidth = member.offsetWidth; const containerWidth = container.offsetWidth; const scrollLeft = container.scrollLeft; const memberRight = memberLeft + memberWidth; const visibleLeft = scrollLeft + padding; const visibleRight = scrollLeft + containerWidth - padding; if (memberLeft < visibleLeft || memberRight > visibleRight) { const scrollPos = memberLeft - padding; container.scrollTo({ left: scrollPos, behavior: 'smooth' }); } }, 350); }">
                  <?php if ($member_image_url) : ?>
                    <img src="<?= $member_image_url; ?>" alt="<?= $member_image_alt; ?>" class="w-full h-full object-cover object-top" />
                  <?php endif; ?>
                </div>
                <div class="sm:h-full flex items-center justify-center flex-col absolute sm:static left-0 bottom-[-130px] opacity-100 max-w-none team-member-details whitespace-nowrap overflow-hidden transition-all duration-300 ease-in-out" :class="activeMember === <?= $index; ?> ? 'sm:max-w-xs sm:opacity-100' : 'sm:max-w-0 sm:opacity-0'">
                  <div class="sm:pl-6 sm:pr-3">
                    <h4 class="sm:text-white text-[24px]/[110%] sm:text-[32px]/[110%] tracking-tighter-lg sm:tracking-tighter-2xl font-bold"><?= str_replace(' ', '<br>', $member_name); ?></h4>

                    <div class="flex gap-3  mt-4">
                      <?php if ($member_role) { ?>
                        <span class="font-semibold sm:text-white text-base/[110%] tracking-tighter-sm"><?= $member_role; ?></span>
                      <?php } ?>
                      <?php if ($member_link) { ?>
                        <a href="<?= esc_url($member_link['url']); ?>" target="<?= esc_attr($member_link['target']); ?>" class="flex gap-2 items-center justify-start font-semibold sm:text-white text-base/[110%] tracking-tighter-sm focus:underline hover:underline outline-none">
                          <span><?= esc_html($member_link['title']); ?></span>
                          <?php afternoon_svg('external-link'); ?>
                        </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>

          <div class="absolute bottom-[40px] right-0 sm:hidden flex gap-2">
            <button title="Previous team member" @click="const members = $refs.teamContainer.querySelectorAll('.team-member'); const container = $refs.teamContainer; const containerLeft = container.scrollLeft; const targetMember = Array.from(members).reverse().find(member => member.offsetLeft < containerLeft - 10); if(targetMember) { container.scrollTo({ left: targetMember.offsetLeft, behavior: 'smooth' }); }" class="bg-white rotate-180 px-6 py-4 h-[48px] items-center justify-center font-semibold text-xl text-brand-orange rounded-full ring-6 ring-inset ring-brand-orange flex focus:outline-none  hover:ring-brand-orange-hover hover:text-brand-orange-hover focus:ring-brand-orange-active focus:text-brand-orange-active">
              <?php afternoon_svg('arrow'); ?>
            </button>
            <button title="Next team member" @click="const members = $refs.teamContainer.querySelectorAll('.team-member'); const container = $refs.teamContainer; const containerLeft = container.scrollLeft; const containerWidth = container.offsetWidth; const targetMember = Array.from(members).find(member => member.offsetLeft > containerLeft + 10); if(targetMember) { container.scrollTo({ left: targetMember.offsetLeft, behavior: 'smooth' }); }" class="bg-white px-6 py-4 h-[48px] items-center justify-center font-semibold text-xl text-brand-orange rounded-full ring-6 ring-inset ring-brand-orange flex focus:outline-none  hover:ring-brand-orange-hover hover:text-brand-orange-hover focus:ring-brand-orange-active focus:text-brand-orange-active">
              <?php afternoon_svg('arrow'); ?>
            </button>
          </div>
        </div>


        <?php if (!empty($team_button) && isset($team_button['url']) && isset($team_button['title'])) : ?>
          <div class="mt-4 flex items-center justify-center">
            <a href="<?= esc_url($team_button['url']); ?>" target="<?= esc_attr($team_button['target']); ?>" class="flex gap-1 w-full sm:w-auto group focus:outline-none">
              <span class="w-full sm:w-auto bg-brand-orange sm:bg-transparent text-white px-6 py-4 h-[42px] sm:h-[60px] flex items-center justify-center font-semibold text-base sm:text-xl sm:text-brand-orange rounded-full ring-6 ring-inset ring-brand-orange group-hover:bg-brand-orange-hover group-hover:ring-brand-orange-hover group-hover:text-white group-focus:bg-brand-orange-active group-focus:ring-brand-orange-active group-focus:text-white"><?= esc_html($team_button['title']); ?></span>
              <span class="px-8 py-4 h-[60px] items-center justify-center font-semibold text-xl text-brand-orange rounded-full ring-6 ring-inset ring-brand-orange group-hover:ring-brand-orange-hover group-hover:text-brand-orange-hover group-focus:ring-brand-orange-active group-focus:text-brand-orange-active hidden sm:flex">
                <?php afternoon_svg('arrow', '', ['stroke' => 'currentColor']); ?>
              </span>
            </a>
          </div>
        <?php endif; ?>
      </div>

    </section>


    <?php get_template_part('template-parts/footer') ?>

  </main>
</div>

<?php get_footer(); ?>