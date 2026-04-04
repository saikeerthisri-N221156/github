<!-- <?php
require_once __DIR__ . '/../vendor/autoload.php';

try {
    $client = new MongoDB\Client("mongodb://127.0.0.1:27017");
    $db = $client->wtlab;          // database name
    $usersCollection = $db->users; // collection name
} catch (Exception $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?> -->

<?php
$conn = new mysqli("localhost", "root", "", "wtlab");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
