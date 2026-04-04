<?php
require_once "../config/database.php";

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
    $usersCollection->deleteOne(['_id' => $id]);
}

header("Location: ../public/dashboard.php");
exit();
?>