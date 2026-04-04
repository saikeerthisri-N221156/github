<?php
session_start();
require '../config/db.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $collection->findOne(['email' => $email]);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user'] = $user['name'];
        header("Location: ../public/dashboard.php");
    } else {
        echo "Invalid email or password!";
    }
}
?>