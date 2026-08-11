<?php
/**
 * Shared carousel footer — counter + next-first controls (matches home featured).
 *
 * @package Growmodo
 *
 * @var array $args {
 *   @type int    $total       Total pages/slides shown in counter (fallback).
 *   @type string $prev_label  Aria label for previous.
 *   @type string $next_label  Aria label for next.
 *   @type string $class       Optional extra classes on the footer row.
 * }
 */

$total      = max( 1, (int) ( $args['total'] ?? 1 ) );
$prev_label = $args['prev_label'] ?? 'Previous';
$next_label = $args['next_label'] ?? 'Next';
$class      = $args['class'] ?? 'mt-8 flex items-center justify-between border-t border-grey-15 pt-5 xl:mt-[50px]';
?>
<div class="<?php echo esc_attr( $class ); ?>">
	<p class="text-lg font-medium leading-[1.5] text-grey-60 md:text-xl" aria-live="polite">
		<span class="text-absolute-white" data-featured-current>01</span>
		of
		<span data-featured-total><?php echo esc_html( str_pad( (string) $total, 2, '0', STR_PAD_LEFT ) ); ?></span>
	</p>
	<div class="flex gap-2.5">
		<button
			type="button"
			class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-grey-10 transition hover:bg-grey-08"
			data-featured-next
			aria-label="<?php echo esc_attr( $next_label ); ?>"
		>
			<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-right.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
		</button>
		<button
			type="button"
			class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-transparent transition hover:bg-grey-10"
			data-featured-prev
			aria-label="<?php echo esc_attr( $prev_label ); ?>"
		>
			<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-left.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
		</button>
	</div>
</div>
