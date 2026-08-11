<?php
/**
 * Single property.
 *
 * @package Growmodo
 */

get_header();

while ( have_posts() ) :
	the_post();
	$meta = growmodo_get_property_meta( get_the_ID() );
	?>
	<article class="bg-grey-08">
		<section class="container-estatein py-12 md:py-16">
			<div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
				<div>
					<h1 class="text-3xl font-semibold md:text-5xl"><?php the_title(); ?></h1>
					<?php if ( $meta['location'] ) : ?>
						<p class="mt-2 text-lg font-medium text-grey-60"><?php echo esc_html( $meta['location'] ); ?></p>
					<?php endif; ?>
				</div>
				<p class="text-2xl font-semibold text-purple-75 md:text-3xl"><?php echo esc_html( $meta['price'] ?: 'Price on request' ); ?></p>
			</div>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="overflow-hidden rounded-[12px] border border-grey-15">
					<?php
					the_post_thumbnail(
						'full',
						array(
							'class'         => 'max-h-[640px] w-full object-cover',
							'fetchpriority' => 'high',
							'decoding'      => 'async',
						)
					);
					?>
				</div>
			<?php endif; ?>

			<div class="mt-8 grid gap-4 sm:grid-cols-3">
				<div class="card-surface p-5">
					<p class="text-sm text-grey-60">Bedrooms</p>
					<p class="mt-1 text-xl font-semibold"><?php echo esc_html( $meta['bedrooms'] ?: '—' ); ?></p>
				</div>
				<div class="card-surface p-5">
					<p class="text-sm text-grey-60">Bathrooms</p>
					<p class="mt-1 text-xl font-semibold"><?php echo esc_html( $meta['bathrooms'] ?: '—' ); ?></p>
				</div>
				<div class="card-surface p-5">
					<p class="text-sm text-grey-60">Area</p>
					<p class="mt-1 text-xl font-semibold"><?php echo esc_html( $meta['area'] ?: '—' ); ?></p>
				</div>
			</div>

			<div class="prose prose-invert mt-10 max-w-none text-grey-60">
				<?php the_content(); ?>
			</div>

			<div class="mt-10">
				<a class="btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Inquire About This Property</a>
			</div>
		</section>
	</article>
	<?php
endwhile;

get_footer();
