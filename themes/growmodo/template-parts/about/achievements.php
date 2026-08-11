<?php
/**
 * About — Our Achievements.
 *
 * @package Growmodo
 */

$achievements = array(
	array(
		'title' => '3+ Years of Excellence',
		'body'  => "With over 3 years in the industry, we've amassed a wealth of knowledge and experience, becoming a go-to resource for all things real estate.",
	),
	array(
		'title' => 'Happy Clients',
		'body'  => 'Our greatest achievement is the satisfaction of our clients. Their success stories fuel our passion for what we do.',
	),
	array(
		'title' => 'Industry Recognition',
		'body'  => "We've earned the respect of our peers and industry leaders, with accolades and awards that reflect our commitment to excellence.",
	),
);
?>
<section id="achievements" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => 'Our Achievements',
			'body'  => 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.',
		)
	);
	?>

	<div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3 xl:gap-10">
		<?php foreach ( $achievements as $item ) : ?>
			<article class="card-surface flex flex-col gap-4 rounded-[10px] p-8 shadow-[0_0_0_4px_#191919] md:gap-6 md:p-10 xl:gap-[30px] xl:p-[50px]">
				<h3 class="text-xl font-semibold leading-[1.5] md:text-2xl"><?php echo esc_html( $item['title'] ); ?></h3>
				<p class="text-body"><?php echo esc_html( $item['body'] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>
