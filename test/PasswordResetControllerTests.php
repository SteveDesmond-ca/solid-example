<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/PasswordResetController.php';

class PasswordResetControllerTests extends TestCase
{
    public function testFormContainsStaffMessage()
    {
        //arrange
        $controller = new PasswordResetController(null, null);
        $_GET['staff'] = 1;

        //act
        $output = $controller->get();

        //assert
        $this->assertContains('Enter the username', $output);
    }

    public function testFormContainsNonStaffMessage()
    {
        //arrange
        $controller = new PasswordResetController(null, null);
        $_GET['staff'] = null;

        //act
        $output = $controller->get();

        //assert
        $this->assertContains('reset your password', $output);
    }
}