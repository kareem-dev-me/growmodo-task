<?php
/**
 * Shared section heading with Figma sparkle accent.
 *
 * @package Growmodo
 *
 * @var array $args {
 *   @type string $title
 *   @type string $body
 *   @type string $button_label
 *   @type string $button_url
 *   @type string $heading_id
 * }
 */

$title        = $args['title'] ?? '';
$body         = $args['body'] ?? '';
$button_label = $args['button_label'] ?? '';
$button_url   = $args['button_url'] ?? '';
$heading_id   = $args['heading_id'] ?? '';
?>
<div class="mb-12 flex flex-col gap-6 md:mb-14 xl:mb-20 xl:flex-row xl:items-end xl:justify-between xl:gap-[100px]">
	<div class="relative max-w-4xl flex-1">
		<img
			src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>"
			alt=""
			width="68"
			height="30"
			class="mb-3.5 h-[30px] w-[68px]"
		/>
		<h2 <?php echo $heading_id ? 'id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="heading-section">
			<?php echo esc_html( $title ); ?>
		</h2>
		<?php if ( $body ) : ?>
			<p class="text-body mt-3.5 max-w-3xl"><?php echo esc_html( $body ); ?></p>
		<?php endif; ?>
	</div>
	<?php if ( $button_label && $button_url ) : ?>
		<a class="btn-secondary shrink-0 self-start xl:self-auto" href="<?php echo esc_url( $button_url ); ?>">
			<?php echo esc_html( $button_label ); ?>
		</a>
	<?php endif; ?>
</div>
