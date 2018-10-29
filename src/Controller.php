<?php

class Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $db = mysqli_connect('localhost', 'user', null, 'app');
            $result = mysqli_query($db, "SELECT * FROM users WHERE username='{$_POST['username']}';");
            $user = $result->fetch_assoc();
            $token = md5(rand());
            mysqli_query($db, "INSERT INTO password_reset_tokens (username, token, created) VALUES ('{$user['username']}', '$token' NOW());");
            $body = 'Please <a href="/reset_password.php?token=' . $token . '">click here</a> to reset your password.';
            if ($_GET['staff']) {
                $body = "A password reset was requested on your behalf. $body";
            }

            mail($user['email'], 'Password Reset', $body);
            include 'sent.php';
        } else {
            include 'form.php';
        }
    }
}
