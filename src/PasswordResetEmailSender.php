<?php

class PasswordResetEmailSender
{
    public function sendMessage($email, $token)
    {
        $body = 'Please <a href="/reset_password.php?token=' . $token . '">click here</a> to reset your password.';
        if ($_GET['staff']) {
            $body = "A password reset was requested on your behalf. $body";
        }

        mail($email, 'Password Reset', $body);
    }
}