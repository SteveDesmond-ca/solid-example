<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/PasswordResetEmailSender.php';

class EmailSenderTests extends TestCase
{
    public function testMessageIsCorrect()
    {
        //arrange
        $mailer = $this->createMock(Swift_Mailer::class);
        $email_sender = new PasswordResetEmailSender($mailer);
        $_GET['staff'] = null;

        //act
        $message = $email_sender->getMailMessage('test@example.com', 'abc123');

        //assert
        $this->assertArrayHasKey('admin@example.com', $message->getFrom());
        $this->assertArrayHasKey('test@example.com', $message->getTo());
        $this->assertEquals('Password Reset', $message->getSubject());
        $this->assertContains('token=abc123', $message->getBody());
    }
}