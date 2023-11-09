<?php include '../config/init.php'; ?>
<?php include 'header-admin.php'; ?>

<?php
if (isset($_SESSION['id'])) { ?>
    <section class="vh-50">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card-body p-5 text-center">
                        <form method="post" action="update-event-form.php">
                            <?php
                            $event = new Event();
                            $events = $event->getAllEventsForGivenUser($_SESSION['id']);
                            ?>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select event that you want to edit</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="event">
                                    <?php foreach ($events as $event): ?>
                                        <option value="<?php echo $event->id; ?>"><?php echo $event->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <br>

                            <input class="btn btn-info btn-lg px-5" type="submit" name="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} else {
    header("Location: ../index.php");
}
?>
<?php include 'footer.php'; ?>