<?php

/**
 * Returns the array of all location slug and "at location" strings for
 * supported locations.
 * 
 * @return array<string,string>
 */
function getLocationMappings(): array
{
	return [
		"beauport" => "à Beauport",
		"boischatel" => "à Boischatel",
		"charlesbourg" => "à Charlesbourg",
		"chateau-richer" => "à Château-Richer",
		"lancienne-lorette" => "à L'Ancienne-Lorette",
		"lac-beauport" => "au Lac-Beauport",
		"lac-saint-charles" => "au Lac-Saint-Charles",
		"levis" => "à Lévis",
		"loretteville" => "à Loretteville",
		"quebec" => "à Québec",
		"saint-emile" => "à Saint-Émile",
		"sainte-anne-de-beaupre" => "à Sainte-Anne-de-Beaupré",
		"saint-augustin-desmaures" => "à Saint-Augustin-de-Desmaures",
		"sainte-foy" => "à Sainte-Foy",
		"stoneham" => "à Stoneham",
		"val-belair" => "à Val-Bélair",
	];
}

/**
 * Returns the array of all location slugs for supported locations.
 * 
 * @return array<int,string>
 */
function getLocationSlugs(): array
{
	return array_keys(getLocationMappings());
}

/**
 * Returns the location slug and "at location" string for the location defined
 * in the current URL (via the `location` query param).
 * 
 * Redirects to the `$fallbackUri` if the location is not supported or could 
 * not be matched to a supported location.
 * 
 * @return array<int,string>
 */
function getUrlLocation(string $fallbackUri): array
{
	$mapping = getLocationMappings();
	$locationSlug = $_GET['location'] ?? null;
	
	if (!$locationSlug || !isset($mapping[$locationSlug])) {
		header("HTTP/1.1 301 Moved Permanently");
		header("Location:https://www.toituresbellevue.com{$fallbackUri}");
		die();
	}
	
	return [
		$locationSlug,
		$mapping[$locationSlug]
	];
}