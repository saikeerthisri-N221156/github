

<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { 
            text-align:center; 
            font-family:Arial,sans-serif; 
            background:#f2f2f2;
            position: relative;
        }
        body::after {
            content: "Keerthi";
            position: fixed;
            top: 50%;
            left: 50%;
            font-size: 100px;
            color: rgba(0,0,0,0.05);
            transform: translate(-50%, -50%) rotate(-30deg);
            pointer-events: none;
            z-index: -1;
        }
        .container {
            margin-top:50px;
            display:inline-block;
            padding:30px;
            background:#fff;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        button { padding:10px 20px; font-size:16px;}
    </style>
</head>
<body>
    <div class="container">
        <img src="logo.png" width="150" alt="Logo"><br><br>
        <h1>Welcome, <?= htmlspecialchars($user['name']); ?>!</h1>
        <p>GitHub Username: <?= htmlspecialchars($user['login']); ?></p>
        <p>Email: <?= htmlspecialchars($user['email']); ?></p>
        <button onclick="window.location='logout.php'">Logout</button>
    </div>
</body>
</html>

