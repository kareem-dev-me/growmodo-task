<?php
/**
 * Feature card partial.
 *
 * @package Growmodo
 * @var array $args
 */

$title = isset( $args['title'] ) ? $args['title'] : '';
$body  = isset( $args['body'] ) ? $args['body'] : '';
?>
<article class="border-t-2 border-brand-500 pt-5">
	<h3 class="font-display text-xl font-semibold text-ink"><?php echo esc_html( $title ); ?></h3>
	<p class="mt-2 text-sm leading-relaxed text-ink/70"><?php echo esc_html( $body ); ?></p>
</article>
