<?php
/**
 * Front page — Estatein home.
 *
 * @package Growmodo
 */

get_header();
?>

<div class="bg-grey-08">
	<?php get_template_part( 'template-parts/home/hero' ); ?>
	<?php get_template_part( 'template-parts/home/featured-properties' ); ?>
	<?php get_template_part( 'template-parts/home/testimonials' ); ?>
	<?php get_template_part( 'template-parts/home/faq' ); ?>
</div>

<?php
get_footer();
