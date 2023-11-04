<?php include_once 'config/init.php'; ?>
<?php include 'templates/header.php'; ?>

<?php
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    include 'templates/admin-controls.php';
}
?>

<?php include 'timeline.php'; ?>

<?php include 'templates/footer.php'; ?>