<?php 
require_once __DIR__ . '/src/Controller.php';
$controller = new Controller();
$output = $controller->index();
echo $output;