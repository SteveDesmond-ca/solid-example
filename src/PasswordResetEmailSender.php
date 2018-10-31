<?php

class PasswordResetEmailSender
{
    /** @var Swift_Mailer */
    private $mailer;

    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMessage($email, $token)
    {
        $message = $this->getMailMessage($email, $token);
        $this->mailer->send($message);
    }

    /**
     * @param $email
     * @param $token
     * @return Swift_Message
     */
    public function getMailMessage($email, $token)
    {
        $body = 'Please <a href="/reset_password.php?token=' . $token . '">click here</a> to reset your password.';
        if ($_GET['staff']) {
            $body = "A password reset was requested on your behalf. $body";
        }

        $message = new Swift_Message();
        $message->setFrom('admin@example.com');
        $message->setTo($email);
        $message->setSubject('Password Reset');
        $message->setBody($body);
        return $message;
    }
}