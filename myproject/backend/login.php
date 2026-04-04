<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        die(json_encode(['status' => 'error', 'message' => 'All fields are required']));
    }

    $user = $usersCollection->findOne(['email' => $email]);

    if (!$user) {
        die(json_encode(['status' => 'error', 'message' => 'User not found']));
    }

    if (!password_verify($password, $user['password'])) {
        die(json_encode(['status' => 'error', 'message' => 'Invalid password']));
    }

    echo json_encode(['status' => 'success', 'message' => 'Login successful', 'name' => $user['name']]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}