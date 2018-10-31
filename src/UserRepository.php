<?php

use Aura\Sql\ExtendedPdoInterface;

class UserRepository
{
    /** @var ExtendedPdoInterface */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUser($username)
    {
        return $this->db->fetchAssoc("SELECT * FROM users WHERE username='$username'");
    }
}