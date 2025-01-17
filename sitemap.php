<?php 

require_once 'location-targeted/_mapping.php';

$urls = [
    'https://www.toituresbellevue.com/',
    'https://www.toituresbellevue.com/nous-joindre',
    'https://www.toituresbellevue.com/estimateur-en-ligne',
    'https://www.toituresbellevue.com/carriere',
    'https://www.toituresbellevue.com/a-propos',
    'https://www.toituresbellevue.com/realisations',
    'https://www.toituresbellevue.com/services/deneigement-de-toiture',
    'https://www.toituresbellevue.com/services/inspection-de-toiture',
    'https://www.toituresbellevue.com/services/refection-de-toiture',
    'https://www.toituresbellevue.com/services/reparation-de-toiture',
    'https://www.toituresbellevue.com/services/ventilation-et-isolation-entre-toit',
    'https://www.toituresbellevue.com/confidentialite',
];

foreach (getLocationSlugs() as $locationSlug) {
    $urls[] = "https://www.toituresbellevue.com/couvreur-{$locationSlug}";
    $urls[] = "https://www.toituresbellevue.com/reparation-de-toiture-{$locationSlug}";
    $urls[] = "https://www.toituresbellevue.com/isolation-entretoit-{$locationSlug}";
    $urls[] = "https://www.toituresbellevue.com/installation-toiture-{$locationSlug}";
    $urls[] = "https://www.toituresbellevue.com/entrepreneur-en-toiture-{$locationSlug}";
    $urls[] = "https://www.toituresbellevue.com/renovation-toiture-{$locationSlug}";
}

$sitemap = <<<XML
    <?xml version="1.0" encoding="UTF-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
XML;

foreach ($urls as $url) {
    $sitemap .= <<<XML
        <url>
            <loc>{$url}</loc>
        </url>
    XML;
}

$sitemap .= "</urlset>";

header('Content-type: text/xml'); 
echo trim($sitemap);
