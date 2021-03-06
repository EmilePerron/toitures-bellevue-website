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
})();