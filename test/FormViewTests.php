<?php

use PHPUnit\Framework\TestCase;

class FormViewTests extends TestCase
{
    public function testFormContainsMessage()
    {
        //arrange
        $view_model['message'] = 'test message';

        //act
        ob_start();
        include __DIR__ . '/../src/form.php';
        $view = ob_get_clean();

        //assert
        $this->assertContains('test message', $view);
    }
}