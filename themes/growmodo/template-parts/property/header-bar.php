<?php
/**
 * Single property — title / location / price bar.
 *
 * @package Growmodo
 *
 * @var array $args {
 *   @type array $meta Property meta.
 * }
 */

$meta = $args['meta'] ?? growmodo_get_property_meta( get_the_ID() );
?>
<div class="mb-8 flex flex-col gap-5 md:mb-10 md:flex-row md:items-center md:justify-between xl:mb-[50px]">
	<div class="flex flex-col gap-4 md:flex-row md:items-center md:gap-5">
		<h1 class="text-[28px] font-semibold leading-[1.5] text-absolute-white md:text-4xl xl:text-[40px]">
			<?php the_title(); ?>
		</h1>
		<?php if ( ! empty( $meta['location'] ) ) : ?>
			<span class="inline-flex w-fit items-center gap-1.5 rounded-[28px] border border-grey-15 bg-grey-10 px-3.5 py-2 text-lg font-medium text-absolute-white">
				<img src="<?php echo esc_url( growmodo_img( 'icons/filter-location.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
				<?php echo esc_html( $meta['location'] ); ?>
			</span>
		<?php endif; ?>
	</div>
	<div class="shrink-0 md:text-end">
		<p class="text-body">Price</p>
		<p class="text-xl font-semibold leading-[1.5] text-absolute-white md:text-2xl">
			<?php echo esc_html( $meta['price'] ?: 'Price on request' ); ?>
		</p>
	</div>
</div>
