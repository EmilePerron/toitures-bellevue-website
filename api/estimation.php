<?php

header("Content-Type: application/json");

try {
	$walkable = $_POST['walkable'] == 'yes';
	$costPerSquareFeet = $walkable ? 4.00 : 5.50;
	$area = abs(floatval($_POST['area']));
	
	// Check to convert m2 to ft2
	if ($_POST['area_unit'] == 'm2') {
		$area = ceil($area * 10.76391041671);
	}

	$subtotal = $area * $costPerSquareFeet;

	// Apply new constructions labor discount
	if (($_POST['type'] ?? null) == 'new') {
		$subtotal *= 0.55;
	}

	// Calculate accessories
	$accessoriesCost = count($_POST['accessories'] ?? []) * 150;
	
	$subtotal += $accessoriesCost;
	$total = $subtotal * 1.14975;

	die(json_encode([
		"status" => "ok",
		"subtotal" => $subtotal,
		"total" => $total,
		"formatted_total" => number_format($total, 2),
	]));
} catch (\Exception $e) {
	die(json_encode([
		"status" => "error",
		"error" => "Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter via la page Nous joindre.",
	]));
}