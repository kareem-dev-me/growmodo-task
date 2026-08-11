<?php
/**
 * Default page template.
 *
 * @package Growmodo
 */

get_header();
?>

<article class="mx-auto max-w-3xl px-4 py-16">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<h1 class="mb-8 text-4xl font-bold text-ink"><?php the_title(); ?></h1>
		<div class="prose prose-neutral max-w-none">
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
</article>

<?php
get_footer();
