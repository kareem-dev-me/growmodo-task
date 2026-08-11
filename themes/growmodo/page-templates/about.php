<?php
/**
 * Template Name: About Us
 *
 * @package Growmodo
 */

get_header();
?>

<section id="story" class="border-b border-grey-15 bg-grey-10">
	<div class="container-estatein grid gap-10 py-16 md:py-24 lg:grid-cols-2 lg:items-center">
		<div>
			<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
			<h1 class="text-4xl font-semibold md:text-5xl">Our Journey</h1>
			<p class="mt-4 text-lg font-medium text-grey-60">
				Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transformed the way people buy, sell, and dream about properties.
			</p>
		</div>
		<div class="overflow-hidden rounded-xl border border-grey-15">
			<img
				src="<?php echo esc_url( growmodo_img( 'hero/building-2.png' ) ); ?>"
				alt="Estatein office building"
				width="800"
				height="600"
				class="h-full w-full object-cover"
				loading="lazy"
			/>
		</div>
	</div>
</section>

<section id="works" class="container-estatein py-16 md:py-24">
	<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
	<h2 class="text-3xl font-semibold md:text-5xl">Our Values</h2>
	<p class="mt-3 max-w-3xl text-lg font-medium text-grey-60">Our story is one of continuous growth and evolution.</p>
	<div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
		<?php
		$values = array(
			array( 'Trust', 'Trust is the cornerstone of every relationship we build.' ),
			array( 'Excellence', 'We set the highest standards for every client experience.' ),
			array( 'Client-Centric', 'Your dreams and needs are at the center of our universe.' ),
			array( 'Our Commitment', 'We are dedicated to delivering outstanding results.' ),
		);
		foreach ( $values as $value ) :
			?>
			<article class="card-surface p-8">
				<h3 class="text-xl font-semibold md:text-2xl"><?php echo esc_html( $value[0] ); ?></h3>
				<p class="mt-3 text-base font-medium text-grey-60"><?php echo esc_html( $value[1] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<section id="how" class="container-estatein pb-16 md:pb-24">
	<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
	<h2 class="text-3xl font-semibold md:text-5xl">Navigating the Estatein Experience</h2>
	<p class="mt-3 max-w-3xl text-lg font-medium text-grey-60">Step-by-step guidance to make your property journey effortless.</p>
	<div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
		<?php
		$steps = array(
			array( '01', 'Discover a World of Possibilities', 'Explore curated listings tailored to your goals.' ),
			array( '02', 'Narrowing Down Your Choices', 'Use filters and expert advice to refine options.' ),
			array( '03', 'Personalized Guidance', 'Work with advisors who understand your priorities.' ),
		);
		foreach ( $steps as $step ) :
			?>
			<article class="card-surface border-t-2 border-t-purple-60 p-8">
				<p class="text-sm font-medium text-grey-60">Step <?php echo esc_html( $step[0] ); ?></p>
				<h3 class="mt-4 text-xl font-semibold md:text-2xl"><?php echo esc_html( $step[1] ); ?></h3>
				<p class="mt-3 text-base font-medium text-grey-60"><?php echo esc_html( $step[2] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<section id="team" class="container-estatein pb-16 md:pb-24">
	<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
	<h2 class="text-3xl font-semibold md:text-5xl">Meet the Estatein Team</h2>
	<p class="mt-3 max-w-3xl text-lg font-medium text-grey-60">Experienced professionals ready to guide your next move.</p>
	<div class="mt-10 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
		<?php
		$team = array( 'Max Mitchell', 'Sarah Johnson', 'David Brown', 'Michael Turner' );
		foreach ( $team as $i => $member ) :
			?>
			<article class="card-surface overflow-hidden p-6 text-center">
				<img
					src="<?php echo esc_url( growmodo_img( 'properties/prop-' . ( ( $i % 3 ) + 1 ) . '.png' ) ); ?>"
					alt="<?php echo esc_attr( $member ); ?>"
					width="300"
					height="300"
					class="mx-auto aspect-square w-full rounded-xl object-cover"
					loading="lazy"
				/>
				<h3 class="mt-5 text-xl font-semibold"><?php echo esc_html( $member ); ?></h3>
				<p class="text-base font-medium text-grey-60">Real Estate Specialist</p>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<section id="clients" class="container-estatein pb-16 md:pb-24">
	<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
	<h2 class="text-3xl font-semibold md:text-5xl">Our Valued Clients</h2>
	<p class="mt-3 max-w-3xl text-lg font-medium text-grey-60">Partnerships built on trust and results.</p>
	<div class="mt-10 grid gap-6 md:grid-cols-3">
		<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
			<article class="card-surface p-8">
				<p class="text-sm font-medium text-grey-60">Since 2019</p>
				<h3 class="mt-3 text-xl font-semibold">ABC Corporation</h3>
				<p class="mt-3 text-base font-medium text-grey-60">Estatein helped us secure strategic commercial spaces across three markets.</p>
			</article>
		<?php endfor; ?>
	</div>
</section>

<?php
get_footer();
