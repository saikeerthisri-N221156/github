<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: public/login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h1>
    <p>Email: <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
    <a href="backend/logout.php">Logout</a>
</body>
</html>