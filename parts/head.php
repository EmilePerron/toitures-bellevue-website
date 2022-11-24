<?php
setlocale(LC_ALL, ['fr_CA', 'fr_CA.UTF-8', 'fr']);
date_default_timezone_set('America/Toronto');
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/assets/css/style.css?v=0.3.1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/fontawesome/css/custom.min.css">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
<link rel="manifest" href="/assets/icons/site.webmanifest">
<link rel="mask-icon" href="/assets/icons/safari-pinned-tab.svg" color="#991747">
<link rel="shortcut icon" href="/assets/icons/favicon.ico">
<meta name="apple-mobile-web-app-title" content="Toitures Bellevue">
<meta name="application-name" content="Toitures Bellevue">
<meta name="msapplication-TileColor" content="#b91d47">
<meta name="msapplication-config" content="/assets/icons/browserconfig.xml">
<meta name="theme-color" content="#991747">
<meta property="og:image" content="/assets/media/og-image.jpg">
<meta name="twitter:card" content="summary">
<link rel="preload" as="image" href="/assets/media/heading-background-blurred.jpg" />

<?php if (strpos($_SERVER['SERVER_NAME'] ?? '', 'dev.toituresbellevue.com') === false && strpos($_SERVER['SERVER_NAME'] ?? '', 'localhost') === false) : ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-3FRSJ5Z332"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-3FRSJ5Z332');
	</script>
<?php else : ?>
	<script>
		function gtag() {
			console.log('DEVMODE: gtag() function called with following arguments:', {...arguments});
		 }
	</script>
<?php endif ?>

<script type="application/ld+json">
{
	"@context": "http://www.schema.org",
	"@type": "LocalBusiness",
	"@id": "https://www.toituresbellevue.com",
	"name": "Toitures Bellevue",
	"url": "https://www.toituresbellevue.com",
	"logo": "https://www.toituresbellevue.com/assets/media/logo_toiture-bellevue.png",
	"image": "https://www.toituresbellevue.com/assets/media/og-image.jpg",
	"description": "Votre spécialiste en toiture résidentielle et commerciale à Québec",
	"email": "info@toituresbellevue.com",
	"telephone": "+15819096111",
	"address": {
		"@type": "PostalAddress",
		"streetAddress": "13838 rue Longchamps",
		"addressLocality": "Québec",
		"addressRegion": "Québec",
		"postalCode": "G3E 1P2",
		"addressCountry": "CA"
	},
	"contactPoint": {
		"@type": "ContactPoint",
		"telephone": "+15819096111",
		"contactType": "Service à la clientèle"
	},
	"areaServed": {
		"@type": "City",
		"name": "Québec"
	},
	"priceRange": "$-$$",
	"hasOfferCatalog": {
		"@type": "OfferCatalog",
		"name": "Cleaning services",
		"itemListElement": [
			{
				"@type": "OfferCatalog",
				"name": "Travaux de toiture",
				"itemListElement": [
					{
						"@type": "Offer",
						"itemOffered": {
							"@type": "Service",
							"name": "Pose de nouvelle toiture"
						}
					},
					{
						"@type": "Offer",
						"itemOffered": {
							"@type": "Service",
							"name": "Réfection de toiture",
							"url": "https://www.toituresbellevue.com/services/refection-de-toiture"
						}
					},
					{
						"@type": "Offer",
						"itemOffered": {
							"@type": "Service",
							"name": "Réparation de toiture",
							"url": "https://www.toituresbellevue.com/services/reparation-de-toiture"
						}
					},
					{
						"@type": "Offer",
						"itemOffered": {
							"@type": "Service",
							"name": "Inspection de toiture",
							"url": "https://www.toituresbellevue.com/services/inspection-de-toiture"
						}
					},
					{
						"@type": "Offer",
						"itemOffered": {
							"@type": "Service",
							"name": "Ventilation et isolation d'entre-toit",
							"url": "https://www.toituresbellevue.com/services/ventilation-et-isolation-entre-toit"
						}
					},
					{
						"@type": "Offer",
						"itemOffered": {
							"@type": "Service",
							"name": "Déneigement de toiture",
							"url": "https://www.toituresbellevue.com/services/deneigement-de-toiture"
						}
					}
				]
			}
		]
	},
	"sameAs": ["https://www.facebook.com/Toitures-Bellevue-104746334930300/"]
}
</script>