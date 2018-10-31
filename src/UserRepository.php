<?php

class UserRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUser($username)
    {
        $result = mysqli_query($this->db, "SELECT * FROM users WHERE username='$username'");
        return $result->fetch_assoc();
    }
}