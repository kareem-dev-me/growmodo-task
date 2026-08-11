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
		'avatar' => 'properties/prop-1.png',
	),
	array(
		'title'  => 'Efficient and Reliable',
		'body'   => 'Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price. We couldn\'t be happier with the results.',
		'name'   => 'Emelie Thomson',
		'place'  => 'USA, Florida',
		'avatar' => 'properties/prop-2.png',
	),
	array(
		'title'  => 'Trusted Advisors',
		'body'   => 'The Estatein team guided us through every step. Their expertise and commitment ensured a smooth transaction from start to finish.',
		'name'   => 'John Mans',
		'place'  => 'USA, Nevada',
		'avatar' => 'properties/prop-3.png',
	),
);
?>
<section id="testimonials" class="container-estatein py-16 md:py-24">
	<div class="mb-10 flex flex-col gap-6 md:mb-14 md:flex-row md:items-end md:justify-between">
		<div class="max-w-4xl">
			<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
			<h2 class="text-3xl font-semibold md:text-4xl lg:text-5xl">What Our Clients Say</h2>
			<p class="mt-3 max-w-3xl text-base font-medium text-grey-60 md:text-lg">
				Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.
			</p>
		</div>
		<a class="btn-secondary shrink-0 self-start" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">View All Testimonials</a>
	</div>

	<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
		<?php foreach ( $testimonials as $item ) : ?>
			<article class="card-surface flex h-full flex-col gap-8 p-8 md:p-[50px]">
				<div class="flex gap-2" aria-label="5 star rating">
					<?php for ( $i = 0; $i < 5; $i++ ) : ?>
						<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
					<?php endfor; ?>
				</div>
				<div>
					<h3 class="text-xl font-semibold md:text-2xl"><?php echo esc_html( $item['title'] ); ?></h3>
					<p class="mt-2.5 text-base font-medium text-grey-60 md:text-lg"><?php echo esc_html( $item['body'] ); ?></p>
				</div>
				<div class="mt-auto flex items-center gap-3.5">
					<img
						src="<?php echo esc_url( growmodo_img( $item['avatar'] ) ); ?>"
						alt=""
						width="60"
						height="60"
						class="size-[60px] rounded-full object-cover"
						loading="lazy"
					/>
					<div>
						<p class="text-lg font-semibold"><?php echo esc_html( $item['name'] ); ?></p>
						<p class="text-base font-medium text-grey-60"><?php echo esc_html( $item['place'] ); ?></p>
					</div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
