<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'min-h-screen flex flex-col bg-grey-08 text-absolute-white' ); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-50 focus:rounded-md focus:bg-grey-10 focus:px-3 focus:py-2" href="#main">
	Skip to content
</a>

<?php get_template_part( 'template-parts/header/site', 'header' ); ?>

<main id="main" class="flex-1">
