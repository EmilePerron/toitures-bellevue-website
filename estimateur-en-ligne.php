<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Estimateur en ligne - Toitures Bellevue</title>
		<?php include 'parts/head.php' ?>
	</head>
	<body>
		<?php include 'parts/header.php' ?>

		<main>
			<div id="page-header">
				<div class="container">
					<h1>Estimateur en ligne</h1>
				</div>
			</div>
			
			<section class="tertiary">
				<div class="container small">
					<form id="estimate-form" method="post" action="/resultat-estimation.php">
						<fieldset class="required">
							<label>Type de travaux</label>
							<div>
								<select name="type" id="type">
									<option value="existing" selected>Réfection d'une toiture existante</option>
									<option value="new">Nouvelle construction</option>
								</select>
							</div>
						</fieldset>

						<fieldset class="required">
							<label>
								Aire du toit
								<!--a href="#explication-aire"><i class="fad fa-circle-question"></i></a-->
							</label>
							<div>
								<input type="number" name="area" id="area" placeholder="1500" min="50" autofocus required>
								<select name="area_unit" id="area-unit">
									<option value="ft2" selected>pi²</option>
									<option value="m2">m²</option>
								</select>
							</div>
						</fieldset>

						<fieldset class="required">
							<label>
								Pente du toit
								<!--a href="#explication-pente"><i class="fad fa-circle-question"></i></a-->
							</label>
							<div class="field-swatches">
								<label class="swatch selected">
									<img src="/assets/media/placeholder-rectangle.png">
									<div class="name">Pente marchable</div>
									<div class="description">Pentes de 6/12 et moins</div>
									<input type="radio" name="walkable" value="yes" required checked>
								</label>
								<label class="swatch">
									<img src="/assets/media/placeholder-rectangle.png">
									<div class="name">Pente abrupte</div>
									<div class="description">Pentes de plus de 6/12</div>
									<input type="radio" name="walkable" value="no" required>
								</label>
							</div>
						</fieldset>

						<fieldset class="optional">
							<label>
								Accessoires
								<!--a href="#explication-accessoires"><i class="fad fa-circle-question"></i></a-->
							</label>
							<div class="field-swatches">
								<label class="swatch">
									<img src="/assets/media/placeholder-rectangle.png">
									<div class="name">Accessoire X</div>
									<div class="description">Description de l'accessoire</div>
									<input type="checkbox" name="accessories[]" value="yes">
								</label>
								<label class="swatch">
									<img src="/assets/media/placeholder-rectangle.png">
									<div class="name">Accessoire Y</div>
									<div class="description">Description de l'accessoire</div>
									<input type="checkbox" name="accessories[]" value="no">
								</label>
							</div>
						</fieldset>

						<div class="button-container text-center">
							<button type="submit">Obtenir mon estimation</button>
						</div>
					</form>
				</div>
			</section>

			<section id="resultat" class="hidden" aria-hidden="true">
				<div class="container small">
					<h2>Votre estimation</h2>
					<p>
						Selon les informations que vous avez entrées, soit pour une <span data-key="type">toiture</span> de <span data-key="area">1500</span> <span data-key="area-unit">pi²</span>
						à pente <span data-key="angle">marchable</span>, le coût estimé en date du <?= date('j F Y') ?> est de:
					</p>
					<div class="estimated-total">
						<span data-key="total"></span>$
						<i>(taxes incluses)</i>
					</div>
				</div>
			</section>
		</main>

		<?php include 'parts/footer.php' ?>

		<script>
			const form = document.querySelector('#estimate-form');
			const resultSection = document.querySelector('#resultat');

			// Form submission
			form.addEventListener('submit', function(e) {
				e.preventDefault();

				if (form.classList.contains('processing')) {
					return;
				}

				const data = new FormData(form);
				form.classList.add('processing');

				// Calculations seem more trustworthy when they take some time...
				setTimeout(function(){
					fetch('/api/estimation.php', {
						method: 'POST',
						body: data,
					}).then(function(response) {
						return response.json();
					}).then(function(response) {
						if (response.status == 'ok') {
							resultSection.querySelector('[data-key="type"]').textContent = data.get('type') == 'new' ? 'nouvelle toiture' : 'réfaction de toiture'; 
							resultSection.querySelector('[data-key="area"]').textContent = data.get('area');
							resultSection.querySelector('[data-key="area-unit"]').textContent = data.get('area_unit') == 'ft2' ? 'pi²' : 'm²';
							resultSection.querySelector('[data-key="angle"]').textContent = data.get('walkable') == 'yes' ? 'marchable' : 'abrupte';
							resultSection.querySelector('[data-key="total"]').textContent = response.formatted_total;
							resultSection.classList.remove('hidden');
							resultSection.scrollIntoView();
						} else {
							alert(response.error || "Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter via la page Nous joindre.");
						}
					}).catch(function(){
						alert("Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter via la page Nous joindre.");
					}).finally(function(){
						form.classList.remove('processing');
					});
				}, Math.round(Math.random() * 500));
			});

			// Swatches class toggling
			for (const swatchInput of document.querySelectorAll('.swatch input')) {
				swatchInput.addEventListener('change', function() {
					if (swatchInput.matches('[type="radio"]')) {
						for (const otherInput of document.querySelectorAll('input[type="radio"][name="' + this.name + '"]')) {
							if (otherInput == swatchInput) {
								continue;
							}

							otherInput.checked = false;
							otherInput.closest('.swatch').classList.remove('selected');
						}
					}

					swatchInput.closest('.swatch').classList.toggle('selected', swatchInput.checked);
				});
			}
		</script>
	</body>
</html>