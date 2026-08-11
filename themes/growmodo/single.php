<?php
/**
 * Single post template.
 *
 * @package Growmodo
 */

get_header();
?>

<article class="mx-auto max-w-3xl px-4 py-16">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<header class="mb-8">
			<h1 class="text-4xl font-bold text-ink"><?php the_title(); ?></h1>
			<p class="mt-2 text-sm text-ink/60"><?php echo esc_html( get_the_date() ); ?></p>
		</header>
		<div class="prose prose-neutral max-w-none">
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
</article>

<?php
get_footer();
