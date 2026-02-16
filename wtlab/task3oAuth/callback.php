

<?php
session_start();

$client_id = 'Ov23litERsA7Id6BsV17';
$client_secret = 'ea0c43394470e346d5868ca9c92caefa9a799ff5';
$redirect_uri = 'http://localhost/github/wtlab/task3oAuth/callback.php';

if(!isset($_GET['code'])){
    exit('No code returned');
}

$code = $_GET['code'];

// Step 1: Exchange code for access token
$token_url = "https://github.com/login/oauth/access_token";
$data = [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'code' => $code,
    'redirect_uri' => $redirect_uri
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
if(!isset($result['access_token'])){
    exit('Error getting access token');
}
$access_token = $result['access_token'];

// Step 2: Get user info
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.github.com/user");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: token $access_token",
    "User-Agent: PHP"
]);
$user_data = curl_exec($ch);
curl_close($ch);

$user = json_decode($user_data, true);

// Step 3: Get primary email
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.github.com/user/emails");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: token $access_token",
    "User-Agent: PHP"
]);
$email_data = curl_exec($ch);
curl_close($ch);

$emails = json_decode($email_data, true);
$primary_email = 'N/A';
if(is_array($emails)){
    foreach($emails as $e){
        if(isset($e['primary']) && $e['primary'] === true){
            $primary_email = $e['email'];
            break;
        }
    }
}

// Store user in session
$_SESSION['user'] = [
    'name' => $user['name'] ?? $user['login'],
    'login' => $user['login'],
    'email' => $primary_email
];

header('Location: dashboard.php');
exit;
