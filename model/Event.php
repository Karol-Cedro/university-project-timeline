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

    public function getEventById($id)
    {
        $this->db->query("SELECT timeline_events.*, users.nickname AS nick
                                FROM timeline_events
                                INNER JOIN users
                                ON timeline_events.owner_id=users.id
                                WHERE timeline_events.id='$id'");
        return $this->db->single();
    }

    public function addEvent($name, $start_date, $end_date, $description, $image, $owner_id, $category_id)
    {
        $this->db->query("INSERT INTO timeline_events(name,start_date,end_date,description,image,owner_id,category_id) 
                                VALUES ('$name','$start_date','$end_date','$description','$image','$owner_id','$category_id')");
        $this->db->execute();
    }

    public function deleteEvent($id)
    {
        $this->db->query("DELETE FROM timeline_events WHERE id='$id'");
        $this->db->execute();
    }

    public function updateEvent($name, $start_date, $end_date, $description, $image, $owner_id, $category_id, $event_id)
    {
        $this->db->query("UPDATE timeline_events SET  name='$name',start_date='$start_date',end_date='$end_date',description='$description',
                            image='$image',owner_id='$owner_id',category_id='$category_id' WHERE id='$event_id'");
        $this->db->execute();
    }

    public function updateEventNoImage($name, $start_date, $end_date, $description, $owner_id, $category_id, $event_id)
    {
        $this->db->query("UPDATE timeline_events SET  name='$name',start_date='$start_date',end_date='$end_date',description='$description',
                                    owner_id='$owner_id',category_id='$category_id' WHERE id='$event_id'");
        $this->db->execute();
    }
}