<?php
require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validation
    if (empty($name) || empty($email) || empty($password)) {
        die("All fields are required");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    if (strlen($password) < 6) {
        die("Password must be at least 6 characters");
    }

    // Duplicate Email Check
    $existingUser = $usersCollection->findOne(['email' => $email]);

    if ($existingUser) {
        die("Email already exists");
    }

    // Insert User
    $usersCollection->insertOne([
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    echo "Signup Successful";
}
?>