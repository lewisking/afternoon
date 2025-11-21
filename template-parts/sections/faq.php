<?php
/**
 * FAQ Section
 */

$faqs = afternoon_get_acf_field('faq', []);
?>

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
