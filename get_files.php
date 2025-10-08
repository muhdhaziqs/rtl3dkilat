<?php
$path = $_GET['path'] ?? '';
$files = array_filter(glob("$path/*.png"));
$names = array_map('basename', $files);
echo json_encode($names);
?>
