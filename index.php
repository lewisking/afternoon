<?php get_header(); ?>

<div class="relative">
  <?php get_template_part('template-parts/navigation') ?>

  <div class="pt-[120px]">
    <div class="max-w-screen-xl mx-auto px-5 md:px-8 lg:px-10">
      <main>
        <?php
        if (have_posts()) :
          while (have_posts()) : the_post();
        ?>
            <h1 class="text-[32px]/[38px] md:text-[48px]/[60px] lg:text-[52px]/[60px] text-brand-black font-bold tracking-tighter-4xl mb-4">
              <?php the_title(); ?>
            </h1>
            <article class="">
              <div class="prose max-w-none">
                <?php the_content(); ?>
              </div>
            </article>
          <?php
          endwhile;
        else :
          ?>
          <p class="text-gray-600">No posts found.</p>
        <?php endif; ?>
      </main>
    </div>
  </div>

  <?php get_template_part('template-parts/footer') ?>

</div>

<?php get_footer(); ?>