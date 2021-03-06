<?php

header("Content-Type: application/json");

try {
	if (empty($_POST['name']) || empty($_POST['phone'])) {
		throw new \Exception(); 
	}

	ob_start();
	require '../email/contact.php';
	$emailContent = ob_get_clean();
	ob_end_clean();
	
	mail(
		"contact@emileperron.com", 
		sprintf("Nouveau message de %s via ToituresBellevue.com", trim(strip_tags($_POST['name']))), 
		$emailContent, 
		"From: ToituresBellevue.com <nepasrepondre@toituresbellevue.com>\r\n"
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