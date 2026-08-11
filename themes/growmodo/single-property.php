<?php
/**
 * Single property — Figma Property Details.
 *
 * @package Growmodo
 */

get_header();

while ( have_posts() ) :
	the_post();
	$meta = growmodo_get_property_meta( get_the_ID() );
	?>
	<article class="bg-grey-08">
		<section class="container-estatein section-y">
			<?php
			get_template_part( 'template-parts/property/header-bar', null, array( 'meta' => $meta ) );
			get_template_part( 'template-parts/property/gallery' );
			get_template_part( 'template-parts/property/description-features', null, array( 'meta' => $meta ) );
			?>
		</section>

		<?php
		get_template_part( 'template-parts/property/inquire', null, array( 'meta' => $meta ) );
		get_template_part( 'template-parts/property/pricing', null, array( 'meta' => $meta ) );
		get_template_part( 'template-parts/property/faq' );
		?>
	</article>
	<?php
endwhile;

get_footer();
