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

    public function getUserPasswordById($id){
        $this->db->query("SELECT * FROM users WHERE id='$id'");
        return $this->db->single();
    }

    public function changeUserPassword($password, $id){
        $this->db->query("UPDATE users SET password='$password' WHERE id='$id'");
        $this->db->execute();
    }

}