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
					<form id="estimate-form">
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
								<input type="number" name="area" id="area" placeholder="1500" min="50" inputmode="numeric" required>
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
									<img src="/assets/media/roof-angle-walkable.png">
									<div class="name">Pente marchable</div>
									<div class="description">Pentes de 6/12 et moins</div>
									<input type="radio" name="walkable" value="yes" required checked>
								</label>
								<label class="swatch">
									<img src="/assets/media/roof-angle-steep.png">
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
								<label class="swatch always-selected">
									<!--img src="/assets/media/plumbing-vent.png"-->
									<div class="name">Ventilateurs</div>
									<div class="input-wrapper">
										<span class="label">Quantité:</span>
										<input type="number" name="accessories[fan]" value="0" min="0" step="1" inputmode="numeric">
									</div>
								</label>
								<label class="swatch always-selected">
									<!--img src="/assets/media/plumbing-vent.png"-->
									<div class="name">Cheminées</div>
									<div class="input-wrapper">
										<span class="label">Quantité:</span>
										<input type="number" name="accessories[chimney]" value="0" min="0" step="1" inputmode="numeric">
									</div>
								</label>
								<label class="swatch always-selected">
									<!--img src="/assets/media/plumbing-vent.png"-->
									<div class="name">Évents de plomberie</div>
									<div class="input-wrapper">
										<span class="label">Quantité:</span>
										<input type="number" name="accessories[plumbing_vent]" value="0" min="0" step="1" inputmode="numeric">
									</div>
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
						à pente <span data-key="angle">marchable</span><span data-key="accessories"></span>, le coût estimé en date du <?= strftime('%e %B %Y') ?> est de:
					</p>
					<div class="estimated-total">
						<span data-key="total"></span>$
						<i>(taxes incluses)</i>
					</div>
				</div>
			</section>

			<section id="post-estimate-section" class="primary hidden">
				<div class="container text-center">
					<h3>Vous aimeriez qu'on vous contacte afin de discuter de votre projet?</h3>
					<p>Entrez vos informations ci-dessous, et nous vous contacterons d'ici une journée ouvrable!</p>

					<form id="post-estimate-form" class="text-left">
						<fieldset class="required">
							<label for="input-name">Votre nom complet</label>
							<input type="text" name="name" id="input-name" placeholder="John Doe" required>
						</fieldset>
						<fieldset class="required">
							<label for="input-name">Votre adresse courriel ou numéro de téléphone</label>
							<input type="text" name="contact" id="input-contact" required>
						</fieldset>
						<div class="button-container text-center">
							<button type="submit">Envoyer ma demande</button>
						</div>

						<div id="post-estimate-inputs"></div>
					</form>

					<div id="cta-form-success">
						<i class="fad fa-circle-check"></i>
						<p>Votre demande a été envoyée avec succès.</p>
						<p>Nous vous contacterons dès que possible.</p>
						<p>Merci de votre confiance!</p>
					</div>
				</div>
			</section>
		</main>

		<?php include 'parts/footer.php' ?>

		<script>
			const form = document.querySelector('#estimate-form');
			const resultSection = document.querySelector('#resultat');
			const resultCtaSection = document.querySelector('#post-estimate-section');
			const resultCtaInputsWrapper = document.querySelector('#post-estimate-inputs');
			const resultCtaForm = resultCtaSection.querySelector('form');

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

							const accessoriesParts = [];
							let accessoryNames = {
								"fan": {
									singular: "ventilateur",
									plural: "ventilateurs",
									single_count: "un"
								},
								"chimney": {
									singular: "cheminée",
									plural: "cheminées",
									single_count: "une"
								},
								"plumbing_vent": {
									singular: "évent de plomberie",
									plural: "évents de plomberie",
									single_count: "un"
								}
							};

							for (const accessory in accessoryNames) {
								const count = parseInt(data.get('accessories[' + accessory + ']'));

								if (count == 1) {
									accessoriesParts.push(accessoryNames[accessory].single_count + ' ' + accessoryNames[accessory].singular);
								} else if (count > 1) {
									accessoriesParts.push(count + ' ' + accessoryNames[accessory].plural);
								}
							}

							if (accessoriesParts.length) {
								const accessorySentence = accessoriesParts.join(', ').replace(/(.+),\s/, '$1 et ');
								resultSection.querySelector('[data-key="accessories"]').textContent = ' avec ' + accessorySentence;
							} else {
								resultSection.querySelector('[data-key="accessories"]').textContent = '';
							}

							resultSection.classList.remove('hidden');
							resultCtaSection.classList.remove('hidden');

							resultCtaInputsWrapper.innerHTML = '';
							for (const input of form.querySelectorAll('input, select, textarea')) {
								resultCtaInputsWrapper.appendChild(input.cloneNode(true));
							}
							
							resultSection.scrollIntoView();
						} else {
							alert(response.error || "Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter via la page Nous joindre.");
						}
					}).catch(function(err){
						alert("Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter via la page Nous joindre.");
						console.error(err);
					}).finally(function(){
						form.classList.remove('processing');
					});
				}, Math.round(Math.random() * 500));
			});

			// Swatches class toggling
			for (const swatchInput of document.querySelectorAll('.swatch input')) {
				swatchInput.addEventListener('change', function() {
					if (swatchInput.matches('[type="radio"]')) {
						for (const otherInput of form.querySelectorAll('input[type="radio"][name="' + this.name + '"]')) {
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

			// Post estimate CTA form submission
			resultCtaForm.addEventListener('submit', function(e) {
				e.preventDefault();

				if (resultCtaForm.classList.contains('processing')) {
					return;
				}

				resultCtaForm.classList.add('processing');
				
				const data = new FormData(resultCtaForm);
				fetch('/api/post-estimation-request.php', {
					method: 'POST',
					body: data
				}).then(function(response) {
					return response.json();
				}).then(function(response) {
					if (response.status == 'ok') {
						resultCtaForm.style.display = 'none';
						resultCtaSection.querySelector('#cta-form-success').style.display = 'block';
					} else {
						alert(response.error || "Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter via la page Nous joindre.");
					}
				}).catch(function(err){
					alert("Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter via la page Nous joindre.");
					console.error(err);
				}).finally(function(){
					resultCtaForm.classList.remove('processing');
				});
			});
		</script>
	</body>
</html>