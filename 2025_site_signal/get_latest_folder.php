<?php
// image.php
$allowedSites = ['FLKL','MKPL','PBSL','UTML','DAML','PJWL','UJSL','UTNL','KUTL'];
$site = $_GET['site'] ?? '';
if (!$site || !in_array($site, $allowedSites, true)) {
    http_response_code(400);
    exit('Bad request');
}

// Absolute filesystem path anywhere (even outside web root)
$fsBase = '/Users/muhdhaziq.s/Library/CloudStorage/OneDrive-近畿大学/00 2024 Researcher at KINDAI/06 SATREPS/2025/01 Realtime Localization lightning/00 Data extract/02 Online/' . $site;
$file   = $fsBase . '/full_waveform.png';

if (!is_file($file)) {
    http_response_code(404);
    exit('Not found');
}

$mtime = filemtime($file);

// Send strong caching headers but change when file changes
header('Content-Type: image/png');
header('Cache-Control: no-cache, must-revalidate'); // or: max-age=0
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $mtime) . ' GMT');
readfile($file);
