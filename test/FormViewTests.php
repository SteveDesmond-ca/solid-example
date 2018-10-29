<?php

use PHPUnit\Framework\TestCase;

class FormViewTests extends TestCase
{
    public function testMessageWhenStaff()
    {
        //arrange
        $_GET['staff'] = 1;

        //act
        ob_start();
        include __DIR__ . '/../src/form.php';
        $view = ob_get_clean();

        //assert
        $this->assertContains('Enter the username', $view);
    }

    public function testMessageWhenNotStaff()
    {
        //arrange
        $_GET['staff'] = 0;

        //act
        ob_start();
        include __DIR__ . '/../src/form.php';
        $view = ob_get_clean();

        //assert
        $this->assertContains('complete the form', $view);
    }
}