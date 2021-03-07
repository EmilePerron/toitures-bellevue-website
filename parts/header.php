<?php 
$currentRoute = str_replace('.php', '', ltrim($_SERVER['PHP_SELF'] ?? '', '/'));
?>
<nav id="help-bar">
	<div class="container">
		<a href="tel:15819096111" class="phone">
			<i class="fas fa-phone-alt"></i>&nbsp;
			1 581 909-6111
		</a>
		<a href="/estimateur-en-ligne" class="cta">Obtenir une estimation gratuite</a>
	</div>
</nav>
<header id="header">
	<div class="container">
		<div class="branding">
			<a href="/">
				<img src="/assets/media/logo_toiture-bellevue.png" alt="Toitures Bellevue">
			</a>
		</div>
		<nav>
			<a href="#" role="button" id="navigation-toggle">
				<i class="far fa-bars"></i>
			</a>
			<ul>
				<li class="mobile-only-cta">
					<a href="/estimateur-en-ligne">Estimation en ligne gratuite</a>
				</li>
				<li>
					<a href="/a-propos" class="<?= $currentRoute == 'a-propos' ? 'current' : '' ?>">À propos</a>
				</li>
				<li class="dropdown">
					<div class="dropdown-toggle">Services</div>
					<ul class="dropdown-list">
						<li>
							<a href="/services/refection-de-toiture" class="<?= $currentRoute == 'services/refection-de-toiture' ? 'current' : '' ?>">Réfection de toiture</a>
						</li>
						<li>
							<a href="/services/reparation-de-toiture" class="<?= $currentRoute == 'services/reparation-de-toiture' ? 'current' : '' ?>">Réparation de toiture</a>
						</li>
						<li>
							<a href="/services/inspection-de-toiture" class="<?= $currentRoute == 'services/inspection-de-toiture' ? 'current' : '' ?>">Inspection de toiture</a>
						</li>
						<li>
							<a href="/services/ventilation-et-isolation-entre-toit" class="<?= $currentRoute == 'services/ventilation-et-isolation-entre-toit' ? 'current' : '' ?>">Ventilation et isolation d'entre-toit</a>
						</li>
						<li>
							<a href="/services/deneigement-de-toiture" class="<?= $currentRoute == 'services/deneigement-de-toiture' ? 'current' : '' ?>">Déneigement de toiture</a>
						</li>
					</ul>
				</li>
				<!--li>
					<a href="/realisations" class="<?= $currentRoute == 'realisations' ? 'current' : '' ?>">Réalisations</a>
				</li-->
				<!--li>
					<a href="/blogue" class="<?= strpos($currentRoute, 'blogue') !== false ? 'current' : '' ?>">Blogue</a>
				</li-->
				<li>
					<a href="/carriere" class="<?= $currentRoute == 'carriere' ? 'current' : '' ?>">Carrière</a>
				</li>
				<li>
					<a href="/nous-joindre" class="<?= $currentRoute == 'nous-joindre' ? 'current' : '' ?>">Nous joindre</a>
				</li>
			</ul>
		</nav>
	</div>
</header>