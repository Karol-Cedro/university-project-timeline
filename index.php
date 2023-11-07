<?php include_once 'config/init.php'; ?>
<?php include 'templates/header.php'; ?>

<?php
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    include 'templates/admin-controls.php';
}
?>

<div style="padding-left: 20px; padding-right: 20px">
    <?php include 'timeline.php';?>
</div>

<?php include 'templates/footer.php'; ?>