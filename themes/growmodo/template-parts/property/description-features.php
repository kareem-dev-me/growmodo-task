<?php
/**
 * Single property — Description + Key Features.
 *
 * @package Growmodo
 *
 * @var array $args {
 *   @type array $meta Property meta.
 * }
 */

$meta     = $args['meta'] ?? growmodo_get_property_meta( get_the_ID() );
$features = growmodo_get_property_features( get_the_ID() );
?>
<div class="mt-10 grid gap-[30px] xl:mt-[50px] xl:grid-cols-2">
	<article class="card-surface flex flex-col rounded-xl p-6 md:p-10 xl:p-[50px]">
		<h2 class="text-xl font-semibold leading-[1.5] md:text-2xl">Description</h2>
		<div class="text-body mt-3.5 prose prose-invert max-w-none prose-p:text-grey-60">
			<?php
			$content = get_the_content();
			if ( $content ) {
				the_content();
			} else {
				echo '<p>' . esc_html( get_the_excerpt() ) . '</p>';
			}
			?>
		</div>

		<div class="mt-8 grid grid-cols-1 gap-5 border-t border-grey-15 pt-5 sm:grid-cols-3 sm:gap-[30px]">
			<div>
				<p class="mb-1.5 flex items-center gap-1.5 text-lg font-medium text-grey-60">
					<img src="<?php echo esc_url( growmodo_img( 'icons/bed.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
					Bedrooms
				</p>
				<p class="text-xl font-semibold md:text-2xl"><?php echo esc_html( $meta['bedrooms'] ?: '—' ); ?></p>
			</div>
			<div>
				<p class="mb-1.5 flex items-center gap-1.5 text-lg font-medium text-grey-60">
					<img src="<?php echo esc_url( growmodo_img( 'icons/bath.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
					Bathrooms
				</p>
				<p class="text-xl font-semibold md:text-2xl"><?php echo esc_html( $meta['bathrooms'] ?: '—' ); ?></p>
			</div>
			<div>
				<p class="mb-1.5 flex items-center gap-1.5 text-lg font-medium text-grey-60">
					<img src="<?php echo esc_url( growmodo_img( 'icons/area.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
					Area
				</p>
				<p class="text-xl font-semibold md:text-2xl"><?php echo esc_html( $meta['area'] ?: '—' ); ?></p>
			</div>
		</div>
	</article>

	<article class="card-surface flex flex-col rounded-xl p-6 md:p-10 xl:p-[50px]">
		<h2 class="text-xl font-semibold leading-[1.5] md:text-2xl">Key Features and Amenities</h2>
		<ul class="mt-8 flex flex-col gap-[30px]">
			<?php foreach ( $features as $feature ) : ?>
				<li class="flex items-start gap-3.5 rounded-xl border border-grey-15 bg-grey-08 px-4 py-[18px] md:px-6">
					<img src="<?php echo esc_url( growmodo_img( 'icons/feature-star.svg' ) ); ?>" alt="" width="24" height="24" class="mt-0.5 size-6 shrink-0" />
					<span class="text-lg font-medium leading-[1.5] text-absolute-white"><?php echo esc_html( $feature ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</article>
</div>
