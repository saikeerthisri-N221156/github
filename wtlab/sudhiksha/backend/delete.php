<?php
require '../config/db.php';

$email = $_POST['email'];

$collection->deleteOne(['email' => $email]);

echo "User deleted!";
?>