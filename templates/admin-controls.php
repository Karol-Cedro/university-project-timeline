<!DOCTYPE html>

<html lang="pl">

<div class="text-center">
    <h3>Welcome in administrator panel <?php echo $_SESSION['nickname']; ?></h3>
    <br>
    <a href="templates/add-event.php" class="btn btn-success me-2" role="button">Add</a>
    <a href="templates/update-event.php" class="btn btn-info me-2" role="button">Update</a>
    <a href="templates/delete-event.php" class="btn btn-danger me-2" role="button">Delete</a>
    <a href="templates/change-password-form.php" class="btn btn-warning me-2" role="button">Change password</a>
</div>
<br>
<br>


</html>