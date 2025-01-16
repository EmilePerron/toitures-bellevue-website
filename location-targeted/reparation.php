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
		<title>Réparation de toitures <?= $atLocation ?> — Toitures Bellevue</title>
		<?php include '../parts/head.php' ?>
		<meta name="description" content="Expert en réparation de toiture <?= $atLocation ?>, Toitures Bellevue vous offre des solutions durables. Contactez-nous dès maintenant pour une estimation!">
	</head>
	<body>
		<?php include '../parts/header.php' ?>

		<main>
			<div id="page-header">
				<div class="container">
					<h1>Réparation de toitures <?= $atLocation ?></h1>
				</div>
			</div>
			
			<section>
				<div class="container">
					<p><strong>Toitures Bellevue est votre partenaire fiable pour la réparation de toiture <?= $atLocation ?>.</strong></p>
					<p>Avec une solide expérience dans l'industrie, notre équipe d'experts s'engage à fournir un service exceptionnel qui répond non seulement à vos attentes, mais les dépasse. Quel que soit le type de <a href="/services/reparation-de-toiture">dégat</a> que votre toiture a subi, nous avons les compétences et les ressources nécessaires pour remettre votre toiture en état, même s'il y a une urgence.</p>
				</div>
			</section>
			
			<section class="tertiary">
				<div class="container">
					<h2>Qualité et sécurité</h2>
					<p>Notre force réside dans notre engagement envers la qualité et la sécurité.</p>
					<p>Chez Toitures Bellevue, votre satisfaction est notre priorité. Nos professionnels dévoués ont à leur actif une multitude de réparations de toiture réussies, attestant de leur compétence et de leur expérience.</p>
					<p>Le processus de réparation de toiture <?= $atLocation ?> par Toitures Bellevue est caractérisé par une approche rigoureuse et détaillée. En respectant les standards les plus élevés de l'industrie, nous assurons une réparation durable et efficace, quel que soit son état actuel.</p>
					<img src="https://res.cloudinary.com/toitures-bellevue/image/upload/w_800/media/rooftop-renovation-echafaud-photo-2.jpg" alt="">
				</div>
			</section>
			
			<section class="primary">
				<div class="container text-center">
					<h2>Faites appel à l'expertise de Toitures Bellevue!</h2>
					<p>Toitures Bellevue est là pour vous aider. N'attendez pas que vos petits problèmes deviennent de gros maux de tête. Contactez-nous dès aujourd'hui pour votre réparation de toiture <?= $atLocation ?> et laissez-nous prendre soin de tous vos besoins de dépannage de toiture.</p>
					<a href="/nous-joindre" class="button">Contactez-nous</a>
				</div>
			</section>
			
			<section>
				<div class="container">
					<h2>Excellence en réparation de toiture <?= $atLocation ?></h2>
					<p>Chez Toitures Bellevue, nous comprenons l'importance cruciale d'une toiture en bon état, surtout en ce qui concerne la réparation de toiture en bardeaux. Nos interventions en réparation de toiture <?= $atLocation ?> sont effectuées avec le plus grand soin, utilisant des matériaux de haute qualité pour garantir la longévité et la résistance de votre toiture. Nos experts sont spécialement formés pour identifier et réparer efficacement tout type de dommages sur les toitures en bardeaux, assurant ainsi une protection optimale de votre domicile contre les intempéries.</p>
					<p>La détection et la réparation de fuites, quant à eux, nécessitent une expertise particulière. Toitures Bellevue offre un service de réparation de toiture <?= $atLocation ?> pour fuite, s'assurant que votre maison reste sèche et confortable. Notre équipe utilise des techniques avancées pour identifier leur origine, offrant ainsi des solutions durables qui empêchent leur réapparition. Nous comprenons l'urgence de telles situations et nous nous engageons à intervenir rapidement pour protéger votre maison et vos biens.</p>
					<img src="https://res.cloudinary.com/toitures-bellevue/image/upload/w_800/media/rooftop_summer_2021_6.jpg" alt="" class="left">
				</div>
			</section>
			
			<section class="tertiary">
				<div class="container">
					<h2>Réponse immédiate pour réparation d'urgence</h2>
					<p>Les situations d'urgence nécessitent une action rapide et efficace. Toitures Bellevue se tient prêt à intervenir pour toute réparation de toiture <?= $atLocation ?>. Que ce soit suite à des conditions météorologiques extrêmes ou à des accidents imprévus, notre équipe intervient rapidement, équipée pour sécuriser et réparer votre toiture dans les plus brefs délais. Nous minimisons les risques de dommages supplémentaires.</p>
					<p>Face aux défis que représente la réparation de votre toiture, il est crucial de faire appel à des professionnels de confiance. Toitures Bellevue se démarque par son expertise en réparation de toiture <?= $atLocation ?>, offrant des solutions rapides, efficaces et durables. Ne laissez pas un petit problème se transformer en catastrophe.</p>
					<img src="https://res.cloudinary.com/toitures-bellevue/image/upload/w_800/media/rooftop_insulation_2021_1.jpg" alt="">
				</div>
			</section>
			
			<section class="primary">
				<div class="container text-center">
					<h2>Ne laissez pas les dégâts s'aggraver!</h2>
					<p>Protégez votre investissement et assurez la tranquillité d'esprit en choisissant le leader en réparation de toiture <?= $atLocation ?>. Votre toiture mérite l'excellence, et nous sommes là pour la fournir.</p>
					<a href="/nous-joindre" class="button">Contactez-nous</a>
				</div>
			</section>
		</main>

		<?php include '../parts/footer.php' ?>
	</body>
</html>