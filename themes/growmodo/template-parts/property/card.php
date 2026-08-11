<?php
/**
 * Property card — Figma Card 75:564.
 *
 * @package Growmodo
 */

$post_id = get_the_ID();
$meta    = growmodo_get_property_meta( $post_id );
$type    = (string) get_post_meta( $post_id, '_property_type', true );
if ( '' === $type ) {
	$type = 'Villa';
}
?>
<article <?php post_class( 'card-surface flex h-full flex-col gap-[30px] overflow-hidden rounded-xl p-6 md:p-10' ); ?>>
	<a href="<?php the_permalink(); ?>" class="block h-[220px] overflow-hidden rounded-[10px] no-underline md:h-[318px]">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php
			the_post_thumbnail(
				'large',
				array(
					'class'   => 'size-full object-cover',
					'loading' => 'lazy',
					'alt'     => the_title_attribute( array( 'echo' => false ) ),
				)
			);
			?>
		<?php else : ?>
			<img
				src="<?php echo esc_url( growmodo_img( 'properties/prop-1.png' ) ); ?>"
				alt="<?php echo esc_attr( get_the_title() ); ?>"
				width="432"
				height="318"
				class="size-full object-cover"
				loading="lazy"
			/>
		<?php endif; ?>
	</a>

	<div class="flex flex-1 flex-col gap-[30px]">
		<div class="flex flex-col gap-1.5">
			<h3 class="text-xl font-semibold leading-[1.5] md:text-2xl">
				<a href="<?php the_permalink(); ?>" class="text-absolute-white no-underline hover:text-purple-75">
					<?php the_title(); ?>
				</a>
			</h3>
			<p class="text-body">
				<?php echo esc_html( wp_trim_words( get_the_excerpt(), 16, '... ' ) ); ?>
				<a href="<?php the_permalink(); ?>" class="text-absolute-white underline">Read More</a>
			</p>
		</div>

		<div class="flex flex-wrap gap-2.5">
			<span class="property-badge">
				<img src="<?php echo esc_url( growmodo_img( 'icons/bed.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
				<?php echo esc_html( $meta['bedrooms'] ?: '—' ); ?>
			</span>
			<span class="property-badge">
				<img src="<?php echo esc_url( growmodo_img( 'icons/bath.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
				<?php echo esc_html( $meta['bathrooms'] ?: '—' ); ?>
			</span>
			<span class="property-badge">
				<img src="<?php echo esc_url( growmodo_img( 'icons/villa.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
				<?php echo esc_html( $type ); ?>
			</span>
		</div>

		<div class="mt-auto flex flex-col gap-4 sm:flex-row sm:items-end sm:gap-[50px]">
			<div class="shrink-0">
				<p class="text-body">Price</p>
				<p class="text-xl font-semibold leading-[1.5] md:text-2xl"><?php echo esc_html( $meta['price'] ?: '—' ); ?></p>
			</div>
			<a class="btn-primary w-full flex-1 justify-center sm:w-auto" href="<?php the_permalink(); ?>">View Property Details</a>
		</div>
	</div>
</article>
