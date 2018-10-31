<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/TokenRepository.php';
require_once __DIR__ . '/UserRepository.php';

class PasswordResetController extends Controller
{
    public function get()
    {
        $view_model['message'] = $_GET['staff']
        ? 'Enter the username whose password to reset.'
        : 'Please complete the form to reset your password.';

        return $this->view('form.php', $view_model);
    }

    public function post()
    {
        $user_repo = new UserRepository();
        $user = $user_repo->getUser($_POST['username']);
        $token_repo = new TokenRepository();
        $token = $token_repo->createToken($user['username']);
        $body = 'Please <a href="/reset_password.php?token=' . $token . '">click here</a> to reset your password.';
        if ($_GET['staff']) {
            $body = "A password reset was requested on your behalf. $body";
        }

        mail($user['email'], 'Password Reset', $body);
        return $this->view('sent.php');
    }
}
