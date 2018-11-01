<?php

require_once __DIR__ . '/PasswordResetMessage.php';

class StaffInitiatedPasswordResetMessage extends PasswordResetMessage
{
    protected function passwordResetBody($token)
    {
        return "A password reset was requested on your behalf. "
            . parent::passwordResetBody($token);
    }
}