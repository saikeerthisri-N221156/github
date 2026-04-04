<?php
require_once "../config/database.php";

$id = new MongoDB\BSON\ObjectId($_POST['id']);

$usersCollection->updateOne(
    ['_id' => $id],
    ['$set' => [
        'name' => $_POST['name'],
        'email' => $_POST['email']
    ]]
);

header("Location: ../public/dashboard.php");
exit();
?>

