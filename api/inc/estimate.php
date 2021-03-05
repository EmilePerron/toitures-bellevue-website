<?php

function estimateFromPostData()
{
	$accessoryPrices = [
		'fan' => 150.00,
		'chimney' => 150.00,
		'plumbing_vent' => 60.00,
	];

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

	return [
		'subtotal' => $subtotal,
		'total' => $total,
	];
}
