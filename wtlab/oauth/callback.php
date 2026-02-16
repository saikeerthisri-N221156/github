<?php

if (isset($_POST['credential'])) {

    $token = $_POST['credential'];

    $payload = json_decode(
        base64_decode(
            str_replace('_', '/', str_replace('-', '+', explode('.', $token)[1]))
        ),
        true
    );

    $name = $payload['name'];
    $email = $payload['email'];
    $picture = $payload['picture'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agri Portal - Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            text-align: center;
            margin-top: 100px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        img {
            border-radius: 50%;
        }

        .logout {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background: #2e7d32;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>Welcome to Agri Portal 🌾</h2>
    <img src="<?php echo $picture; ?>" width="120"><br><br>
    <strong>Name:</strong> <?php echo $name; ?><br>
    <strong>Email:</strong> <?php echo $email; ?><br><br>

    <a class="logout" href="index.php">Logout</a>
</div>

</body>
</html>