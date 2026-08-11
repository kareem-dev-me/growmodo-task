<?php
/**
 * Single property — Comprehensive Pricing Details.
 *
 * @package Growmodo
 *
 * @var array $args {
 *   @type array $meta Property meta.
 * }
 */

$meta  = $args['meta'] ?? growmodo_get_property_meta( get_the_ID() );
$title = get_the_title();
$price = $meta['price'] ?: '$1,250,000';

$groups = array(
	array(
		'title'   => 'Additional Fees',
		'columns' => 2,
		'items'   => array(
			array(
				'label'  => 'Property Transfer Tax',
				'amount' => '$25,000',
				'note'   => 'Based on the sale price and local regulations',
			),
			array(
				'label'  => 'Legal Fees',
				'amount' => '$3,000',
				'note'   => 'Approximate cost for legal services, including title transfer',
			),
			array(
				'label'  => 'Home Inspection',
				'amount' => '$500',
				'note'   => 'Recommended for due diligence',
			),
			array(
				'label'  => 'Property Insurance',
				'amount' => '$1,200',
				'note'   => 'Annual cost for comprehensive property insurance',
			),
			array(
				'label'  => 'Mortgage Fees',
				'amount' => 'Varies',
				'note'   => 'If applicable, consult with your lender for specific details',
				'span'   => true,
			),
		),
	),
	array(
		'title'   => 'Monthly Costs',
		'columns' => 2,
		'items'   => array(
			array(
				'label'  => 'Property Taxes',
				'amount' => '$1,250',
				'note'   => 'Approximate monthly property tax based on the sale price and local rates',
			),
			array(
				'label'  => "Homeowners' Association Fee",
				'amount' => '$300',
				'note'   => 'Monthly fee for common area maintenance and security',
			),
		),
	),
	array(
		'title'   => 'Total Initial Costs',
		'columns' => 2,
		'items'   => array(
			array(
				'label'  => 'Listing Price',
				'amount' => $price,
				'note'   => '',
			),
			array(
				'label'  => 'Additional Fees',
				'amount' => '$29,700',
				'note'   => 'Property transfer tax, legal fees, inspection, insurance',
			),
			array(
				'label'  => 'Down Payment',
				'amount' => '$250,000',
				'note'   => '20%',
			),
			array(
				'label'  => 'Mortgage Amount',
				'amount' => '$1,000,000',
				'note'   => 'If applicable',
			),
		),
	),
	array(
		'title'   => 'Monthly Expenses',
		'columns' => 2,
		'items'   => array(
			array(
				'label'  => 'Property Taxes',
				'amount' => '$1,250',
				'note'   => '',
			),
			array(
				'label'  => "Homeowners' Association Fee",
				'amount' => '$300',
				'note'   => '',
			),
			array(
				'label'  => 'Mortgage Payment',
				'amount' => 'Varies based on terms and interest rate',
				'note'   => 'If applicable',
			),
			array(
				'label'  => 'Property Insurance',
				'amount' => '$100',
				'note'   => 'Approximate monthly coverage',
			),
		),
	),
);
?>
<section id="pricing" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => 'Comprehensive Pricing Details',
			'body'  => sprintf(
				'At Estatein, transparency is key. We want you to have a clear understanding of all costs associated with your property investment. Below, we break down the pricing for %s to help you make an informed decision.',
				$title
			),
		)
	);
	?>

	<div class="mt-10 space-y-[30px] xl:mt-[60px]">
		<div class="card-surface flex flex-col gap-2.5 rounded-xl p-6 md:flex-row md:items-start md:gap-5 md:p-10 xl:p-[50px]">
			<span class="shrink-0 text-lg font-semibold text-absolute-white md:text-xl">Note</span>
			<p class="text-body">The figures provided above are estimates and may vary depending on the property, location, and individual circumstances.</p>
		</div>

		<div class="card-surface rounded-xl p-6 md:p-10 xl:p-[50px]">
			<p class="text-lg font-medium text-grey-60 md:text-xl">Listing Price</p>
			<p class="mt-1 text-2xl font-semibold text-absolute-white md:text-[30px]"><?php echo esc_html( $price ); ?></p>
		</div>

		<?php foreach ( $groups as $group ) : ?>
			<div class="card-surface rounded-xl p-6 md:p-10 xl:p-[50px]">
				<div class="mb-6 flex flex-col gap-4 sm:mb-8 sm:flex-row sm:items-center sm:justify-between">
					<h3 class="text-xl font-semibold md:text-2xl"><?php echo esc_html( $group['title'] ); ?></h3>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-secondary inline-flex self-start !bg-grey-10 px-5 py-3.5 text-sm">Learn More</a>
				</div>
				<div class="grid gap-5 <?php echo 2 === (int) $group['columns'] ? 'md:grid-cols-2 md:gap-[30px]' : ''; ?>">
					<?php foreach ( $group['items'] as $item ) : ?>
						<div class="rounded-xl border border-grey-15 bg-grey-08 p-5 <?php echo ! empty( $item['span'] ) ? 'md:col-span-2' : ''; ?>">
							<div class="flex flex-wrap items-baseline justify-between gap-2">
								<p class="text-lg font-medium text-grey-60"><?php echo esc_html( $item['label'] ); ?></p>
								<p class="text-xl font-semibold text-absolute-white"><?php echo esc_html( $item['amount'] ); ?></p>
							</div>
							<?php if ( ! empty( $item['note'] ) ) : ?>
								<p class="text-body mt-2.5"><?php echo esc_html( $item['note'] ); ?></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
