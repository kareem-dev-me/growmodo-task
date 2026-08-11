<?php
/**
 * Home testimonials.
 *
 * @package Growmodo
 */

$testimonials = array(
	array(
		'title'  => 'Exceptional Service!',
		'body'   => "Our experience with Estatein was outstanding. Their team's dedication and professionalism made finding our dream home a breeze. Highly recommended!",
		'name'   => 'Wade Warren',
		'place'  => 'USA, California',
		'avatar' => 'avatars/wade.png',
	),
	array(
		'title'  => 'Efficient and Reliable',
		'body'   => "Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price. We couldn't be happier with the results.",
		'name'   => 'Emelie Thomson',
		'place'  => 'USA, Florida',
		'avatar' => 'avatars/emelie.png',
	),
	array(
		'title'  => 'Trusted Advisors',
		'body'   => 'The Estatein team guided us through the entire buying process. Their knowledge and commitment to our needs were impressive. Thank you for your support!',
		'name'   => 'John Mans',
		'place'  => 'USA, Nevada',
		'avatar' => 'avatars/john.png',
	),
);
?>
<section id="testimonials" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title'        => 'What Our Clients Say',
			'body'         => 'Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.',
			'button_label' => 'View All Testimonials',
			'button_url'   => home_url( '/about/' ),
		)
	);
	?>

	<div class="grid gap-[30px] md:grid-cols-2 xl:grid-cols-3">
		<?php foreach ( $testimonials as $item ) : ?>
			<article class="card-surface flex h-full flex-col gap-8 rounded-xl p-8 md:gap-10 md:p-[50px]">
				<div class="flex gap-2.5" aria-label="5 star rating">
					<?php for ( $i = 0; $i < 5; $i++ ) : ?>
						<img src="<?php echo esc_url( growmodo_img( 'icons/rating-star.svg' ) ); ?>" alt="" width="44" height="44" class="size-11" />
					<?php endfor; ?>
				</div>
				<div class="flex flex-col gap-3.5">
					<h3 class="text-xl font-semibold leading-[1.5] md:text-2xl"><?php echo esc_html( $item['title'] ); ?></h3>
					<p class="text-lg font-medium leading-[1.5] text-absolute-white"><?php echo esc_html( $item['body'] ); ?></p>
				</div>
				<div class="mt-auto flex items-center gap-3">
					<img
						src="<?php echo esc_url( growmodo_img( $item['avatar'] ) ); ?>"
						alt=""
						width="60"
						height="60"
						class="size-[60px] rounded-full object-cover"
						loading="lazy"
					/>
					<div class="flex flex-col gap-0.5">
						<p class="text-xl font-medium leading-[1.5]"><?php echo esc_html( $item['name'] ); ?></p>
						<p class="text-body !text-base md:!text-lg"><?php echo esc_html( $item['place'] ); ?></p>
					</div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
