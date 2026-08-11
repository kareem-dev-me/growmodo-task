<?php
/**
 * Template Name: Services
 *
 * @package Growmodo
 */

get_header();

get_template_part( 'template-parts/services/hero' );

get_template_part(
	'template-parts/services/service-grid',
	null,
	array(
		'id'    => 'valuation',
		'title' => 'Unlock Property Value',
		'body'  => 'Selling your property should be a rewarding experience, and at Estatein, we make sure it is. Our Property Selling Service is designed to maximize the value of your property, ensuring you get the best deal possible. Explore the categories below to see how we can help you at every step of your selling journey.',
		'cards' => array(
			array(
				'id'    => 'valuation-mastery',
				'title' => 'Valuation Mastery',
				'body'  => 'Discover the true worth of your property with our expert valuation services.',
				'icon'  => 'services/icons/valuation.svg',
			),
			array(
				'id'    => 'marketing',
				'title' => 'Strategic Marketing',
				'body'  => 'Selling a property requires more than just a listing; it demands a strategic marketing approach.',
				'icon'  => 'services/icons/marketing.svg',
			),
			array(
				'id'    => 'negotiation',
				'title' => 'Negotiation Wizardry',
				'body'  => 'Negotiating the best deal is an art, and our negotiation experts are masters of it.',
				'icon'  => 'services/icons/negotiation.svg',
			),
			array(
				'id'    => 'closing',
				'title' => 'Closing Success',
				'body'  => 'A successful sale is not complete until the closing. We guide you through the intricate closing process.',
				'icon'  => 'services/icons/closing.svg',
			),
		),
		'cta'   => array(
			'title'  => 'Unlock the Value of Your Property Today',
			'body'   => 'Ready to unlock the true value of your property? Explore our Property Selling Service categories and let us help you achieve the best deal possible for your valuable asset.',
			'url'    => home_url( '/contact/' ),
			'button' => 'Learn More',
		),
	)
);

get_template_part(
	'template-parts/services/service-grid',
	null,
	array(
		'id'    => 'management',
		'title' => 'Effortless Property Management',
		'body'  => "Owning a property should be a pleasure, not a hassle. Estatein's Property Management Service takes the stress out of property ownership, offering comprehensive solutions tailored to your needs. Explore the categories below to see how we can make property management effortless for you.",
		'cards' => array(
			array(
				'title' => 'Tenant Harmony',
				'body'  => 'Our Tenant Management services ensure that your tenants have a smooth and pleasant experience, reducing vacancies.',
				'icon'  => 'services/icons/tenant.svg',
			),
			array(
				'title' => 'Maintenance Ease',
				'body'  => 'Say goodbye to property maintenance headaches. We handle all aspects of property upkeep.',
				'icon'  => 'services/icons/maintenance.svg',
			),
			array(
				'title' => 'Financial Peace of Mind',
				'body'  => 'Managing property finances can be complex. Our financial experts take care of rent collection and reporting.',
				'icon'  => 'services/icons/financial.svg',
			),
			array(
				'title' => 'Legal Guardian',
				'body'  => 'Stay compliant with property laws and regulations effortlessly with our legal guidance.',
				'icon'  => 'services/icons/legal.svg',
			),
		),
		'cta'   => array(
			'title'  => 'Experience Effortless Property Management',
			'body'   => 'Ready to experience hassle-free property management? Explore our Property Management Service categories and let us handle the complexities while you enjoy the benefits of property ownership.',
			'url'    => home_url( '/contact/' ),
			'button' => 'Learn More',
		),
	)
);

get_template_part( 'template-parts/services/investments' );

get_footer();
