<?php

class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCategories()
    {
        $this->db->query("SELECT * FROM categories");
        return $this->db->resultsSet();
    }

    public function addCategory($name, $color){
        $this->db->query("INSERT INTO categories(name,color) VALUES ('$name','$color')");
        $this->db->execute();
    }
}
