<?php include_once 'config/init.php'; ?>
<?php

$user = new User();

if (isset($_POST['submit']) && isset($_SESSION['id'])) {

    $current_password = validateInput($_POST['current_password']);
    $new_password = validateInput($_POST['new_password']);
    $confirm_password = validateInput($_POST['confirm_password']);

    if (empty($current_password)) {

        header("Location: templates/change-password.php?error=Current password is required");
        exit();

    } else if (empty($new_password)) {

        header("Location: templates/change-password.php?error=New password is required");
        exit();

    } else if (empty($confirm_password)) {

        header("Location: templates/change-password.php?error=You need to confirm new password");
        exit();

    } else if ($new_password !== $confirm_password) {
        header("Location: templates/change-password.php?error= New password and confirm password dont match");
        exit();
    } else {

        $result = $user->getUserPasswordById($_SESSION['id']);

        if ($current_password === $result->password) {
            $user->changeUserPassword($new_password, $_SESSION['id']);
            header("Location: index.php");
            exit();
        } else {
            header("Location: templates/change-password.php?error=Wrong password");
            exit();
        }
    }
} else {
    header("Location: templates/change-password.php");
    exit();
}