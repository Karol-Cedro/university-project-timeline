<?php include_once 'config/init.php'; ?>
<?php

$user= new User();

if (isset($_POST['submit'])){

    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);

    if (empty($email)) {

        header("Location: templates/login-form.php?error=Email is required");
        exit();

    }else if(empty($password)){

        header("Location: templates/login-form.php?error=Password is required");
        exit();

    }else{

        $result = $user->getUserByEmailAndPassword($email,$password);

        if (!empty($result)) {

                $_SESSION['email'] = $result->email;
                $_SESSION['nickname'] = $result->nickname;
                $_SESSION['id'] = $result->id;
                header("Location: index.php");
                exit();
        }else{

            header("Location: index.php?error=Incorrect email or password");
            exit();
        }

    }

}else{

    header("Location: templates/login-form.php");
    exit();

}