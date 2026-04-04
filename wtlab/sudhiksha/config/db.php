<?php
require __DIR__ . '/../vendor/autoload.php';

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->wtlab;
    $collection = $db->users;
} catch (Exception $e) {
    die("DB Error: " . $e->getMessage());
}
?>