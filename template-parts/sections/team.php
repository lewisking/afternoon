<?php
/**
 * Team Section
 */

$team = afternoon_get_acf_field('team', []);
$team_title = isset($team['title']) ? str_replace(['<p>', '</p>'], '', wp_kses_post($team['title'])) : '';
$team_description = isset($team['description']) ? wp_kses_post($team['description']) : '';
$team_members = isset($team['team_member']) && is_array($team['team_member']) ? $team['team_member'] : [];
$team_button = isset($team['button']) ? $team['button'] : [];
?>

<section class="relative" id="team">
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
            <div class="rounded-full focus:outline-none bg-white/20 aspect-[120/168] w-full sm:w-[7.5rem] shadow-team  overflow-hidden cursor-pointer h-full" @click.stop="activeMember = activeMember === <?= $index; ?> ? null : <?= $index; ?>; if(activeMember === <?= $index; ?>) { setTimeout(() => { const container = $refs.teamContainer; const member = $el.closest('.team-member'); const padding = 48; const memberLeft = member.offsetLeft; const memberWidth = member.offsetWidth; const containerWidth = container.offsetWidth; const scrollLeft = container.scrollLeft; const memberRight = memberLeft + memberWidth; const visibleLeft = scrollLeft + padding; const visibleRight = scrollLeft + containerWidth - padding; if (memberLeft < visibleLeft || memberRight > visibleRight) { const scrollPos = memberLeft - padding; container.scrollTo({ left: scrollPos, behavior: 'smooth' }); } }, 350); }">
              <?php if ($member_image_url) : ?>
                <img loading="lazy" src="<?= $member_image_url; ?>" alt="<?= $member_image_alt; ?>" class="w-full h-full object-cover object-top" />
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
          <span class="px-8 py-4 h-[60px] items-center justify-center font-semibold text-xl text-brand-orange rounded-full ring-6 ring-inset ring-brand-orange group-hover:bg-brand-orange-hover group-hover:ring-brand-orange-hover group-hover:text-white group-focus:bg-brand-orange-active group-focus:ring-brand-orange-active group-focus:text-white hidden sm:flex">
            <?php afternoon_svg('arrow', '', ['stroke' => 'currentColor']); ?>
          </span>
        </a>
      </div>
    <?php endif; ?>
  </div>

</section>
