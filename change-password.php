<?php include_once 'config/init.php'; ?>
<?php

$user = new User();

if (isset($_POST['submit']) && isset($_SESSION['id'])) {

    $current_password = validateInput($_POST['current_password']);
    $new_password = validateInput($_POST['new_password']);
    $confirm_password = validateInput($_POST['confirm_password']);

    if (empty($current_password)) {

        redirect('templates/change-password.php','Current password is required' ,'error');
        exit();

    } else if (empty($new_password)) {

        redirect('templates/change-password.php','New password is required' ,'error');
        exit();

    } else if (empty($confirm_password)) {

        redirect('templates/change-password.php','You need to confirm new password' ,'error');
        exit();

    } else if ($new_password !== $confirm_password) {
        redirect('templates/change-password.php','New password and confirm password dont match' ,'error');
        exit();
    } else {

        $result = $user->getUserPasswordById($_SESSION['id']);

        if ($current_password === $result->password) {
            $user->changeUserPassword($new_password, $_SESSION['id']);
            header("Location: index.php");
            exit();
        } else {
            redirect('templates/change-password.php','Wrong password' ,'error');
            exit();
        }
    }
} else {
    header("Location: templates/change-password.php");
    exit();
}