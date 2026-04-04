<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php'; // Composer autoload

use MongoDB\Client;

try {
    $client = new Client("mongodb://127.0.0.1:27017"); // MongoDB server
    $db = $client->myproject;       // database name
    $usersCollection = $db->users;  // collection name
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}