<?php 
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/PasswordResetController.php';
$controller = new PasswordResetController();
$output = $controller->handleRequest();
echo $output;