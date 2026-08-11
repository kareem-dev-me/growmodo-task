<?php
/**
 * Properties archive.
 *
 * @package Growmodo
 */

get_header();
?>

<section class="border-b border-grey-15 bg-grey-10">
	<div class="container-estatein py-16 md:py-24">
		<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
		<h1 class="text-4xl font-semibold md:text-5xl">Find Your Dream Property</h1>
		<p class="mt-4 max-w-3xl text-lg font-medium text-grey-60">
			Welcome to Estatein's Property Listing page, where your dream property awaits. Explore our curated selection of properties.
		</p>
	</div>
</section>

<section class="container-estatein py-16 md:py-24">
	<?php if ( have_posts() ) : ?>
		<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/property/card' );
			endwhile;
			?>
		</div>
		<div class="mt-12">
			<?php the_posts_pagination(); ?>
		</div>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</section>

<?php
get_footer();
