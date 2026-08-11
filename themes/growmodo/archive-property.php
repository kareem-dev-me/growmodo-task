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
		<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3.5 h-[30px] w-[68px]" />
		<h1 class="heading-section">Find Your Dream Property</h1>
		<p class="text-body mt-4 max-w-3xl">
			Welcome to Estatein's Property Listing page, where your dream property awaits. Explore our curated selection of properties.
		</p>
	</div>
</section>

<section class="container-estatein py-16 md:py-24">
	<?php if ( have_posts() ) : ?>
		<div class="grid gap-[30px] md:grid-cols-2 xl:grid-cols-3">
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
