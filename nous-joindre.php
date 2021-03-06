<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nous joindre - Toitures Bellevue</title>
		<?php include 'parts/head.php' ?>
	</head>
	<body>
		<?php include 'parts/header.php' ?>

		<main>
			<div id="page-header">
				<div class="container">
					<h1>Nous joindre</h1>
				</div>
			</div>
			
			<div class="split-sections">
				<section>
					<div class="container">
						<div class="contact-fields">
							<div>
								<i class="fas fa-map-marker-alt"></i>
								<div>
									13838, rue Longchamps<br>
									Québec (Québec) &nbsp;G3E 1P2
								</div>
							</div>
							<div>
								<i class="fas fa-envelope"></i>
								<a href="mailto:info@toituresbellevue.com">info@toituresbellevue.com</a>
							</div>
							<div>
								<i class="fas fa-phone-alt"></i>
								<a href="tel:15819096111">1 581 909-6111</a>
							</div>
							<div>
								<i class="fas fa-phone-alt"></i>
								<div>
									<a href="tel:15819096111">1 581 909-6111</a>
									<div class="text-small">(pour urgences)</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="tertiary">
					<div class="container">
						<form class="basic-contact-form">
							<h2>Contactez-nous</h2>
							
							<fieldset class="required">
								<label for="input-name">Nom</label>
								<input type="text" name="name" id="input-name" required>
							</fieldset>
							
							<fieldset class="required">
								<label for="input-phone">Numéro de téléphone</label>
								<input type="text" name="phone" id="input-phone" inputmode="tel" required>
							</fieldset>

							<fieldset>
								<label for="input-email">Courriel</label>
								<input type="email" name="email" id="input-email" inputmode="email">
							</fieldset>

							<fieldset>
								<label for="input-message">Votre message</label>
								<textarea name="message" id="input-message"></textarea>
							</fieldset>

							<div class="button-container text-right">
								<button type="submit">Envoyer</button>
							</div>
						</form>
					</div>
				</section>
			</div>

			<section class="primary diagonal-top text-center" id="calculator-cta">
				<div class="container">
					<h2>Obtenez un estimé en quelques clics!</h2>
					<a href="/estimateur-en-ligne" class="button">Utilisez notre estimateur en ligne pour évaluer le coût de vos travaux</a>
				</div>
			</section>
		</main>

		<?php include 'parts/footer.php' ?>
	</body>
</html>