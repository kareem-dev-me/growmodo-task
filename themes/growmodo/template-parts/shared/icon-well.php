<?php
/**
 * Shared Figma icon well (concentric glowing rings + glyph).
 *
 * @package Growmodo
 *
 * @var array $args {
 *   @type string $icon  Path under assets/images/.
 *   @type string $size  Well size classes (default md:size-[74px]).
 * }
 */

$icon = $args['icon'] ?? '';
$size = $args['size'] ?? 'size-[60px] md:size-[74px]';

if ( ! $icon ) {
	return;
}
?>
<span class="relative inline-flex <?php echo esc_attr( $size ); ?> shrink-0 items-center justify-center" aria-hidden="true">
	<img
		src="<?php echo esc_url( growmodo_img( 'icons/icon-well.svg' ) ); ?>"
		alt=""
		width="74"
		height="74"
		class="absolute inset-0 size-full"
	/>
	<img
		src="<?php echo esc_url( growmodo_img( $icon ) ); ?>"
		alt=""
		width="34"
		height="34"
		class="relative z-10 size-5 md:size-[34px]"
	/>
</span>
