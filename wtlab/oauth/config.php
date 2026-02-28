<?php
require 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId("client secret from google cloud console");       // replace with your Google client ID
$client->setClientSecret("client secret from google cloud console");   // replace with your Google client secret
$client->setRedirectUri("http://localhost/github/wtlab/oauth/callback.php");
$client->addScope("email");
$client->addScope("profile");
?>
