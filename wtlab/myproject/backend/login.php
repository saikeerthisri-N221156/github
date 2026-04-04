 <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!-- 
<?php
session_start();
require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        die("All fields are required");
    }

    $user = $usersCollection->findOne(['email' => $email]);

    if (!$user) {
        die("User not found");
    }

    if (!password_verify($password, $user['password'])) {
        die("Incorrect password");
    }

    $_SESSION['user_id'] = (string)$user['_id'];
    $_SESSION['user_name'] = $user['name'];

    header("Location: ../public/dashboard.php");
    exit();
}
?> -->

<?php
session_start();
require_once "../config/database.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];

    header("Location: ../public/dashboard.php");
} else {
    echo "Invalid login";
}
?>