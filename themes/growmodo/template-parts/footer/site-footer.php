<?php
/**
 * Site footer.
 *
 * @package Growmodo
 */

$year = gmdate( 'Y' );
?>
<footer class="bg-grey-08">
	<div class="container-estatein flex flex-col gap-12 py-16 lg:flex-row lg:gap-20 lg:py-[100px]">
		<div class="flex w-full max-w-lg shrink-0 flex-col gap-[30px]">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2.5 no-underline">
				<img src="<?php echo esc_url( growmodo_img( 'logo/symbol.svg' ) ); ?>" alt="" width="48" height="48" class="size-12" />
				<img src="<?php echo esc_url( growmodo_img( 'logo/wordmark.svg' ) ); ?>" alt="Estatein" width="102" height="21" class="h-[21px] w-auto" />
			</a>

			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="flex w-full max-w-[423px] items-center gap-2.5 rounded-xl border border-grey-15 bg-grey-08 px-6 py-[18px]">
				<input type="hidden" name="action" value="growmodo_newsletter" />
				<?php wp_nonce_field( 'growmodo_newsletter', 'growmodo_newsletter_nonce' ); ?>
				<label for="newsletter-email" class="sr-only">Email</label>
				<img src="<?php echo esc_url( growmodo_img( 'icons/email.svg' ) ); ?>" alt="" width="24" height="24" class="size-6 shrink-0" />
				<input
					id="newsletter-email"
					type="email"
					name="email"
					required
					placeholder="Enter Your Email"
					class="min-w-0 flex-1 border-0 bg-transparent p-0 text-lg font-medium text-absolute-white placeholder:text-grey-60 focus:ring-0"
				/>
				<input type="text" name="website" value="" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />
				<button type="submit" class="shrink-0" aria-label="Subscribe">
					<img src="<?php echo esc_url( growmodo_img( 'icons/send.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
				</button>
			</form>
			<?php if ( isset( $_GET['newsletter'] ) && 'success' === $_GET['newsletter'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<p class="text-sm text-purple-75">Thanks for subscribing.</p>
			<?php endif; ?>
		</div>

		<div class="grid flex-1 grid-cols-2 gap-8 sm:grid-cols-3 lg:grid-cols-5 lg:justify-between">
			<?php
			$columns = array(
				'Home'       => array(
					array( 'Hero Section', home_url( '/#hero' ) ),
					array( 'Features', home_url( '/#features' ) ),
					array( 'Properties', home_url( '/#properties' ) ),
					array( 'Testimonials', home_url( '/#testimonials' ) ),
					array( "FAQ's", home_url( '/#faq' ) ),
				),
				'About Us'   => array(
					array( 'Our Story', home_url( '/about/#story' ) ),
					array( 'Our Works', home_url( '/about/#works' ) ),
					array( 'How It Works', home_url( '/about/#how' ) ),
					array( 'Our Team', home_url( '/about/#team' ) ),
					array( 'Our Clients', home_url( '/about/#clients' ) ),
				),
				'Properties' => array(
					array( 'Portfolio', get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' ) ),
					array( 'Categories', get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' ) ),
				),
				'Services'   => array(
					array( 'Valuation Mastery', home_url( '/services/#valuation' ) ),
					array( 'Strategic Marketing', home_url( '/services/#marketing' ) ),
					array( 'Negotiation Wizardry', home_url( '/services/#negotiation' ) ),
					array( 'Closing Success', home_url( '/services/#closing' ) ),
					array( 'Property Management', home_url( '/services/#management' ) ),
				),
				'Contact Us' => array(
					array( 'Contact Form', home_url( '/contact/#form' ) ),
					array( 'Our Offices', home_url( '/contact/#offices' ) ),
				),
			);
			foreach ( $columns as $title => $links ) :
				?>
				<div>
					<p class="mb-[30px] text-lg font-medium tracking-tight text-grey-60 md:text-xl"><?php echo esc_html( $title ); ?></p>
					<ul class="flex flex-col gap-5">
						<?php foreach ( $links as $link ) : ?>
							<li>
								<a class="text-base font-medium tracking-tight text-absolute-white no-underline hover:text-purple-75 md:text-lg" href="<?php echo esc_url( $link[1] ); ?>">
									<?php echo esc_html( $link[0] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="bg-grey-10">
		<div class="container-estatein flex flex-col items-start justify-between gap-4 py-4 md:flex-row md:items-center">
			<div class="flex flex-wrap gap-6 py-2.5 text-base font-medium tracking-tight text-absolute-white md:gap-[38px] md:text-lg">
				<p>@<?php echo esc_html( $year ); ?> Estatein. All Rights Reserved.</p>
				<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>" class="no-underline hover:text-purple-75">Terms &amp; Conditions</a>
			</div>
			<div class="flex gap-2.5 py-2.5">
				<?php
				$socials = array(
					array( 'facebook', 'Facebook', '#' ),
					array( 'linkedin', 'LinkedIn', '#' ),
					array( 'twitter', 'X / Twitter', '#' ),
					array( 'youtube', 'YouTube', '#' ),
				);
				foreach ( $socials as $social ) :
					?>
					<a
						href="<?php echo esc_url( $social[2] ); ?>"
						class="inline-flex rounded-[58px] bg-grey-08 p-3.5 hover:bg-grey-15"
						aria-label="<?php echo esc_attr( $social[1] ); ?>"
					>
						<img
							src="<?php echo esc_url( growmodo_img( 'icons/social-' . $social[0] . '.svg' ) ); ?>"
							alt=""
							width="24"
							height="24"
							class="size-6"
						/>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</footer>
