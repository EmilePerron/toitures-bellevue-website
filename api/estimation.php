<?php

require 'inc/estimate.php';

header("Content-Type: application/json");

try {
	$estimate = estimateFromPostData();

	die(json_encode([
		"status" => "ok",
		"subtotal" => $estimate['subtotal'],
		"total" => $estimate['total'],
		"formatted_total" => number_format($estimate['total'], 2),
	]));
} catch (\Exception $e) {
	die(json_encode([
		"status" => "error",
		"error" => "Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter via la page Nous joindre.",
	]));
}