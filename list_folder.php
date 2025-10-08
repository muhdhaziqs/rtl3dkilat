<?php
$path = $_GET['path'];
$folders = array_filter(glob("$path/*"), 'is_dir');
$names = array_map('basename', $folders);
echo json_encode($names);
?>
