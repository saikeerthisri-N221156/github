<?php
include 'db.php';

$message = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if mobile already exists
        $check = $conn->prepare("SELECT * FROM farmer WHERE mobile = ?");
        $check->bind_param("s", $mobile);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $message = "Mobile number already registered!";
        } else {
            $stmt = $conn->prepare("INSERT INTO farmer (name, mobile, email, state, district, password) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $name, $mobile, $email, $state, $district, $hashed_password);

            if ($stmt->execute()) {
                $message = "Registration successful!";
            } else {
                $message = "Error: " . $stmt->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Registration</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="form-container">
    <h2>Farmer Registration</h2>
    <p class="subtitle">Register to access subsidies & services</p>

    <form method="POST" action="">
        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>

        <label>Mobile Number</label>
        <input type="tel" name="mobile" placeholder="Enter mobile number" required>

        <label>Email (Optional)</label>
        <input type="email" name="email" placeholder="Enter email">

        <label>State</label>
        <input type="text" name="state" placeholder="Enter state" required>

        <label>District</label>
        <input type="text" name="district" placeholder="Enter district" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Create password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>

        <button type="submit" name="register">Register</button>
    </form>

    <p style="color:green;"><?php echo $message; ?></p>

    <p class="switch">
        Already registered? <a href="login.php">Sign In</a>
    </p>
</div>
</body>
</html>
