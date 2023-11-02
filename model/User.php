<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUsers(){
        $this->db->query("SELECT * FROM users");
        return $this->db->resultsSet();
    }
}