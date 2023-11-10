<?php include_once 'config/init.php'; ?>
<?php

$user = new User();

if (isset($_POST['submit'])) {

    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);
    $confirm_password = validateInput($_POST['confirm_password']);
    $nickname = validateInput($_POST['nickname']);

    $check_if_email_exists = $user->getUserByEmail($email);

    if (empty($email)) {

        header("Location: templates/sign-up-form.php?error=Email is required");
        exit();

    } else if (!empty($check_if_email_exists)) {
        header("Location: templates/sign-up-form.php?error=User with this email already exists");
        exit();

    } else if (empty($password)) {

        header("Location: templates/sign-up-form.php?error=Password is required");
        exit();

    } else if (empty($confirm_password)) {
        header("Location: templates/sign-up-form.php?error=Confirm Password is required");
        exit();
    } else if (empty($nickname)) {
        header("Location: templates/sign-up-form?error=Nickname is required");
        exit();
    } else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $user->addNewUser($email, $hashed_password, $nickname);
        header("Location: index.php");
        exit();

    }

} else {

    header("Location: templates/login-form.php");
    exit();

}