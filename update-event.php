<?php include_once 'config/init.php'; ?>
<?php

$event = new Event();

if (isset($_POST['submit'])) {

    $event_id = $_SESSION['event_id'];
    $event_name = validateInput($_POST['name']);
    $start_date = validateInput($_POST['start_date']);
    $end_date = validateInput($_POST['end_date']);
    $description = validateInput($_POST['description']);
    $image = $_POST['image'];
    $owner_id = $_SESSION['id'];
    $category_id = $_POST['category'];

    if (empty($image)) {
        $event->updateEventNoImage($event_name, $start_date, $end_date, $description, $owner_id, $category_id, $event_id);
        header("Location: index.php");
        exit();
    } else {
        $event->updateEvent($event_name, $start_date, $end_date, $description, $image, $owner_id, $category_id, $event_id);
        header("Location: index.php");
        exit();
    }
}
