<?php
$mapping = [
	"beauport" => "à Beauport",
	"boischatel" => "à Boischatel",
	"charlesbourg" => "à Charlesbourg",
	"chateau-richer" => "à Château-Richer",
	"ancienne-lorette" => "à L'Ancienne-Lorette",
	"lac-beauport" => "au Lac-Beauport",
	"levis" => "à Lévis",
	"loretteville" => "à Loretteville",
	"quebec" => "à Québec",
	"sainte-anne-de-beaupre" => "à Sainte-Anne-de-Beaupré",
	"sainte-foy" => "à Sainte-Foy",
	"stoneham" => "à Stoneham",
	"val-belair" => "à Val-Bélair",
];
$locationSlug = $_GET['location'] ?? null;

if (!$locationSlug || !isset($mapping[$locationSlug])) {
	header('Location:https://www.toituresbellevue.com/services/reparation-de-toiture');
	die();
}

$atLocation = $mapping[$locationSlug];
?>
<!DOCTYPE html>
<html lang="fr-CA">
	<head>
		<title>Couvreur <?= $atLocation ?> — Toitures Bellevue</title>
		<?php include '../parts/head.php' ?>
		<meta name="description" content="Expert en réparation de toiture <?= $atLocation ?>, Toitures Bellevue vous offre des solutions durables. Contactez-nous dès maintenant pour une estimation!">
	</head>
	<body>
		<?php include '../parts/header.php' ?>

		<main>
			<div id="page-header">
				<div class="container">
					<h1>Couvreur <?= $atLocation ?></h1>
				</div>
			</div>
			
			<section>
				<div class="container">
					<p><strong>Toitures Bellevue est votre couvreur de confiance <?= $atLocation ?>.</strong></p>
					<p>En tant qu'entreprise de toiture, nous nous spécialisons dans la <a href="/reparation-de-toiture-<?= $locationSlug ?>">réparation</a> et la rénovation de toiture. Notre équipe de spécialistes en toiture est à votre disposition pour servir vos besoins en matière de toiture <?= $atLocation ?>.</p>
				</div>
			</section>
			
			<section class="tertiary">
				<div class="container">
					<h2>Qualité et sécurité</h2>
					<p>Notre force réside dans notre engagement envers la qualité et la sécurité.</p>
					<p>Chez Toitures Bellevue, votre satisfaction est notre priorité. Nos couvreurs de toiture ont réalisé plus de 500 toitures, attestant ainsi de leur compétence et de leur expérience. Nous adoptons une approche orientée vers les détails, pour nous assurer que chaque projet de toiture est réalisé avec la plus grande précision.</p>
					<p>En tant que couvreur <?= $atLocation ?>, Toitures Bellevue est dévoué à un travail bien fait. Nous offrons une gamme complète de services, y compris la réparation et la rénovation de toitures. Nous nous occupons de l'installation de bardeaux, de la réparation de solins et de soffites, de la ventilation et de l'isolation de votre toiture. Notre approche est détaillée et minutieuse, pour garantir la durabilité et la performance de votre toiture.</p>
					<img src="https://res.cloudinary.com/toitures-bellevue/image/upload/w_800/media/roofer-working.jpg" alt="">
				</div>
			</section>
			
			<section class="primary">
				<div class="container text-center">
					<h2>Toitures Bellevue: votre solution pour une toiture durable!</h2>
					<p>N'attendez plus, faites appel à Toitures Bellevue, votre couvreur <?= $atLocation ?> de choix. Contactez-nous dès aujourd'hui!</p>
					<a href="/nous-joindre" class="button">Contactez-nous</a>
				</div>
			</section>
			
			<section>
				<div class="container">
					<h2>L'expertise qui fait toute la différence</h2>
					<p>Chez Toitures Bellevue, chaque couvreur est plus qu'un simple technicien; c'est un artisan du toit. Notre expertise ne se limite pas à la réparation ou à la rénovation; nous excellons également dans la conception de solutions personnalisées qui s'adaptent spécifiquement aux défis climatiques de votre emplacement.</p>
					
					<h3>Une protection à long terme</h3>
					<p>En optant pour Toitures Bellevue, vous bénéficiez d'une réparation efficace et d'une protection à long terme pour votre foyer. Nos matériaux de pointe et nos méthodes innovantes assurent une durabilité qui dépasse les normes de l'industrie. Nos couvreurs transforment votre toit en investissement durable.</p>

					<img src="https://res.cloudinary.com/toitures-bellevue/image/upload/w_800/media/rooftop_summer_2021_6.jpg" alt="" class="left">
				</div>
			</section>
			
			<section class="tertiary">
				<div class="container">
					<h2>Un couvreur à la hauteur de vos attentes</h2>
					<p>Chez Toitures Bellevue, nous comprenons que choisir un entrepreneur en toiture peut être une décision importante. C'est pourquoi nous nous engageons à fournir un service clientèle exceptionnel.</p>
					<p>Nos professionnels sont accessibles pour répondre à vos questions, vous guider à travers les options disponibles, et vous aider à prendre une décision éclairée. Nous nous engageons à maintenir une communication transparente du début à la fin de votre projet de toiture.</p>
					<p>En plus de nos services principaux, nous offrons des inspections et des évaluations pour détecter les problèmes potentiels avant qu'ils ne deviennent des urgences coûteuses. Cela garantit la tranquillité d'esprit, sachant que votre toit est vérifié des spécialistes dévoués.</p>
					<img src="https://res.cloudinary.com/toitures-bellevue/image/upload/w_800/media/rooftop-renovation-echafaud-photo-2.jpg" alt="">
				</div>
			</section>
			
			<section class="primary">
				<div class="container text-center">
					<h2>Transformez votre qualité de vie!</h2>
					<p>Contactez-nous aujourd'hui et découvrez pourquoi nous sommes le couvreur de référence <?= $atLocation ?>!</p>
					<a href="/nous-joindre" class="button">Contactez-nous</a>
				</div>
			</section>
		</main>

		<?php include '../parts/footer.php' ?>
	</body>
</html>