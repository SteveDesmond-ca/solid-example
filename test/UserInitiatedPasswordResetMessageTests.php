<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/UserInitiatedPasswordResetMessage.php';

class UserInitiatedPasswordResetMessageTests extends TestCase
{
    public function testMessageIsCorrect()
    {
        //arrange/act
        $message = new UserInitiatedPasswordResetMessage('test@example.com', 'abc123');

        //assert
        $this->assertArrayHasKey('admin@example.com', $message->getFrom());
        $this->assertArrayHasKey('test@example.com', $message->getTo());
        $this->assertEquals('Password Reset', $message->getSubject());
        $this->assertContains('token=abc123', $message->getBody());
    }
}