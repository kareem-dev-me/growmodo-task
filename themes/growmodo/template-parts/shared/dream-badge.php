<?php
/**
 * Hero dream property badge — CSS circular text + center arrow.
 *
 * @package Growmodo
 *
 * @var array $args {
 *   @type string $url   Link target.
 *   @type string $class Extra positioning classes.
 * }
 */

$url   = $args['url'] ?? ( get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' ) );
$class = $args['class'] ?? '';
/* Figma 121:1783–1812 = 30 glyphs around the ring. */
$text  = '✦ Discover Your Dream Property';
$chars = preg_split( '//u', $text, -1, PREG_SPLIT_NO_EMPTY );
$total = count( $chars );
?>
<a
	href="<?php echo esc_url( $url ); ?>"
	class="dream-badge <?php echo esc_attr( $class ); ?>"
	aria-label="Discover your dream property"
	style="--dream-badge-chars: <?php echo esc_attr( (string) $total ); ?>"
>
	<span class="dream-badge__text" aria-hidden="true">
		<?php foreach ( $chars as $i => $char ) : ?>
			<span class="dream-badge__char" style="--i: <?php echo esc_attr( (string) $i ); ?>">
				<?php echo ' ' === $char ? '&nbsp;' : esc_html( $char ); ?>
			</span>
		<?php endforeach; ?>
	</span>
	<span class="dream-badge__core" aria-hidden="true">
		<span class="dream-badge__arrow"></span>
	</span>
</a>
