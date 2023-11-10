<?php include_once 'config/init.php'; ?>
<?php

$event = new Event();

if (isset($_POST['submit'])) {
    $event_id = $_POST['event'];

    if (empty($event_id)) {
        redirect('templates/delete-event-form.php','Event is required' ,'error');
        exit();
    } else {
        $event->deleteEvent($event_id);
        header("Location: index.php");
        exit();
    }
}