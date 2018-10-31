<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/PasswordResetController.php';
require_once __DIR__ . '/../src/UserRepository.php';
require_once __DIR__ . '/../src/TokenRepository.php';
require_once __DIR__ . '/../src/PasswordResetEmailSender.php';

class PasswordResetControllerTests extends TestCase
{
    public function testFormContainsStaffMessage()
    {
        //arrange
        $controller = new PasswordResetController(null, null, null);
        $_GET['staff'] = 1;

        //act
        $output = $controller->get();

        //assert
        $this->assertContains('Enter the username', $output);
    }

    public function testFormContainsNonStaffMessage()
    {
        //arrange
        $controller = new PasswordResetController(null, null, null);
        $_GET['staff'] = null;

        //act
        $output = $controller->get();

        //assert
        $this->assertContains('reset your password', $output);
    }

    public function testPostSendsMessage()
    {
        //arrange
        $user_repo = $this->createMock(UserRepository::class);
        $user_repo->method('getUser')->willReturn(['username' => 'testuser', 'email' => 'test@example.com']);

        $token_repo = $this->createMock(TokenRepository::class);
        $token_repo->method('createToken')->willReturn('abc123');

        $email_sender = $this->createMock(PasswordResetEmailSender::class);

        $controller = new PasswordResetController($user_repo, $token_repo, $email_sender);
        $_GET['staff'] = null;
        $_POST['username'] = 'testuser';

        //assert
        $email_sender->expects($this->atLeastOnce())->method('sendMessage')->with('test@example.com', 'abc123');

        //act
        $controller->post();

    }
}