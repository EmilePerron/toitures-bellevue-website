(function() {
	// Sticky navigation
	var helpBar = document.querySelector("#help-bar");
	window.addEventListener('scroll', () => document.body.classList.toggle('stick-nav', window.scrollY >= helpBar.offsetHeight));
	window.dispatchEvent(new Event('scroll'));

	// Mobile navigation
	document.querySelector('#navigation-toggle').addEventListener('click', function(e) {
		e.preventDefault();
		document.querySelector('header nav').classList.toggle("open");
	});

	// Custom file inputs
	for (const fileInput of document.querySelectorAll('input[type="file"]')) {
		fileInput.insertAdjacentHTML("afterend", "<label class='custom-file-input'></label>");
		const wrapper = fileInput.nextElementSibling;
		wrapper.innerHTML = "<span class='filename'></span><span class='select-label'></span><i class='fas fa-file'></i>";
		wrapper.prepend(fileInput);
	
		fileInput.addEventListener('change', function() {
			const filenameNode = this.closest('.custom-file-input').querySelector('.filename');
			filenameNode.textContent = this.value.replace(/.*[\/\\]/, '');
		});
	}

	// Basic contact form
	for (const form of document.querySelectorAll('form.basic-contact-form')) {
		form.addEventListener('submit', function(e) {
			e.preventDefault();

			if (form.classList.contains('processing')) {
				return;
			}

			form.classList.add('processing');
			
			const data = new FormData(form);
			fetch('/api/contact-form.php', {
				method: 'POST',
				body: data
			}).then(function(response) {
				return response.json();
			}).then(function(response) {
				if (response.status == 'ok') {
					const timeOfDay = (new Date()).getHours() >= 17 ? 'soirée' : 'journée';
					form.innerHTML = "<div class='basic-form-success'><i class='fad fa-circle-check'></i><p>Votre message a été envoyé avec succès! Vous devriez recevoir une réponse dans un délai de 24h ouvrable. Merci, et bonne " + timeOfDay + "!</p></div>";
				} else {
					alert(response.error || "Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter par téléphone ou courriel.");
				}
			}).catch(function(err){
				alert("Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter par téléphone ou courriel.");
				console.error(err);
			}).finally(function(){
				form.classList.remove('processing');
			});
		});
	}
})();