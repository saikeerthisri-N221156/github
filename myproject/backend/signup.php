<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validation
    if (empty($name) || empty($email) || empty($password)) {
        die(json_encode(['status' => 'error', 'message' => 'All fields are required']));
    }

    if (strlen($password) < 6) {
        die(json_encode(['status' => 'error', 'message' => 'Password must be at least 6 characters']));
    }

    // Check for duplicate email
    $existingUser = $usersCollection->findOne(['email' => $email]);
    if ($existingUser) {
        die(json_encode(['status' => 'error', 'message' => 'Email already registered']));
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $result = $usersCollection->insertOne([
        'name' => $name,
        'email' => $email,
        'password' => $hashedPassword,
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    if ($result->getInsertedCount() === 1) {
        echo json_encode(['status' => 'success', 'message' => 'Signup successful']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Signup failed']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}