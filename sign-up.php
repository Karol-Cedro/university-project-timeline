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

        redirect('templates/sign-up-form.php','Email is required' ,'error');
        exit();

    } else if (!empty($check_if_email_exists)) {
        redirect('templates/sign-up-form.php','User with this email already exists' ,'error');
        exit();

    } else if (empty($password)) {

        redirect('templates/sign-up-form.php','Password is required' ,'error');
        exit();

    } else if (empty($confirm_password)) {
        redirect('templates/sign-up-form.php','Confirm Password is required' ,'error');
        exit();
    } else if (empty($nickname)) {
        redirect('templates/sign-up-form.php','Nickname is required' ,'error');
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