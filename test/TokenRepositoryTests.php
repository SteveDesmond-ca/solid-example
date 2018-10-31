<?php

use Aura\Sql\ExtendedPdoInterface;
use PHPUnit\Framework\TestCase;

class TokenRepositoryTests extends TestCase
{
    public function testReturnsToken()
    {
        //arrange
        $db = $this->createMock(ExtendedPdoInterface::class);
        $token_repo = new TokenRepository($db);

        //act
        $token = $token_repo->createToken('test user');

        //assert
        $this->assertNotEmpty($token);
    }

    public function testAddsTokenToDB()
    {
        //arrange
        $db = $this->createMock(ExtendedPdoInterface::class);
        $token_repo = new TokenRepository($db);

        //assert
        $db->expects($this->atLeastOnce())->method('exec')->with($this->stringStartsWith('INSERT'));

        //act
        $token_repo->createToken('test user');
    }
}