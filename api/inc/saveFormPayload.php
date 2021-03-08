<?php

try {
	$filename = __DIR__ . '/../../_forms/' . str_replace('.php', '', ltrim($_SERVER['PHP_SELF'] ?? '', '/api/')) . '.json';
	$submissions = [];

	if (file_exists($filename)) {
		$submissions = json_decode(file_get_contents($filename) ?: '[]', true);
	}

	$submissions[] = ['date' => date('Y-m-d H:i:s'), 'payload' => $_POST];
	file_put_contents($filename, json_encode($submissions, JSON_PRETTY_PRINT));	
} catch (\Exception $e) {
	// Oh well. We really tried...
}