<?php
try {
	$walkable = $_POST['walkable'] == 'yes';
	$costPerSquareFeet = $walkable ? 4.00 : 5.50;
	$area = abs(floatval($_POST['area']));
	
	// Check to convert m2 to ft2
	if ($_POST['area_unit'] == 'm2') {
		$area = ceil($area * 10.76391041671);
	}
	
	$subtotal = $area * $costPerSquareFeet;
	$total = $subtotal * 1.14975;
} catch (\Exception $e) {
	header('Location:/estimateur-en-ligne');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Votre estimation - Toitures Bellevue</title>
		<?php include 'parts/head.php' ?>
	</head>
	<body>
		<?php include 'parts/header.php' ?>

		<main>
			<div id="page-header">
				<div class="container">
					<h1>Votre estimation</h1>
				</div>
			</div>

			<section>
				<div class="container">
					<strong><?= number_format($total, 2) ?>$</strong>
				</div>
			</section>
		</main>

		<?php include 'parts/footer.php' ?>
	</body>
</html>