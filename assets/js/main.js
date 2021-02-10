(function() {
	var helpBar = document.querySelector("#help-bar");
	window.addEventListener('scroll', () => document.body.classList.toggle('stick-nav', window.scrollY >= helpBar.offsetHeight));
})();