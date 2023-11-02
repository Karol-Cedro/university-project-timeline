<?php

require_once 'model/Database.php';

class Event
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllEvents()
    {
        $this->db->query("SELECT timeline_events.*, users.nickname AS nick
                                FROM timeline_events
                                INNER JOIN users
                                ON timeline_events.owner_id=users.id");
        return $this->db->resultsSet();
    }
}