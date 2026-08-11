<?php
/**
 * About — Meet the Estatein Team.
 *
 * @package Growmodo
 */

$team = array(
	array(
		'name'   => 'Max Mitchell',
		'role'   => 'Founder',
		'avatar' => 'about/team/max-mitchell.png',
		'twitter'=> 'https://twitter.com/',
	),
	array(
		'name'   => 'Sarah Johnson',
		'role'   => 'Chief Real Estate Officer',
		'avatar' => 'about/team/sarah-johnson.png',
		'twitter'=> 'https://twitter.com/',
	),
	array(
		'name'   => 'David Brown',
		'role'   => 'Head of Property Management',
		'avatar' => 'about/team/david-brown.png',
		'twitter'=> 'https://twitter.com/',
	),
	array(
		'name'   => 'Michael Turner',
		'role'   => 'Legal Counsel',
		'avatar' => 'about/team/michael-turner.png',
		'twitter'=> 'https://twitter.com/',
	),
);
?>
<section id="team" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => 'Meet the Estatein Team',
			'body'  => 'At Estatein, our success is driven by the dedication and expertise of our team. Get to know the people behind our mission to make your real estate dreams a reality.',
		)
	);
	?>

	<div class="grid gap-[30px] sm:grid-cols-2 xl:grid-cols-4">
		<?php foreach ( $team as $member ) : ?>
			<article class="card-surface flex flex-col gap-8 rounded-xl p-5 text-center md:gap-10 md:p-6 xl:p-[30px]">
				<div class="relative">
					<img
						src="<?php echo esc_url( growmodo_img( $member['avatar'] ) ); ?>"
						alt="<?php echo esc_attr( $member['name'] ); ?>"
						width="317"
						height="253"
						class="aspect-[317/253] w-full rounded-xl object-cover"
						loading="lazy"
					/>
					<a
						href="<?php echo esc_url( $member['twitter'] ); ?>"
						target="_blank"
						rel="noopener noreferrer"
						class="absolute bottom-0 left-1/2 inline-flex h-[52px] w-[76px] -translate-x-1/2 translate-y-1/2 items-center justify-center rounded-full bg-purple-60 transition hover:bg-[#8254f8]"
						aria-label="<?php echo esc_attr( sprintf( 'Follow %s on X', $member['name'] ) ); ?>"
					>
						<img src="<?php echo esc_url( growmodo_img( 'about/icons/twitter-x.svg' ) ); ?>" alt="" width="24" height="24" class="size-5" />
					</a>
				</div>

				<div class="flex flex-col gap-5 pt-4">
					<div class="flex flex-col gap-0.5">
						<h3 class="text-xl font-semibold leading-[1.5]"><?php echo esc_html( $member['name'] ); ?></h3>
						<p class="text-body !text-base md:!text-lg"><?php echo esc_html( $member['role'] ); ?></p>
					</div>
					<a
						href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
						class="inline-flex w-full items-center justify-center gap-2 rounded-full border border-grey-15 bg-grey-08 px-5 py-3.5 text-lg font-medium text-absolute-white transition hover:bg-grey-10"
					>
						Say Hello 👋
					</a>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
