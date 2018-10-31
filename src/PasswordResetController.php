<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/TokenRepository.php';
require_once __DIR__ . '/UserRepository.php';

class PasswordResetController extends Controller
{
    /** @var UserRepository */
    private $user_repository;

    /** @var TokenRepository */
    private $token_repository;

    /** @var PasswordResetEmailSender */
    private $email_sender;

    public function __construct($user_repository, $token_repository, $email_sender)
    {
        $this->user_repository = $user_repository;
        $this->token_repository = $token_repository;
        $this->email_sender = $email_sender;
    }

    public function get()
    {
        $view_model['message'] = $_GET['staff']
        ? 'Enter the username whose password to reset.'
        : 'Please complete the form to reset your password.';

        return $this->view('form.php', $view_model);
    }

    public function post()
    {
        $user = $this->user_repository->getUser($_POST['username']);
        $token = $this->token_repository->createToken($user['username']);
        $this->email_sender->sendMessage($user['email'], $token);
        return $this->view('sent.php');
    }
}
