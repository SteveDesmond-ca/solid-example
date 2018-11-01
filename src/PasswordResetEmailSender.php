<?php

require_once __DIR__ . '/UserInitiatedPasswordResetMessage.php';
require_once __DIR__ . '/StaffInitiatedPasswordResetMessage.php';

class PasswordResetEmailSender
{
    /** @var Swift_Mailer */
    private $mailer;

    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMessage($email, $token, $from_staff)
    {
        $message = $from_staff
            ? new StaffInitiatedPasswordResetMessage($email, $token)
            : new UserInitiatedPasswordResetMessage($email, $token);
        $this->mailer->send($message);
    }
}