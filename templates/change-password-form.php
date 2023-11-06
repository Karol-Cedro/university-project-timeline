<?php include_once '../config/init.php'; ?>
<?php include 'header-admin.php'; ?>

<?php
if (isset($_SESSION['id'])) {?>
    <div class="row d-flex justify-content-center align-items-center h-50">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card-body p-5 text-center">
                <form method="post" action="../change-password.php">
                    <div class="form-outline form-white mb-4">
                        <input type="password" id="typeEmailX" class="form-control form-control-lg" name="current_password"/>
                        <label class="form-label" for="typeEmailX">Current password</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" id="typeNewPasswordX" class="form-control form-control-lg" name="new_password"/>
                        <label class="form-label" for="typeNewPasswordX">New password</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" id="typeRepeatPasswordX" class="form-control form-control-lg" name="confirm_password"/>
                        <label class="form-label" for="typeRepeatPasswordX">Repeat new password</label>
                    </div>

                    <input class="btn btn-info btn-lg px-5" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
<?php
    }else {
    header("Location: ../index.php");
 }
?>

<?php include 'footer.php'; ?>