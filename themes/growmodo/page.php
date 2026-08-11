<?php
/**
 * Default page template.
 *
 * @package Growmodo
 */

get_header();
?>

<article class="container-estatein py-16">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<h1 class="mb-8 text-4xl font-semibold"><?php the_title(); ?></h1>
		<div class="prose prose-invert max-w-none text-grey-60">
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
</article>

<?php
get_footer();
