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

			<div class="split-sections">
			<section>
				<div class="container">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis vero pariatur dolore at tempora temporibus non assumenda nihil ea recusandae illo rem inventore quas iste iusto.</p>
				</div>
			</section>

			<section class="tertiary">
				<div class="container small">

					<form id="estimate-form" method="post" action="/resultat-estimation.php">
						<fieldset>
							<label>
								Aire du toit
								<a href="#explication-aire"><i class="fad fa-help-circle"></i></a>
							</label>
							<div>
								<input type="number" name="area" id="area" placeholder="400" min="1" required>
								<select name="area_unit" id="area-unit">
									<option value="ft2" selected>pi²</option>
									<option value="m2">m²</option>
								</select>
							</div>
						</fieldset>

						<fieldset>
							<label>
								Pente du toit
								<a href="#explication-pente"><i class="fad fa-help-circle"></i></a>
							</label>
							<div class="field-swatches">
								<label class="swatch selected">
									<img src="/assets/media/placeholder.png">
									<div class="name">Pente marchable</div>
									<div class="description">Pentes de 6/12 et moins</div>
									<input type="radio" name="walkable" value="yes" id="walkable-yes" required checked>
								</label>
								<label class="swatch">
									<img src="/assets/media/placeholder.png">
									<div class="name">Pente abrupte</div>
									<div class="description">Pentes de plus de 6/12</div>
									<input type="radio" name="walkable" value="no" id="walkable-no" required>
								</label>
							</div>
						</fieldset>

						<div class="button-container text-center">
							<button type="submit">Obtenir mon estimation</button>
						</div>
					</form>
				</div>
			</section>
			</div>
		</main>

		<?php include 'parts/footer.php' ?>

		<script>
			const form = document.querySelector('#estimate-form');

			// Form submission
			form.addEventListener('submit', function(e) {
				e.preventDefault();

				if (form.classList.contains('processing')) {
					return;
				}

				form.classList.add('processing');

				// Calculations seem more trustworthy when they take some time...
				setTimeout(function(){
					form.submit();
				}, 1000 + Math.round(Math.random() * 500));
			});

			// Swatches class toggling
			for (const swatchInput of document.querySelectorAll('.swatch input[type="radio"]')) {
				swatchInput.addEventListener('change', function() {
					for (const otherInput of document.querySelectorAll('input[type="radio"][name="' + this.name + '"]')) {
						if (otherInput == swatchInput) {
							continue;
						}

						otherInput.checked = false;
						otherInput.closest('.swatch').classList.remove('selected');
					}

					swatchInput.closest('.swatch').classList.add('selected');
				});
			}
		</script>
	</body>
</html>