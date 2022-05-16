<?php

function estimateFromPostData()
{
	$accessoryPrices = [
		'fan' => 200.00,
		'chimney' => 200.00,
		'plumbing_vent' => 100.00,
	];

	$walkable = $_POST['walkable'] == 'yes';
	$costPerSquareFeet = $walkable ? 5.50 : 8.00;
	$area = abs(floatval($_POST['area']));
	
	// Check to convert m2 to ft2
	if ($_POST['area_unit'] == 'm2') {
		$area = ceil($area * 10.76391041671);
	}

	$subtotal = $area * $costPerSquareFeet;

	// Apply new constructions labor discount
	if (($_POST['type'] ?? null) == 'new') {
		$subtotal *= 0.6625;
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
