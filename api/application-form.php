<?php

header("Content-Type: application/json");

try {
	if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['phone']) || empty($_POST['email'])) {
		throw new \Exception(); 
	}

	ob_start();
	require '../email/career-application.php';
	$emailContent = ob_get_clean();
	ob_end_clean();

	$attachment = $_FILES['cv'];
    $boundary = md5(rand());

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "From: ToituresBellevue.com <nepasrepondre@toituresbellevue.com>\r\n";
	$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";

	$body = "--$boundary\r\n";
	$body .= "Content-Type: text/html; charset=UTF-8\r\n";
	$body .= "Content-Transfer-Encoding: base64\r\n\r\n";
	$body .= chunk_split(base64_encode($emailContent));

	if (!empty($attachment['name'])) {
		if ($attachment['error'] > 0) {
			throw new \Exception();
		}

		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$mimeType = $finfo->file($attachment['tmp_name']);

		if (!(strpos($mimeType, 'image/') === 0 || strpos($mimeType, 'pdf') !== false || strpos($mimeType, 'word') !== false)) {
			die(json_encode([
				"status" => "error",
				"error" => "Votre C.V. ne semble pas être dans un format accepté. Veuillez envoyer un PDF, un document Word ou une image.",
			]));
		}

		$fileName = strtr(preg_replace('~\s~', '', $attachment['name']), 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
		$fileSize = $attachment['size'];
		$fileType = $attachment['type'];

		$handle = fopen($attachment['tmp_name'], "r");
		$content = fread($handle, $fileSize);
		fclose($handle);
		$encodedContent = chunk_split(base64_encode($content)); // split into smaller chunks (RFC 2045)

		$body .= "--$boundary\r\n";
		$body .= "Content-Type: $fileType; name=" . $fileName . "\r\n";
		$body .= "Content-Disposition: attachment; filename=" . $fileName . "\r\n";
		$body .= "Content-Transfer-Encoding: base64\r\n";
		$body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
		$body .= $encodedContent;
	}

	mail(
		"info@toituresbellevue.com", 
		sprintf("Nouvelle candidature de %s", trim(strip_tags($_POST['first_name'] . ' ' . $_POST['last_name']))), 
		$body,
		$headers
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