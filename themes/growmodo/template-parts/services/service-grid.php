<?php
/**
 * Services — asymmetric icon-card grid + wide CTA.
 *
 * @package Growmodo
 *
 * @var array $args {
 *   @type string $id
 *   @type string $title
 *   @type string $body
 *   @type array  $cards  Each: id?, title, body, icon
 *   @type array  $cta    title, body, url
 * }
 */

$id    = $args['id'] ?? '';
$title = $args['title'] ?? '';
$body  = $args['body'] ?? '';
$cards = $args['cards'] ?? array();
$cta   = $args['cta'] ?? array();

if ( ! $cards ) {
	return;
}
?>
<section id="<?php echo esc_attr( $id ); ?>" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => $title,
			'body'  => $body,
		)
	);
	?>

	<div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3 xl:gap-[30px]">
		<?php foreach ( $cards as $index => $card ) : ?>
			<?php
			$card_id    = $card['id'] ?? '';
			$is_last    = ( count( $cards ) - 1 ) === $index;
			$card_class = 'card-surface flex h-full flex-col gap-5 rounded-xl p-6 md:p-8 xl:p-[50px]';
			?>
			<article
				<?php echo $card_id ? 'id="' . esc_attr( $card_id ) . '"' : ''; ?>
				class="<?php echo esc_attr( $card_class ); ?>"
			>
				<div class="flex items-center gap-3.5 md:gap-4">
					<span class="inline-flex shrink-0 rounded-full border border-purple-75 p-2.5" aria-hidden="true">
						<span class="inline-flex rounded-full border border-purple-75 p-3.5">
							<img
								src="<?php echo esc_url( growmodo_img( $card['icon'] ) ); ?>"
								alt=""
								width="34"
								height="34"
								class="size-[34px]"
							/>
						</span>
					</span>
					<h3 class="text-xl font-semibold leading-[1.5] md:text-2xl"><?php echo esc_html( $card['title'] ); ?></h3>
				</div>
				<p class="text-body"><?php echo esc_html( $card['body'] ); ?></p>
			</article>

			<?php if ( $is_last && ! empty( $cta ) ) : ?>
				<article class="relative overflow-hidden rounded-xl border border-grey-15 bg-grey-10 p-6 md:col-span-2 md:p-8 xl:col-span-2 xl:p-[50px]">
					<img
						src="<?php echo esc_url( growmodo_img( 'patterns/hero-abstract.svg' ) ); ?>"
						alt=""
						width="1920"
						height="1280"
						class="pointer-events-none absolute inset-0 h-full w-full object-cover opacity-40"
						aria-hidden="true"
					/>
					<div class="relative z-10 flex h-full flex-col justify-between gap-5">
						<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6">
							<h3 class="text-xl font-semibold leading-[1.5] md:text-2xl xl:text-[30px]">
								<?php echo esc_html( $cta['title'] ); ?>
							</h3>
							<a class="btn-secondary shrink-0 self-start !bg-grey-08" href="<?php echo esc_url( $cta['url'] ); ?>">
								<?php echo esc_html( $cta['button'] ?? 'Learn More' ); ?>
							</a>
						</div>
						<p class="text-body max-w-4xl"><?php echo esc_html( $cta['body'] ); ?></p>
					</div>
				</article>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</section>
