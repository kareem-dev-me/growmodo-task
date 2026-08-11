</main>

<footer class="mt-auto border-t border-brand-100 bg-brand-950 text-brand-50">
	<div class="mx-auto flex max-w-6xl flex-col gap-4 px-4 py-10 md:flex-row md:items-center md:justify-between">
		<p class="font-display text-lg font-medium">
			<?php bloginfo( 'name' ); ?>
		</p>
		<p class="text-sm text-brand-200">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
			<?php bloginfo( 'name' ); ?>.
			All rights reserved.
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
