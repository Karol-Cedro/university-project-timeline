<?php

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

    public function getAllEventsForGivenUser($id)
    {
        $this->db->query("SELECT timeline_events.*, users.nickname AS nick
                                FROM timeline_events
                                INNER JOIN users
                                ON timeline_events.owner_id=users.id
                                WHERE timeline_events.owner_id='$id'");
        return $this->db->resultsSet();
    }

    public function addEvent($name, $start_date, $end_date, $description, $image, $owner_id, $category_id)
    {
        $this->db->query("INSERT INTO timeline_events(name,start_date,end_date,description,image,owner_id,category_id) 
                                VALUES ('$name','$start_date','$end_date','$description','$image','$owner_id','$category_id')");
        $this->db->execute();
    }

    public function deleteEvent($id){
        $this->db->query("DELETE FROM timeline_events WHERE id='$id'");
        $this->db->execute();
    }
}