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

    public function getUserByEmailAndPassword($email, $password){
        $this->db->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
        return $this->db->single();
    }
}