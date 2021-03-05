<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Carrière - Toitures Bellevue</title>
		<?php include 'parts/head.php' ?>
	</head>
	<body>
		<?php include 'parts/header.php' ?>

		<main>
			<div id="page-header">
				<div class="container">
					<h1>Carrière</h1>
				</div>
			</div>
			
			<section>
				<div class="container">
					<p>À la recherche d’une équipe à joindre?</p>
					<p>Voici 4 bonnes raisons de nous faire parvenir ta candidature:</p>

					<ol>
						<li>Nous sommes une équipe de jeunes qui ont plus de 500 toitures derrière la cravate, on sait où on s’en va!</li>
						<li>La sécurité, c’est notre priorité. Nous protégeons notre équipe toujours plus que pas assez!</li>
						<li>Nous portons beaucoup d'attention à la qualité de nos projets. On ne coupe pas les coins ronds!</li>
						<li>On recherche quelqu’un avec qui on peut travailler longtemps et surtout, avoir du fun!</li>
					</ol>
				</div>
			</section>

			<div class="split-sections">
				<section id="career-decoration"></section>
				<section class="tertiary">
					<div class="container small">
						<h2>Envoie ta candidature!</h2>

						<form action="fasdf">
							<div class="two-columns">
								<fieldset class="required">
									<label for="input-first-name">Prénom</label>
									<input type="text" name="first_name" id="input-first-name" required>
								</fieldset>

								<fieldset class="required">
									<label for="input-last-name">Nom</label>
									<input type="text" name="last_name" id="input-last-name" required>
								</fieldset>
							</div>
							
							<fieldset class="required">
								<label for="input-phone">Numéro de téléphone</label>
								<input type="text" name="phone" id="input-phone" required>
							</fieldset>

							<fieldset class="required">
								<label for="input-email">Adresse courriel</label>
								<input type="email" name="email" id="input-email" required>
							</fieldset>

							<fieldset class="required">
								<label for="input-cv">C.V.</label>
								<input type="file" name="cv" id="input-cv" accept="image/*,.doc,.docx,.pdf">
							</fieldset>

							<fieldset>
								<label for="input-message">Message</label>
								<textarea name="message" id="input-message"></textarea>
							</fieldset>

							<div class="button-container text-center">
								<button type="submit">Envoyer ma candidature</button>
							</div>
						</form>
					</div>
				</section>
			</div>
		</main>

		<?php include 'parts/footer.php' ?>
	</body>
</html>