<?php

class TokenRepository
{
    public function createToken($username)
    {
        $db = mysqli_connect('localhost', 'user', null, 'app');
        $token = md5(rand());
        mysqli_query($db, "INSERT INTO password_reset_tokens (username, token, created) VALUES ('$username', '$token' NOW());");
        return $token;
    }
}