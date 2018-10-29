<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/PasswordResetController.php';

class PasswordResetControllerTests extends TestCase
{
    public function testCanGetForm()
    {
        //arrange
        $controller = new PasswordResetController();
        $_GET['staff'] = null;

        //act
        $output = $controller->get();

        //assert
        $this->assertContains('reset your password', $output);
    }
}