<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/StaffInitiatedPasswordResetMessage.php';

class StaffInitiatedPasswordResetMessageTests extends TestCase
{
    public function testMessageIsCorrect()
    {
        //arrange/act
        $message = new StaffInitiatedPasswordResetMessage('test@example.com', 'abc123');

        //assert
        $this->assertArrayHasKey('admin@example.com', $message->getFrom());
        $this->assertArrayHasKey('test@example.com', $message->getTo());
        $this->assertEquals('Password Reset', $message->getSubject());
        $this->assertContains('token=abc123', $message->getBody());
        $this->assertContains('on your behalf', $message->getBody());
    }
}