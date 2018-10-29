<?php

require_once __DIR__ . '/Controller.php';
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
        $db = mysqli_connect('localhost', 'user', null, 'app');
        $token = md5(rand());
        mysqli_query($db, "INSERT INTO password_reset_tokens (username, token, created) VALUES ('{$user['username']}', '$token' NOW());");
        $body = 'Please <a href="/reset_password.php?token=' . $token . '">click here</a> to reset your password.';
        if ($_GET['staff']) {
            $body = "A password reset was requested on your behalf. $body";
        }

        mail($user['email'], 'Password Reset', $body);
        return $this->view('sent.php');
    }
}
