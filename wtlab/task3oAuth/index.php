


<?php
session_start();

// GitHub OAuth settings
$client_id = 'CLIENT_ID_HERE';
$redirect_uri = 'http://localhost/github/wtlab/task3oAuth/callback.php';

// GitHub login URL
$login_url = "https://github.com/login/oauth/authorize?client_id={$client_id}&redirect_uri={$redirect_uri}&scope=user,user:email";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Support Login</title>
    <style>
        body {
            text-align:center;
            font-family: Arial, sans-serif;
            background: #f2f2f2;
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
        .login-box {
            margin-top: 100px;
            display:inline-block;
            padding:30px;
            background:#fff;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        button {
            padding:10px 20px;
            font-size:16px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <img src="logo.png" width="150" alt="Logo"><br><br>
        <h2>Login with GitHub</h2>
        <a href="<?= $login_url ?>"><button>Login</button></a>
    </div>
</body>
</html>
