<?php include '../config/init.php'; ?>
<?php include 'header-admin.php'; ?>

<?php
if (isset($_SESSION['id'])) { ?>
    <section class="vh-50">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card-body p-5 text-center">
                        <form method="post" action="../update-event.php">
                            <?php
                            $event = new Event();
                            $selected_event = $event->getEventById($_POST['event']);
                            $_SESSION['event_id'] = $selected_event->id;
                            ?>

                            <div class="form-outline form-white mb-4">
                                <input type="text" id="typeTextX" class="form-control form-control-lg" name="name"
                                       value="<?php echo $selected_event->name; ?>"/>
                                <label class="form-label" for="typeTextX">Event name</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="date" id="typeDateStartX" class="form-control form-control-lg"
                                       name="start_date" value="<?php echo $selected_event->start_date; ?>"/>
                                <label class="form-label" for="typeDateStartX">Start date</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="date" id="typeDateEndX" class="form-control form-control-lg"
                                       name="end_date" value="<?php echo $selected_event->end_date; ?>"/>
                                <label class="form-label" for="typeDateEndX">End date</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <textarea type="text" id="typeDescriptionX" class="form-control form-control-lg "
                                          name="description"><?php echo $selected_event->description; ?></textarea>
                                <label class="form-label" for="typeDescriptionX">Description</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <label for="exampleFormControlFile1">Add image</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                            </div>

                            <?php
                            $category = new Category();
                            $categories = $category->getAllCategories();
                            ?>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Category</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category">

                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($selected_event->category_id == $category->id): ?>
                                            <option value="<?php echo $category->id; ?>" selected><?php echo $category->name ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                        <?php endif ?>
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