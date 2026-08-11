<?php
/**
 * Main index fallback.
 *
 * @package Growmodo
 */

get_header();
?>

<div class="container-estatein py-16">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article <?php post_class( 'mb-12 border-b border-grey-15 pb-10' ); ?>>
				<h2 class="text-2xl font-semibold">
					<a class="text-absolute-white no-underline hover:text-purple-75" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
				<div class="mt-4 text-grey-60">
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</div>

<?php
get_footer();
