<?php

$consumerKey = "aE15jGTAHGS2CroObdAiRFSiec7ONGoG";
$consumerSecret = "A3wcEEqEuHUoGXF6";

// MPESA ACCESS TOCKEN URL
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$headers = ['Content-Type: application/json; charset=utf8'];

$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);

$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if (!$result) {
  die("Connection Failure");
}

$response = json_decode($result);

if (isset($response->access_token)) {
  $access_token = $response->access_token;
  echo $access_token;
} else {
  die("Invalid response from server");
}

curl_close($curl);

?> 
