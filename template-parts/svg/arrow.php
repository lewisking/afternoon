<?php
$stroke = isset($svg_args['stroke']) ? esc_attr($svg_args['stroke']) : 'currentColor';
$classes = isset($svg_classes) ? esc_attr($svg_classes) : '';
?>
<svg <?= $classes ? 'class="' . $classes . '"' : ''; ?> width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M1.25 8.33333H16.25M16.25 8.33333L9.16667 1.25M16.25 8.33333L9.16667 15.4167" stroke="<?= $stroke; ?>" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
</svg>
