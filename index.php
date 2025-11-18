<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
  <header class="mb-8 flex items-center justify-between">
    <a href="<?= site_url() ?>" class="text-4xl font-bold text-gray-900">
      <?php bloginfo('name'); ?>
    </a>
    <?php
    wp_nav_menu(array(
      'theme_location' => 'primary',
      'menu_class' => 'flex space-x-4',
      'container' => 'nav',
      'container_class' => 'mt-2',
      'fallback_cb' => false,
    ));
    ?>
  </header>

  <main>
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>
        <article class="mb-8 p-6 bg-white rounded-lg shadow-md">
          <h2 class="text-2xl font-semibold mb-4">
            <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800">
              <?php the_title(); ?>
            </a>
          </h2>
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

<?php get_footer(); ?>