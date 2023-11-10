<?php include_once 'config/init.php'; ?>
<?php

$user= new User();

if (isset($_POST['submit'])){

    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);

    if (empty($email)) {

        redirect('templates/login-form.php','Email is required' ,'error');
        exit();

    }else if(empty($password)){

        redirect('templates/login-form.php','Password is required' ,'error');
        exit();

    }else{

        $result = $user->getUserByEmail($email);

        if (!empty($result) && password_verify($password,$result->password)) {

                $_SESSION['email'] = $result->email;
                $_SESSION['nickname'] = $result->nickname;
                $_SESSION['id'] = $result->id;
                header("Location: index.php");
                exit();
        }else{
            redirect('templates/login-form.php','Incorrect email or password' ,'error');
            exit();
        }

    }

}else{

    header("Location: templates/login-form.php");
    exit();

}