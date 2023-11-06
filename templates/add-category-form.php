<?php include_once '../config/init.php'; ?>
<?php include 'header-admin.php'; ?>

<?php
if (isset($_SESSION['id'])) { ?>
    <section class="vh-50">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card-body p-5 text-center">
                        <form method="post" action="../add-category.php">
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="typeTextX" class="form-control form-control-lg" name="name"/>
                                <label class="form-label" for="typeTextX">Category name</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="color">Select color: </label>
                                <br>
                                <input type="color" id="color" name="color" class="form-control-color" value="#ff0000">
                            </div>

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