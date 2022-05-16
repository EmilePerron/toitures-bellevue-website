<?php
$photos = glob('assets/media/projects/*');
usort($photos, function($a, $b) {
	if (filemtime($b) - filemtime($a) === 0) {
		return strnatcasecmp($a, $b);
	}

    return filemtime($b) - filemtime($a);
});
?>
<!DOCTYPE html>
<html lang="fr-CA">
	<head>
		<title>Réalisations — Toitures Bellevue</title>
		<?php include 'parts/head.php' ?>
		<meta name="description" content="Voyez des toitures réalisées par Toitures Bellevue, votre spécialiste en toiture résidentielle et commerciale à Québec, Beauport, Charlesbourg et les environs!">
		<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/andreknieriem/simplelightbox@v2.7.3/dist/simple-lightbox.min.css">
	</head>
	<body>
		<?php include 'parts/header.php' ?>

		<main>
			<div id="page-header">
				<div class="container">
					<h1>Réalisations</h1>
				</div>
			</div>

			<section>
				<div class="container">
					<div class="photo-album">
						<?php foreach ($photos as $photoUrl) : ?>
							<?php 
							$filenameParts = explode("/", $photoUrl);
							$imageFilename = array_pop($filenameParts);
							$thumbnailUrl = "https://res.cloudinary.com/toitures-bellevue/image/upload/w_400/media/projects/" . $imageFilename;
							$imageSize = getimagesize($photoUrl);
							
							?>
							<img src="<?= $thumbnailUrl ?>" fullsize-url="<?= $photoUrl ?>" 
							    <?= $imageSize !== false ? (
							        'width="' . $imageSize[0] . '" height="' . $imageSize[1] . '"'
							    ) : "" ?>
						    >
						<?php endforeach ?>
					</div>
				</div>
			</section>

			<?php include 'parts/service_cta.php' ?>
		</main>

		<?php include 'parts/footer.php' ?>

		<script src="https://cdn.jsdelivr.net/gh/andreknieriem/simplelightbox@v2.7.3/dist/simple-lightbox.min.js"></script>
		<script>
			var lightbox = new SimpleLightbox('.photo-album img', { sourceAttr: "fullsize-url", preloading: false });
		</script>
	</body>
</html>