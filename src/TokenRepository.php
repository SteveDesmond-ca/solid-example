<?php

use Aura\Sql\ExtendedPdoInterface;

class TokenRepository
{
    /** @var ExtendedPdoInterface */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createToken($username)
    {
        $token = md5(rand());
        $this->db->exec("INSERT INTO password_reset_tokens (username, token, created) VALUES ('$username', '$token', NOW());");
        return $token;
    }
}