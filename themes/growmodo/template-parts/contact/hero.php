<?php
/**
 * Contact — hero + shortcut cards.
 *
 * @package Growmodo
 */

$email   = 'info@estatein.com';
$phone   = '+1 (123) 456-7890';
$phone_h = '+11234567890';

$socials = array(
	array( 'Instagram', 'https://www.instagram.com/' ),
	array( 'LinkedIn', 'https://www.linkedin.com/' ),
	array( 'Facebook', 'https://www.facebook.com/' ),
);
?>
<section class="border-b border-grey-15 bg-grey-10">
	<div class="container-estatein pt-12 md:pt-16 xl:pt-[100px]">
		<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3.5 h-[30px] w-[68px]" />
		<h1 class="heading-section max-w-[1358px]">Get In Touch With Estatein</h1>
		<p class="text-body mt-3.5 max-w-[1358px]">
			Welcome to Estatein's Contact Us page. We're here to assist you with any inquiries, requests, or feedback you may have. Whether you're looking to buy or sell a property, explore investment opportunities, or simply want to connect, we're just a message away. Reach out to us, and let's start a conversation.
		</p>
	</div>

	<div class="mt-10 border border-grey-15 bg-grey-08 p-2.5 shadow-[0_0_0_10px_#191919] md:mt-12 xl:mt-[50px] xl:p-5">
		<div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2 xl:grid-cols-4 xl:gap-5">
			<a
				href="<?php echo esc_url( 'mailto:' . $email ); ?>"
				class="card-elevated relative flex min-h-[160px] flex-col items-center justify-center gap-5 px-5 py-10 text-center no-underline transition hover:border-purple-75 md:min-h-[180px] xl:min-h-[212px]"
			>
				<img src="<?php echo esc_url( growmodo_img( 'icons/arrow-link.svg' ) ); ?>" alt="" width="34" height="34" class="absolute end-[19px] top-[19px] size-[34px]" />
				<?php
				get_template_part(
					'template-parts/shared/icon',
					'well',
					array(
						'icon' => 'contact/icons/email.svg',
						'size' => 'size-[74px] md:size-[82px]',
					)
				);
				?>
				<span class="text-lg font-semibold leading-[1.5] md:text-xl"><?php echo esc_html( $email ); ?></span>
			</a>

			<a
				href="<?php echo esc_url( 'tel:' . $phone_h ); ?>"
				class="card-elevated relative flex min-h-[160px] flex-col items-center justify-center gap-5 px-5 py-10 text-center no-underline transition hover:border-purple-75 md:min-h-[180px] xl:min-h-[212px]"
			>
				<img src="<?php echo esc_url( growmodo_img( 'icons/arrow-link.svg' ) ); ?>" alt="" width="34" height="34" class="absolute end-[19px] top-[19px] size-[34px]" />
				<?php
				get_template_part(
					'template-parts/shared/icon',
					'well',
					array(
						'icon' => 'contact/icons/phone.svg',
						'size' => 'size-[74px] md:size-[82px]',
					)
				);
				?>
				<span class="text-lg font-semibold leading-[1.5] md:text-xl"><?php echo esc_html( $phone ); ?></span>
			</a>

			<a
				href="#offices"
				class="card-elevated relative flex min-h-[160px] flex-col items-center justify-center gap-5 px-5 py-10 text-center no-underline transition hover:border-purple-75 md:min-h-[180px] xl:min-h-[212px]"
			>
				<img src="<?php echo esc_url( growmodo_img( 'icons/arrow-link.svg' ) ); ?>" alt="" width="34" height="34" class="absolute end-[19px] top-[19px] size-[34px]" />
				<?php
				get_template_part(
					'template-parts/shared/icon',
					'well',
					array(
						'icon' => 'contact/icons/location.svg',
						'size' => 'size-[74px] md:size-[82px]',
					)
				);
				?>
				<span class="text-lg font-semibold leading-[1.5] md:text-xl">Main Headquarters</span>
			</a>

			<div class="card-elevated relative flex min-h-[160px] flex-col items-center justify-center gap-5 px-5 py-10 text-center md:min-h-[180px] xl:min-h-[212px]">
				<img src="<?php echo esc_url( growmodo_img( 'icons/arrow-link.svg' ) ); ?>" alt="" width="34" height="34" class="pointer-events-none absolute end-[19px] top-[19px] size-[34px]" aria-hidden="true" />
				<?php
				get_template_part(
					'template-parts/shared/icon',
					'well',
					array(
						'icon' => 'contact/icons/social.svg',
						'size' => 'size-[74px] md:size-[82px]',
					)
				);
				?>
				<div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-lg font-semibold leading-[1.5] md:text-xl">
					<?php foreach ( $socials as $social ) : ?>
						<a class="text-absolute-white no-underline underline-offset-4 hover:text-purple-75 hover:underline" href="<?php echo esc_url( $social[1] ); ?>" target="_blank" rel="noopener noreferrer">
							<?php echo esc_html( $social[0] ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
