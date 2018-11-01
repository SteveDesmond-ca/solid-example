<?php

require_once 'PasswordResetMessage.php';

class UserInitiatedPasswordResetMessage extends PasswordResetMessage
{
    public function passwordResetBody($token)
    {
        return $this->commonBody($token);
    }
}