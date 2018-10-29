<?php

class UserRepository
{
    public function getUser($username)
    {
        $db = mysqli_connect('localhost', 'user', null, 'app');
        $result = mysqli_query($db, "SELECT * FROM users WHERE username='$username'");
        return $result->fetch_assoc();
    }
}