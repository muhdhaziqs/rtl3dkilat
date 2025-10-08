<?php
header('Content-Type: application/json');

// Get site name from URL parameter
$site = $_GET['site'] ?? '';

if (!$site) {
    echo json_encode(['success' => false, 'message' => 'No site specified']);
    exit;
}

// Absolute path on your system (Server Path for PHP to check file)
$basePath = '/Users/muhdhaziq.s/Library/CloudStorage/OneDrive-近畿大学/00 2024 Researcher at KINDAI/06 SATREPS/2025/01 Realtime Localization lightning/00 Data extract/02 Online/' . $site;

// Relative path for the web browser to access (for HTML display)
$relativeWebPath = '00 Data extract/02 Online/' . $site . '/full_waveform.png';

$fullImagePath = $basePath . '/full_waveform.png';

// Check if image exists
if (file_exists($fullImagePath)) {
    echo json_encode([
        'success' => true,
        'path' => $relativeWebPath
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Image not found'
    ]);
}
?>
