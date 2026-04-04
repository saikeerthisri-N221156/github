 <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
require __DIR__ . '/../config/db.php';

if(isset($_POST['signup'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validation
    if(empty($name) || empty($email) || empty($password)){
        die("All fields required");
    }

    if(strlen($password) < 6){
        die("Password must be at least 6 characters");
    }

    // Duplicate check
    $existing = $collection->findOne(['email' => $email]);

    if($existing){
        die("User already exists!");
    }

    // Insert user
    $collection->insertOne([
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    echo "Signup successful! <a href='../public/login.html'>Login</a>";
}
?>