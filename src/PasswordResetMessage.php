<?php

class PasswordResetMessage extends Swift_Message
{
    public function __construct($email, $token)
    {
        parent::__construct();
        
        $this->setFrom('admin@example.com');
        $this->setTo($email);
        $this->setSubject('Password Reset');

        $body = $this->passwordResetBody($token);
        $this->setBody($body);
    }

    protected function passwordResetBody($token)
    {
        return 'Please <a href="/reset_password.php?token=' . $token . '">click here</a> to reset your password.';
    }
}