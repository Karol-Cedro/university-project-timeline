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

        header("Location: templates/add-event-form?error=Event name is required");
        exit();

    } else if (empty($start_date)) {
        header("Location: templates/add-event-form?error=start date is required");
        exit();
    } else if (empty($end_date)) {
        header("Location: templates/add-event-form?error=end date is required");
        exit();
    } else if (empty($description)) {
        header("Location: templates/add-event-form?error=Description is required");
        exit();
    } else if (empty($image)) {
        header("Location: templates/add-event-form?error=file is required");
        exit();
    } else if (empty($category_id)) {
        header("Location: templates/add-event-form?error=Category is required");
        exit();
    } else {
        $event->addEvent($event_name, $start_date, $end_date, $description, $image, $owner_id, $category_id);
        header("Location: index.php");
        exit();
    }
}
