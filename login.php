<?php include_once 'config/init.php'; ?>
<?php

$user= new User();
session_start();
if (isset($_POST['submit'])){

    function validate($data){

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

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
                header("Location: admin-page.php");
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