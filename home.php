<?php

/**
 * Template Name: Home
 */
get_header();
?>

<div class="relative">
  <img src="<?= get_template_directory_uri(); ?>/images/introduction/background.png" alt="" fetchpriority="high" class="select-none w-full h-auto inset-0 absolute object-cover md:block hidden" />
  <?php get_template_part('template-parts/navigation') ?>
  <main class="relative md:pt-[92px]">
    <div class="max-w-screen-xl mx-auto px-5 md:px-10">
      <section class="pt-32 md:py-36">
        <div class="max-w-[692px] p-6 md:py-11 md:px-8 bg-white rounded-[32px] border border-black/10 flex flex-col gap-5">
          <h1 class="text-[32px]/[38px] md:text-[52px]/[60px] text-brand-orange font-bold tracking-[-1.04px]">
            <?= get_field('introduction')['heading_part_#1'] ?>&nbsp;<span class="text-brand-black"><?= get_field('introduction')['heading_part_#2'] ?></span>
          </h1>
          <h2 class="max-w-[420px] text-brand-black text-xl/[125%] md:text-2xl/[125%] font-semibold"><?= get_field('introduction')['subheading'] ?></h2>
        </div>
        <div class="mt-3 max-w-[574px] p-3 md:p-6 bg-white rounded-full border border-black/10 flex gap-1.5">

          <a href="<?= get_field('introduction')['free_trial_button']['url'] ?>" target="<?= get_field('introduction')['free_trial_button']['target'] ?>" class="flex-1 px-4 md:px-10 py-4 h-[42px] md:h-[60px] flex items-center justify-center font-semibold text-white text-base md:text-xl bg-brand-orange rounded-full ring-[6px] ring-inset ring-brand-orange hover:bg-white hover:text-brand-orange focus:outline-none focus:text-brand-orange focus:bg-white"><?= get_field('introduction')['free_trial_button']['title'] ?></a>


          <svg class="w-[26px] h-[42px] md:hidden" width="26" height="42" viewBox="0 0 26 42" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="3" y="3" width="20" height="36" rx="10" stroke="#F75F24" stroke-width="6" />
          </svg>


          <svg class="w-[31px] h-[60px] hidden md:block" width="31" height="60" viewBox="0 0 31 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="3" y="3" width="25" height="54" rx="12.5" stroke="#F75F24" stroke-width="6" />
          </svg>

          <svg class="md:block hidden" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="3" y="3" width="54" height="54" rx="27" stroke="#F75F24" stroke-width="6" />
          </svg>


          <a href="<?= get_field('introduction')['talk_with_us_button']['url'] ?>" target="<?= get_field('introduction')['talk_with_us_button']['target'] ?>" class="flex-1 md:flex-none px-4 md:px-9 py-4 h-[42px] md:h-[60px] flex items-center justify-center font-semibold text-base md:text-xl text-brand-orange rounded-full ring-[6px] ring-inset ring-brand-orange hover:bg-brand-orange hover:text-white focus:outline-none focus:bg-brand-orange focus:text-white"><?= get_field('introduction')['talk_with_us_button']['title'] ?></a>


        </div>
      </section>

      <div class="md:hidden -mx-5 w-screen max-w-none aspect-[393/314] relative">
        <img width="393" height="314" loading="lazy" src="<?= get_template_directory_uri(); ?>/images/introduction/background-mobile.jpg" alt="" fetchpriority="high" class="inset-0 absolute object-cover w-full h-auto" />
      </div>


      <section class="pt-24 md:pt-36 pb-10" id="features">
        <div class="gap-5 md:flex-row flex-col flex md:items-end justify-between md:px-4">
          <h3 class="text-[28px]/[110%] tracking-[-0.56px] md:text-[48px]/[110%] md:tracking-[-0.96px] text-brand-black font-bold max-w-[526px]">
            <?= get_field('features')['title'] ?>
            <span class="block md:inline" x-data="{ words: ['<?= implode("','", array_map(fn($option) => $option['title'], get_field('features')['options'])) ?>'] }" x-typewriter.1500ms.cursor="words"></span>
          </h3>
          <p class="text-xl/[125%] md:text-2xl/[130%] md:mr-14 text-brand-secondary-black font-semibold max-w-[313px]"><?= get_field('features')['subtitle'] ?></p>
        </div>
        <div class="mt-4 md:mt-10 rounded-[32px] bg-brand-orange overflow-hidden relative flex items-center justify-center md:min-h-[550px]">

          <video autoplay loop muted playsinline class="hidden md:block w-full h-auto blur-xl scale-150">
            <source src="<?= get_template_directory_uri(); ?>/images/features/blobs.mp4" type="video/mp4">
          </video>

          <video autoplay loop muted playsinline class="md:absolute top-0 bottom-0 w-full md:max-w-[430px]">
            <source src="<?= get_template_directory_uri(); ?>/images/features/next-steps-example.mp4" type="video/mp4">
          </video>
        </div>

        <div class="grid md:grid-cols-3 mt-10 md:mt-20 gap-6">
          <?php foreach (get_field('features')['secondary_features'] as $index => $feature) { ?>
            <div class="flex flex-col gap-3 md:gap-6">
              <div class="flex flex-col gap-1 md:px-3">
                <h4 class="text-brand-black text-xl md:text-2xl font-bold leading-[normal]"><?= $feature['title'] ?></h4>
                <p class="text-base/[24px] font-medium text-brand-black/90"><?= $feature['subtitle'] ?></p>
              </div>
              <div class="rounded-[32px] bg-brand-orange aspect-[390/443] flex items-center justify-center overflow-hidden <?= $index != 1 ? 'px-4' : '' ?> py-14">
                <img loading="lazy" src="<?= $feature['image']['url'] ?>" alt="<?= $feature['title'] ?>" />
              </div>
            </div>
          <?php } ?>
        </div>

        <div class="grid md:grid-cols-3 mt-20 gap-2 md:gap-4">
          <div>
            <h3 class="text-xl/[125%] md:text-2xl/[130%] text-brand-black font-semibold md:max-w-[273px] md:pl-4"><?= get_field('ai_preview')['title'] ?></h3>
          </div>
          <p class="text-base/[24px] font-medium text-brand-black flex items-center"><?= get_field('ai_preview')['subtitle'] ?></p>
        </div>


        <div class="mt-6">
          <video autoplay loop muted playsinline class="w-full h-auto aspect-[1203/473] object-cover object-top rounded-[58px]">
            <source src="<?= get_template_directory_uri(); ?>/images/features/ai-example.mp4" type="video/mp4">
          </video>
        </div>



      </section>
    </div>

    <section class="relative" id="pricing">
      <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/pricing/background.png" alt="" class="w-full h-full absolute object-cover" />
      <div class="max-w-screen-xl mx-auto px-5 md:px-10 relative z-10">
        <div class="py-12 md:py-72 flex flex-col md:flex-row items-stretch justify-between gap-6 md:gap-3">
          <div class="flex flex-col gap-4 md:gap-5 flex-1 md:mr-20">
            <h3 class="text-[28px]/[110%] tracking-[-0.56px] md:text-[48px]/[110%] md:tracking-[-0.96px] font-bold text-black"><?= get_field('pricing')['title'] ?></h3>
            <p class="text-lg/[125%] md:text-xl/[130%] text-black font-medium"><?= get_field('pricing')['subtitle'] ?></p>
          </div>

          <?php foreach (get_field('pricing')['type'] as $index => $type) { ?>
            <div class="p-8 rounded-[40px] <?= $index === 1 ? 'bg-white' : 'bg-brand-orange' ?> flex-1 flex flex-col">
              <span class="text-[24px]/[normal] font-bold <?= $index === 1 ? 'text-black/70' : 'text-white/90' ?>"><?= $type['pre-title'] ?></span>
              <h4 class="text-[48px]/[110%] tracking-[-0.96px] font-bold <?= $index === 1 ? 'text-black' : 'text-white' ?> mt-1 mb-3"><?= $type['title'] ?><?php if ($type['interval']) { ?>
                <span class="text-xl font-semibold">/<?= $type['interval'] ?></span><?php } ?>
              </h4>
              <p class="flex-1 text-xl/[130%] font-medium <?= $index === 1 ? 'text-black' : 'text-white' ?> mb-8"><?= $type['description'] ?></p>
              <a href="<?= $type['link']['url'] ?>" target="<?= $type['link']['target'] ?>" class="focus:outline-none px-8 py-4 h-[60px] flex items-center justify-center font-bold text-brand-orange text-xl bg-white rounded-full <?= $index === 1 ? 'ring-[6px] ring-inset ring-brand-orange hover:bg-brand-orange hover:text-white focus:text-white focus:bg-brand-orange' : 'hover:text-white hover:bg-brand-black focus:text-white focus:bg-brand-black' ?>"><?= $type['link']['title'] ?></a>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <section id="about">
      <div class="max-w-screen-xl mx-auto px-5 md:px-10 relative z-10">
        <div class="py-12 md:py-32 flex flex-col md:flex-row items-stretch justify-between gap-3">
          <div class="flex flex-col gap-5 flex-1 max-w-[472px]">
            <h3 class="text-[28px]/[110%] tracking-[-0.56px] md:text-[48px]/[110%] md:tracking-[-0.96px] font-bold text-black"><?= get_field('about')['title'] ?></h3>
            <p class="md:mt-10 text-2xl/[normal] text-brand-orange font-bold"><?= get_field('about')['subtitle'] ?></p>

            <div class="md:text-xl/[130%] font-semibold text-brand-black/80 flex flex-col gap-4"><?= get_field('about')['description'] ?></div>

            <div class="flex gap-1.5 md:mt-6 items-start">
              <a href="<?= get_field('about')['free_trial_button']['url'] ?>" target="<?= get_field('about')['free_trial_button']['target'] ?>" class="flex-1 md:flex-none px-4 md:px-8 py-4 h-[42px] md:h-[60px] flex items-center justify-center font-bold text-white text-base md:text-xl bg-brand-orange hover:bg-brand-black hover:text-white rounded-full focus:outline-none focus:text-white focus:bg-brand-black"><?= get_field('about')['free_trial_button']['title'] ?></a>
              <a href="<?= get_field('about')['talk_with_us_button']['url'] ?>" target="<?= get_field('about')['talk_with_us_button']['target'] ?>" class="flex-1 md:flex-none px-4 md:px-8 py-4 h-[42px] md:h-[60px] flex items-center justify-center font-bold text-base md:text-xl text-brand-orange rounded-full focus:outline-none ring-[6px] ring-inset ring-brand-orange hover:bg-brand-orange hover:text-white focus:text-white focus:bg-brand-orange"><?= get_field('about')['talk_with_us_button']['title'] ?></a>
            </div>
          </div>
          <div class="max-w-[590px]">
            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/complete-data/graphic.png" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section class="relative" id="faq">
      <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/faqs/background.png" alt="" class="w-full h-full absolute object-cover object-top" />
      <div class="max-w-screen-xl mx-auto px-5 md:px-10 relative z-10">
        <div class="py-12 md:py-32 flex flex-col" x-data="{ activeCategory: 'data', openFaq: 1 }">
          <div class="flex flex-col gap-5 flex-1 mb-8 md:text-center md:items-center">
            <h3 class="text-[28px]/[110%] md:text-[48px]/[110%] tracking-[-0.56px] md:tracking-[-0.96px] font-bold text-black">FAQ</h3>

            <div class="md:p-1 md:bg-brand-secondary-grey md:rounded-full flex gap-0.5 overflow-auto whitespace-nowrap scrollbar-hide">
              <button @click="activeCategory = 'data'" :class="{ 'bg-brand-black text-white': activeCategory === 'data', 'hover:bg-brand-black/10 focus:bg-brand-black/10': activeCategory !== 'data' }" class="rounded-full  focus:outline-none font-semibold py-2 px-4 text-base/[20px] text-brand-black">Data & security</button>
              <button @click="activeCategory = 'ai'" :class="{ 'bg-brand-black text-white': activeCategory === 'ai', 'hover:bg-brand-black/10 focus:bg-brand-black/10': activeCategory !== 'ai' }" class="rounded-full  focus:outline-none font-medium py-2 px-4 text-base/[20px] text-brand-black">How AI works</button>
              <button @click="activeCategory = 'finance'" :class="{ 'bg-brand-black text-white': activeCategory === 'finance', 'hover:bg-brand-black/10 focus:bg-brand-black/10': activeCategory !== 'finance' }" class="rounded-full  focus:outline-none font-medium py-2 px-4 text-base/[20px] text-brand-black">Finance</button>
              <button @click="activeCategory = 'team'" :class="{ 'bg-brand-black text-white': activeCategory === 'team', 'hover:bg-brand-black/10 focus:bg-brand-black/10': activeCategory !== 'team' }" class="rounded-full  focus:outline-none font-medium py-2 px-4 text-base/[20px] text-brand-black">Our team</button>
            </div>
          </div>

          <div class="flex flex-col gap-2">
            <?php
            $faqs = get_field('faq');
            if ($faqs):
              $index = 1;
              foreach ($faqs as $faq):
            ?>
                <div class="w-full p-6 md:p-8 bg-white rounded-[32px] border border-black/10 mx-auto max-w-[794px]" x-show="activeCategory === '<?= esc_attr($faq['category']) ?>'">
                  <div class="flex items-center justify-between cursor-pointer gap-4" @click="openFaq = openFaq === <?= $index ?> ? null : <?= $index ?>">
                    <h4 class="text-lg/[110%] md:text-xl/[110%] tracking-[-0.4px] font-semibold"><?= esc_html($faq['title']) ?></h4>
                    <svg width="20" height="20" class="flex-shrink-0" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-transform duration-300" :class="{ 'rotate-180': openFaq === <?= $index ?> }">
                      <path d="M10.6657 5.58626L16.9157 11.8363C17.0918 12.0124 17.1908 12.2513 17.1908 12.5003C17.1908 12.7494 17.0918 12.9883 16.9157 13.1644C16.7396 13.3405 16.5007 13.4395 16.2516 13.4395C16.0026 13.4395 15.7637 13.3405 15.5876 13.1644L10.0024 7.57767L4.41569 13.1628C4.32848 13.25 4.22495 13.3192 4.11101 13.3664C3.99707 13.4136 3.87495 13.4379 3.75163 13.4379C3.6283 13.4379 3.50618 13.4136 3.39224 13.3664C3.2783 13.3192 3.17477 13.25 3.08756 13.1628C3.00036 13.0756 2.93118 12.9721 2.88399 12.8582C2.83679 12.7442 2.8125 12.6221 2.8125 12.4988C2.8125 12.3754 2.83679 12.2533 2.88399 12.1394C2.93118 12.0254 3.00036 11.9219 3.08756 11.8347L9.33756 5.5847C9.42476 5.49741 9.52834 5.42818 9.64235 5.381C9.75636 5.33381 9.87856 5.3096 10.002 5.30974C10.1253 5.30989 10.2475 5.33439 10.3614 5.38184C10.4753 5.42929 10.5787 5.49876 10.6657 5.58626Z" fill="black" />
                    </svg>
                  </div>

                  <div x-show="openFaq === <?= $index ?>" x-collapse class="mt-5 text-lg/[135%] md:text-xl/[135%] tracking-[-0.2px] text-brand-black flex flex-col gap-2">
                    <?php if ($faq['description']) { ?>
                      <?= $faq['description'] ?>
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

      <div class="max-w-[972px] mx-auto px-5 md:px-10 relative z-10 pb-10 md:pb-28" x-data="{ activeMember: null }" @click.outside="activeMember = null">
        <h3 class="max-w-[860px] mx-auto mb-8 text-center text-brand-black text-[28px]/[110%] md:text-[48px]/[110%] tracking-[-0.56px] md:tracking-[-0.96px] font-bold [&_br]:hidden md:[&_br]:inline"><?= str_replace(['<p>', '</p>'], '', get_field('team')['title']) ?></h3>

        <div class="flex flex-col gap-2 text-base/[130%] md:text-xl/[130%] text-brand-black mx-auto max-w-[660px] w-full font-semibold md:text-left text-center">
          <?= get_field('team')['description'] ?>
        </div>

        <div class="relative">
          <div class="md:px-12 md:py-4 pb-[150px] md:bg-brand-orange mt-12 md:rounded-full flex gap-4 overflow-x-auto scrollbar-hide team-container snap-x snap-mandatory md:snap-none" x-ref="teamContainer">
            <?php foreach (get_field('team')['team_member'] as $index => $member) { ?>
              <div class="relative bg-brand-orange rounded-full p-4 md:p-0 md:rounded-none md:bg-transparent w-[calc(100dvw-2.5rem)] md:w-auto team-member flex items-center flex-shrink-0 min-w-fit snap-center md:snap-align-none" :class="{ 'md:opacity-50': activeMember !== null && activeMember !== <?= $index ?> }">
                <div class="rounded-full  focus:outline-none bg-white/20 aspect-[120/168] w-full md:w-[7.5rem] shadow-team  overflow-hidden cursor-pointer h-full" @click.stop="activeMember = activeMember === <?= $index ?> ? null : <?= $index ?>; if(activeMember === <?= $index ?>) { setTimeout(() => { const container = $refs.teamContainer; const member = $el.closest('.team-member'); const padding = 48; const memberLeft = member.offsetLeft; const memberWidth = member.offsetWidth; const containerWidth = container.offsetWidth; const scrollLeft = container.scrollLeft; const memberRight = memberLeft + memberWidth; const visibleLeft = scrollLeft + padding; const visibleRight = scrollLeft + containerWidth - padding; if (memberLeft < visibleLeft || memberRight > visibleRight) { const scrollPos = memberLeft - padding; container.scrollTo({ left: scrollPos, behavior: 'smooth' }); } }, 350); }">
                  <img src="<?= $member['image']['url'] ?>" alt="<?= $member['image']['alt'] ?>" class="w-full h-full object-cover pt-5 object-top" />
                </div>
                <div class="md:h-full flex items-center justify-center flex-col absolute md:static left-0 bottom-[-130px] opacity-100 max-w-none team-member-details whitespace-nowrap overflow-hidden transition-all duration-300 ease-in-out" :class="activeMember === <?= $index ?> ? 'md:max-w-xs md:opacity-100' : 'md:max-w-0 md:opacity-0'">
                  <div class="md:pl-6 md:pr-3">
                    <h4 class="md:text-white text-[24px]/[110%] md:text-[32px]/[110%] tracking-[-0.48px] md:tracking-[-0.64px] font-bold"><?= str_replace(' ', '<br>', $member['name']) ?></h4>
                    <?php if ($member['link']) { ?>
                      <a href="<?= $member['link']['url'] ?>" target="<?= $member['link']['target'] ?>" class="flex gap-2 items-center justify-start font-semibold md:text-white/70  md:hover:text-white md:focus:text-white text-base/[110%] tracking-[-0.32px] mt-4 focus:underline hover:underline outline-none">
                        <span><?= $member['link']['title'] ?></span>
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1 11L11 1M11 1H2M11 1V10" stroke="currentColor" stroke-opacity="0.77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>

          <div class="absolute bottom-[40px] right-0 md:hidden flex gap-2">
            <button title="Previous team member" @click="const members = $refs.teamContainer.querySelectorAll('.team-member'); const container = $refs.teamContainer; const containerLeft = container.scrollLeft; const targetMember = Array.from(members).reverse().find(member => member.offsetLeft < containerLeft - 10); if(targetMember) { container.scrollTo({ left: targetMember.offsetLeft, behavior: 'smooth' }); }" class="bg-white rotate-180 px-6 py-4 h-[48px] items-center justify-center font-semibold text-xl text-brand-orange rounded-full ring-[6px] ring-inset ring-brand-orange flex focus:outline-none hover:bg-brand-orange hover:text-white focus:bg-brand-orange focus:text-white"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.25 8.33333H16.25M16.25 8.33333L9.16667 1.25M16.25 8.33333L9.16667 15.4167" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
            <button title="Next team member" @click="const members = $refs.teamContainer.querySelectorAll('.team-member'); const container = $refs.teamContainer; const containerLeft = container.scrollLeft; const containerWidth = container.offsetWidth; const targetMember = Array.from(members).find(member => member.offsetLeft > containerLeft + 10); if(targetMember) { container.scrollTo({ left: targetMember.offsetLeft, behavior: 'smooth' }); }" class="bg-white px-6 py-4 h-[48px] items-center justify-center font-semibold text-xl text-brand-orange rounded-full ring-[6px] ring-inset ring-brand-orange flex focus:outline-none hover:bg-brand-orange hover:text-white focus:bg-brand-orange focus:text-white"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.25 8.33333H16.25M16.25 8.33333L9.16667 1.25M16.25 8.33333L9.16667 15.4167" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
          </div>
        </div>


        <div class="mt-4 flex items-center justify-center">
          <a href="<?= get_field('team')['button']['url'] ?>" target="<?= get_field('team')['button']['target'] ?>" class="flex gap-1 w-full md:w-auto group focus:outline-none">
            <span class="w-full md:w-auto bg-brand-orange md:bg-transparent text-white px-6 py-4 h-[42px] md:h-[60px] flex items-center justify-center font-semibold text-base md:text-xl md:text-brand-orange rounded-full ring-[6px] ring-inset ring-brand-orange group-hover:bg-brand-orange group-hover:text-white group-focus:bg-brand-orange group-focus:text-white"><?= get_field('team')['button']['title'] ?></span>
            <span class="px-8 py-4 h-[60px] items-center justify-center font-semibold text-xl text-brand-orange rounded-full ring-[6px] ring-inset ring-brand-orange hidden md:flex"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.25 8.33333H16.25M16.25 8.33333L9.16667 1.25M16.25 8.33333L9.16667 15.4167" stroke="#F75F24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
          </a>
        </div>
      </div>

    </section>
    <div class="h-[52px] rounded-b-[52px] bg-brand-grey relative z-10"></div>


    <footer class="relative overflow-hidden -mt-[52px] pt-[52px]">

      <video autoplay loop muted playsinline class="w-full h-full absolute inset-0 object-cover blur-xl scale-150">
        <source src="<?= get_template_directory_uri(); ?>/images/features/blobs.mp4" type="video/mp4">
      </video>

      <div class="relative z-10 py-32">
        <div class="max-w-screen-xl mx-auto text-center px-3">
          <h4 class="text-white text-[28px]/[110%] md:text-[48px]/[110%] tracking-[-0.56px] md:tracking-[-0.96px] font-bold"><?= get_field('footer')['title'] ?></h4>
          <p class="mt-3 text-white text-base/[130%] md:text-xl/[130%] font-semibold mx-auto max-w-[590px]"><?= get_field('footer')['subtitle'] ?></p>

          <div class="mt-5 md:mt-11 flex items-center justify-center gap-1.5">
            <a href="<?= get_field('footer')['free_trial_button']['url'] ?>" target="<?= get_field('footer')['free_trial_button']['target'] ?>" class="focus:outline-none px-5 md:px-10 py-4 h-[60px] flex items-center justify-center font-semibold text-brand-orange text-xl bg-white rounded-full hover:bg-brand-black hover:text-white focus:bg-brand-black focus:text-white"><?= get_field('footer')['free_trial_button']['title'] ?></a>
            <a href="<?= get_field('footer')['talk_with_us_button']['url'] ?>" target="<?= get_field('footer')['talk_with_us_button']['target'] ?>" class="focus:outline-none px-9 py-4 h-[60px] flex items-center justify-center font-semibold text-xl text-white rounded-full ring-[6px] ring-inset ring-white hover:bg-white hover:text-brand-black focus:bg-white focus:text-brand-black"><?= get_field('footer')['talk_with_us_button']['title'] ?></a>
          </div>
        </div>
      </div>

      <div class="relative z-10 rounded-t-[52px] overflow-hidden">

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
                <img src="<?= get_template_directory_uri(); ?>/images/footer/subtrack.svg" alt="" class="w-full h-auto" />
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
              <a href="mailto:hello@afternoon.co.uk" class="text-brand-orange md:text-brand-black hover:text-brand-orange focus:outline-none focus:text-brand-orange">hello@afternoon.co.uk</a>
              <a href="https://www.linkedin.com/company/afternoon-finance" target="_blank" class="mt-2 focus:outline-none" title="Visit our LinkedIn">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="32" height="32" rx="16" fill="#FF520E" />
                  <path d="M12 15V20M12 12V12.01M16 20V15M20 20V17C20 16.4696 19.7893 15.9609 19.4142 15.5858C19.0391 15.2107 18.5304 15 18 15C17.4696 15 16.9609 15.2107 16.5858 15.5858C16.2107 15.9609 16 16.4696 16 17M8 10C8 9.46957 8.21071 8.96086 8.58579 8.58579C8.96086 8.21071 9.46957 8 10 8H22C22.5304 8 23.0391 8.21071 23.4142 8.58579C23.7893 8.96086 24 9.46957 24 10V22C24 22.5304 23.7893 23.0391 23.4142 23.4142C23.0391 23.7893 22.5304 24 22 24H10C9.46957 24 8.96086 23.7893 8.58579 23.4142C8.21071 23.0391 8 22.5304 8 22V10Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>

            </div>
          </div>
        </div>
      </div>
    </footer>
  </main>
</div>

<?php get_footer(); ?>