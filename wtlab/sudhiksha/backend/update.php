<?php
require '../config/db.php';

$email = $_POST['email'];
$newName = $_POST['name'];

$collection->updateOne(
    ['email' => $email],
    ['$set' => ['name' => $newName]]
);

echo "User updated!";
?>