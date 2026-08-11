<?php
/**
 * Template Name: Services
 *
 * @package Growmodo
 */

get_header();

$service_blocks = array(
	array(
		'id'    => 'valuation',
		'title' => 'Unlock Property Value',
		'intro' => 'Selling your property should be a rewarding experience. Estatein helps you maximize value with expert strategy.',
		'items' => array(
			'Valuation Mastery'      => 'Accurate market insights for confident pricing.',
			'Strategic Marketing'    => 'Campaigns that put your property in front of the right buyers.',
			'Negotiation Wizardry'   => 'Skilled advocates protecting your best interests.',
			'Closing Success'        => 'Smooth transactions from offer to keys.',
		),
	),
	array(
		'id'    => 'management',
		'title' => 'Effortless Property Management',
		'intro' => 'Owning property should be rewarding — not overwhelming. We handle operations so you can focus on returns.',
		'items' => array(
			'Tenant Harmony'           => 'Screening and support that retain great tenants.',
			'Maintenance Ease'         => 'Proactive upkeep that protects asset value.',
			'Financial Peace of Mind'  => 'Transparent reporting and reliable remittances.',
			'Legal Guardian'           => 'Compliance guidance for modern landlords.',
		),
	),
);
?>

<section class="border-b border-grey-15 bg-grey-10">
	<div class="container-estatein py-16 md:py-24">
		<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
		<h1 class="text-4xl font-semibold md:text-5xl">Elevate Your Real Estate Experience</h1>
		<p class="mt-4 max-w-3xl text-lg font-medium text-grey-60">
			Welcome to Estatein's Services page — your gateway to personalized real estate solutions.
		</p>
	</div>
</section>

<?php foreach ( $service_blocks as $block ) : ?>
	<section id="<?php echo esc_attr( $block['id'] ); ?>" class="container-estatein py-16 md:py-24">
		<img src="<?php echo esc_url( growmodo_img( 'icons/star.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
		<h2 class="text-3xl font-semibold md:text-5xl"><?php echo esc_html( $block['title'] ); ?></h2>
		<p class="mt-3 max-w-3xl text-lg font-medium text-grey-60"><?php echo esc_html( $block['intro'] ); ?></p>
		<div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
			<?php foreach ( $block['items'] as $title => $copy ) : ?>
				<article class="card-surface p-8">
					<h3 class="text-xl font-semibold"><?php echo esc_html( $title ); ?></h3>
					<p class="mt-3 text-base font-medium text-grey-60"><?php echo esc_html( $copy ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</section>
<?php endforeach; ?>

<section id="marketing" class="container-estatein pb-16 md:pb-24">
	<div class="card-surface flex flex-col gap-6 p-8 md:flex-row md:items-center md:justify-between md:p-12">
		<div class="max-w-3xl">
			<h2 class="text-3xl font-semibold md:text-4xl">Smart Investments, Informed Decisions</h2>
			<p class="mt-3 text-lg font-medium text-grey-60">
				Building a real estate portfolio takes insight. Our advisors help you evaluate opportunities with clarity.
			</p>
		</div>
		<a class="btn-primary shrink-0" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Learn More</a>
	</div>
</section>

<?php
get_footer();
