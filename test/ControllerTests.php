<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Controller.php';

class ControllerTests extends TestCase
{
    public function testCanGetForm()
    {
        //arrange
        $controller = new Controller();
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['staff'] = null;

        //act
        ob_start();
        $controller->index();
        $output = ob_get_clean();

        //assert
        $this->assertContains('reset your password', $output);
    }
}