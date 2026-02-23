<?php
require_once __DIR__ . '/../vendor/autoload.php';

try {
    $client = new MongoDB\Client("mongodb://127.0.0.1:27017");
    $db = $client->wtlab;          // database name
    $usersCollection = $db->users; // collection name
} catch (Exception $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
