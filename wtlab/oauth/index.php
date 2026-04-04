
<!DOCTYPE html>
<html>
<head>
    <title>Agri Portal - Customer Support</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #3d6d40, #60ec67);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            position: relative;
        }

        .container {
            text-align: center;
            z-index: 2;
        }

        .logo {
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .tagline {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .watermark {
            position: absolute;
            font-size: 120px;
            opacity: 0.08;
            font-weight: bold;
            transform: rotate(-30deg);
            white-space: nowrap;
            color: black;
        }
    </style>
</head>

<body>

<div class="watermark">Keerthi</div>

<div class="container">
    <div class="logo">🌾 Agri Portal</div>
    <div class="tagline">Customer Support Login using Google OAuth</div>

    <div id="g_id_onload"
         data-client_id="190249683067-9vmemeue6hgr94vlgeh9iks2f5fm12cc.apps.googleusercontent.com"
         data-callback="handleCredentialResponse">
    </div>

    <div class="g_id_signin" data-type="standard"></div>
</div>

<form id="loginForm" method="POST" action="callback.php">
    <input type="hidden" name="credential" id="credential">
</form>

<script>
function handleCredentialResponse(response) {
    document.getElementById("credential").value = response.credential;
    document.getElementById("loginForm").submit();
}
</script>