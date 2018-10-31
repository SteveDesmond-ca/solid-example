<?php

use Aura\Sql\ExtendedPdoInterface;
use PHPUnit\Framework\TestCase;

class UserRepositoryTests extends TestCase
{
    public function testCanGetUserFromDB()
    {
        //arrange
        $db = $this->createMock(ExtendedPdoInterface::class);
        $db->method('fetchAssoc')->with($this->stringContains('testuser'))->willReturn(['username' => 'testuser', 'email' => 'test@example.com']);
        $user_repo = new UserRepository($db);

        //act
        $user = $user_repo->getUser('testuser');

        //assert
        $this->assertEquals('test@example.com', $user['email']);
    }
}