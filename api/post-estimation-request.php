<?php

require 'inc/estimate.php';

header("Content-Type: application/json");

try {
	if (!isset($_POST['name']) || !isset($_POST['contact'])) {
		throw new \Exception(); 
	}

	$estimate = null;
	try {
		$estimate = estimateFromPostData();
	} catch (\Exception $e) {
		$estimate = ['subtotal' => 0, 'total' => 0];
	}

	ob_start();
	require '../email/post-estimate.php';
	$emailContent = ob_get_clean();
	mail(
		"info@toituresbellevue.com", 
		"Nouvelle demande via l'estimateur en ligne", 
		$emailContent, 
		"From: nepasrepondre@toituresbellevue.com\r\n"
			. "MIME-Version: 1.0\r\n"
			. "Content-Type: text/html; charset=UTF-8\r\n"
	);
	
	die(json_encode([
		"status" => "ok",
	]));
} catch (\Exception $e) {
	die(json_encode([
		"status" => "error",
		"error" => "Désolé, une erreur s'est produite. Veuillez ré-essayer plus tard, ou nous contacter via la page Nous joindre.",
	]));
}