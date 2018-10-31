<?php

class TokenRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createToken($username)
    {
        $token = md5(rand());
        mysqli_query($this->db, "INSERT INTO password_reset_tokens (username, token, created) VALUES ('$username', '$token' NOW());");
        return $token;
    }
}