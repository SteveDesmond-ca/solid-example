<?php 
use Aura\Sql\ExtendedPdo;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/PasswordResetController.php';
require_once __DIR__ . '/src/PasswordResetEmailSender.php';
require_once __DIR__ . '/src/TokenRepository.php';
require_once __DIR__ . '/src/UserRepository.php';

$db = new ExtendedPdo('mysql:server=localhost;dbname=app', 'user');
$user_repo = new UserRepository($db);
$token_repo = new TokenRepository($db);
$email_sender = new PasswordResetEmailSender(new Swift_Mailer(new Swift_SmtpTransport()));

$controller = new PasswordResetController($user_repo, $token_repo, $email_sender);
$output = $controller->handleRequest();
echo $output;