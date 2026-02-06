<?php
include 'db.php';
session_start();

$message = "";

if (isset($_POST['login'])) {
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    if (empty($mobile) || empty($password)) {
        $message = "Please enter the credentials!";
    } else {
        $stmt = $conn->prepare("SELECT * FROM farmer WHERE mobile = ?");
        $stmt->bind_param("s", $mobile);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['farmer_name'] = $row['name'];
                $message = "Login successful! Redirecting...";
                header("Refresh:2; url=agri.html");
            } else {
                $message = "Invalid credentials!";
            }
        } else {
            $message = "Invalid credentials!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Login</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="form-container">
    <h2>Farmer Login</h2>
    <p class="subtitle">Access your farmer dashboard</p>

    <form method="POST" action="">
        <label>Mobile Number</label>
        <input type="tel" name="mobile" placeholder="Enter registered mobile number" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password" required>

        <button type="submit" name="login">Sign In</button>
    </form>

    <p style="color:red;"><?php echo $message; ?></p>

    <p class="switch">
        New farmer? <a href="register.php">Register Here</a>
    </p>
</div>
</body>
</html>
