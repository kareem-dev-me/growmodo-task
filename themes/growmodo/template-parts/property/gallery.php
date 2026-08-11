<?php
/**
 * Single property — Figma gallery (thumbs + dual main + controls).
 *
 * @package Growmodo
 */

$urls  = growmodo_get_property_gallery_urls( get_the_ID(), 9 );
$count = count( $urls );
?>
<div
	id="property-gallery"
	class="card-surface rounded-xl p-5 md:p-10 xl:p-[50px]"
	data-gallery-count="<?php echo esc_attr( (string) $count ); ?>"
>
	<div class="mb-5 flex gap-5 overflow-x-auto pb-1 [-ms-overflow-style:none] [scrollbar-width:none] md:mb-8 [&::-webkit-scrollbar]:hidden">
		<?php foreach ( $urls as $i => $url ) : ?>
			<button
				type="button"
				class="property-gallery-thumb shrink-0 overflow-hidden rounded-lg border-2 <?php echo 0 === $i ? 'border-purple-60' : 'border-transparent'; ?>"
				data-gallery-index="<?php echo esc_attr( (string) $i ); ?>"
				aria-label="<?php echo esc_attr( sprintf( 'Show image %d', $i + 1 ) ); ?>"
			>
				<img
					src="<?php echo esc_url( $url ); ?>"
					alt=""
					width="144"
					height="94"
					class="h-[94px] w-[144px] object-cover"
					loading="<?php echo $i < 3 ? 'eager' : 'lazy'; ?>"
				/>
			</button>
		<?php endforeach; ?>
	</div>

	<div class="grid gap-5 md:grid-cols-2 md:gap-[30px]">
		<div class="overflow-hidden rounded-xl">
			<img
				id="property-gallery-main-a"
				src="<?php echo esc_url( $urls[0] ); ?>"
				alt="<?php echo esc_attr( get_the_title() ); ?>"
				width="733"
				height="583"
				class="aspect-[733/583] h-full w-full object-cover"
				fetchpriority="high"
			/>
		</div>
		<div class="overflow-hidden rounded-xl">
			<img
				id="property-gallery-main-b"
				src="<?php echo esc_url( $urls[ min( 1, $count - 1 ) ] ); ?>"
				alt=""
				width="733"
				height="583"
				class="aspect-[733/583] h-full w-full object-cover"
				loading="lazy"
			/>
		</div>
	</div>

	<div class="mt-6 flex justify-center gap-2.5 md:mt-8">
		<button type="button" id="property-gallery-next" class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-grey-10 transition hover:bg-grey-08" aria-label="Next images">
			<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-right.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
		</button>
		<button type="button" id="property-gallery-prev" class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-transparent transition hover:bg-grey-10" aria-label="Previous images">
			<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-left.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
		</button>
	</div>

	<script type="application/json" id="property-gallery-data"><?php echo wp_json_encode( array_values( $urls ) ); ?></script>
</div>
