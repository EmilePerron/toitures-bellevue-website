<?php

header("Content-Type: application/json");

$accessoryPrices = [
	'fan' => 150.00,
	'chimney' => 150.00,
	'plumbing_vent' => 60.00,
];

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
	foreach (($_POST['accessories'] ?? []) as $accessoryName => $accessoryCount) {
		$subtotal += ($accessoryPrices[$accessoryName] ?? 0) * (max(0, intval($accessoryCount)));
	}
	
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