<?php
/**
 * Properties archive — hero + search + filters.
 *
 * @package Growmodo
 */

$archive_url = get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' );

// phpcs:disable WordPress.Security.NonceVerification.Recommended
$q_search   = isset( $_GET['q'] ) ? sanitize_text_field( wp_unslash( $_GET['q'] ) ) : '';
$q_location = isset( $_GET['location'] ) ? sanitize_text_field( wp_unslash( $_GET['location'] ) ) : '';
$q_type     = isset( $_GET['property_type'] ) ? sanitize_text_field( wp_unslash( $_GET['property_type'] ) ) : '';
$q_price    = isset( $_GET['price'] ) ? sanitize_text_field( wp_unslash( $_GET['price'] ) ) : '';
$q_size     = isset( $_GET['size'] ) ? sanitize_text_field( wp_unslash( $_GET['size'] ) ) : '';
$q_year     = isset( $_GET['year'] ) ? sanitize_text_field( wp_unslash( $_GET['year'] ) ) : '';
// phpcs:enable

$filters = array(
	array(
		'name'    => 'location',
		'label'   => 'Location',
		'icon'    => 'icons/filter-location.svg',
		'value'   => $q_location,
		'options' => array(
			''               => 'Location',
			'Coastal Estates'=> 'Coastal Estates',
			'Metropolitan City' => 'Metropolitan City',
			'Suburbia'       => 'Suburbia',
		),
	),
	array(
		'name'    => 'property_type',
		'label'   => 'Property Type',
		'icon'    => 'icons/filter-type.svg',
		'value'   => $q_type,
		'options' => array(
			''         => 'Property Type',
			'Villa'    => 'Villa',
			'Apartment'=> 'Apartment',
			'Townhouse'=> 'Townhouse',
		),
	),
	array(
		'name'    => 'price',
		'label'   => 'Pricing Range',
		'icon'    => 'icons/filter-price.svg',
		'value'   => $q_price,
		'options' => array(
			''           => 'Pricing Range',
			'under-500k' => 'Under $500,000',
			'500k-750k'  => '$500,000 – $750,000',
			'750k-plus'  => '$750,000+',
		),
	),
	array(
		'name'    => 'size',
		'label'   => 'Property Size',
		'icon'    => 'icons/filter-size.svg',
		'value'   => $q_size,
		'options' => array(
			''          => 'Property Size',
			'under-2000'=> 'Under 2,000 sq ft',
			'2000-2500' => '2,000 – 2,500 sq ft',
			'2500-plus' => '2,500+ sq ft',
		),
	),
	array(
		'name'    => 'year',
		'label'   => 'Build Year',
		'icon'    => 'icons/filter-year.svg',
		'value'   => $q_year,
		'options' => array(
			''       => 'Build Year',
			'2020+'  => '2020+',
			'2010-2019' => '2010 – 2019',
			'before-2010' => 'Before 2010',
		),
	),
);
?>
<section class="relative border-b border-grey-15 bg-grey-10 pb-8 md:pb-12">
	<div class="container-estatein pt-12 md:pt-16 xl:pt-[150px]">
		<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3.5 h-[30px] w-[68px]" />
		<h1 class="heading-section max-w-4xl">Find Your Dream Property</h1>
		<p class="text-body mt-3.5 max-w-[1358px]">
			Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story and a chance to redefine your life. With categories to suit every dreamer, your journey begins here.
		</p>
	</div>

	<div class="container-estatein mt-10 md:mt-12 xl:mt-14">
		<form method="get" action="<?php echo esc_url( $archive_url ); ?>" class="flex flex-col gap-5">
			<div class="flex flex-col gap-3 rounded-xl border border-grey-15 bg-grey-08 p-3.5 shadow-[0_0_0_6px_#191919] sm:flex-row sm:items-center sm:gap-2.5 sm:p-2.5 md:gap-4">
				<label for="property-search-q" class="sr-only">Search for a property</label>
				<input
					id="property-search-q"
					type="search"
					name="q"
					value="<?php echo esc_attr( $q_search ); ?>"
					placeholder="Search For A Property"
					class="min-w-0 flex-1 border-0 bg-transparent px-3 py-3 text-lg font-medium text-absolute-white placeholder:text-grey-60 focus:ring-0"
				/>
				<button type="submit" class="btn-primary inline-flex shrink-0 items-center justify-center gap-2 !px-5 !py-3.5 md:!px-6">
					<img src="<?php echo esc_url( growmodo_img( 'icons/search.svg' ) ); ?>" alt="" width="24" height="24" class="size-5 md:size-6" />
					Find Property
				</button>
			</div>

			<div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2 lg:grid-cols-5 lg:gap-2.5 xl:gap-5">
				<?php foreach ( $filters as $filter ) : ?>
					<label class="relative flex min-h-[72px] items-center gap-2.5 rounded-xl border border-grey-15 bg-grey-08 px-4 py-3.5">
						<img src="<?php echo esc_url( growmodo_img( $filter['icon'] ) ); ?>" alt="" width="24" height="24" class="size-6 shrink-0" />
						<span class="h-6 w-px shrink-0 bg-grey-15" aria-hidden="true"></span>
						<select
							name="<?php echo esc_attr( $filter['name'] ); ?>"
							class="min-w-0 flex-1 appearance-none border-0 bg-transparent p-0 pr-8 text-base font-medium text-absolute-white focus:ring-0 md:text-lg"
							aria-label="<?php echo esc_attr( $filter['label'] ); ?>"
						>
							<?php foreach ( $filter['options'] as $opt_value => $opt_label ) : ?>
								<option value="<?php echo esc_attr( $opt_value ); ?>" <?php selected( $filter['value'], (string) $opt_value ); ?>>
									<?php echo esc_html( $opt_label ); ?>
								</option>
							<?php endforeach; ?>
						</select>
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-down.svg' ) ); ?>" alt="" width="24" height="24" class="pointer-events-none absolute right-3 size-6" />
					</label>
				<?php endforeach; ?>
			</div>
		</form>
	</div>
</section>
