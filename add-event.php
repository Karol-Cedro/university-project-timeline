<?php include_once 'config/init.php'; ?>
<?php

$event = new Event();

if (isset($_POST['submit'])) {

    $event_name = validateInput($_POST['name']);
    $start_date = validateInput($_POST['start_date']);
    $end_date = validateInput($_POST['end_date']);
    $description = validateInput($_POST['description']);
    $image = $_POST['image'];
    $owner_id = $_SESSION['id'];
    $category_id = $_POST['category'];


    if (empty($event_name)) {

        redirect('templates/add-event-form','Event name is required' ,'error');
        exit();

    } else if (empty($start_date)) {
        redirect('templates/add-event-form','Start date is required' ,'error');
        exit();
    } else if (empty($end_date)) {
        redirect('templates/add-event-form','End date is required' ,'error');
        exit();
    } else if (empty($description)) {
        redirect('templates/add-event-form','Description is required' ,'error');
        exit();
    } else if (empty($image)) {
        redirect('templates/add-event-form','File is required' ,'error');
        exit();
    } else if (empty($category_id)) {
        redirect('templates/add-event-form','Category is required' ,'error');
        exit();
    } else {
        $event->addEvent($event_name, $start_date, $end_date, $description, $image, $owner_id, $category_id);
        header("Location: index.php");
        exit();
    }
}
