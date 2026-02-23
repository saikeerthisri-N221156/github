<?php
session_start();
require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        die("All fields are required");
    }

    $user = $usersCollection->findOne(['email' => $email]);

    if (!$user) {
        die("User not found");
    }

    if (!password_verify($password, $user['password'])) {
        die("Incorrect password");
    }

    $_SESSION['user_id'] = (string)$user['_id'];
    $_SESSION['user_name'] = $user['name'];

    header("Location: ../public/dashboard.php");
    exit();
}
?>