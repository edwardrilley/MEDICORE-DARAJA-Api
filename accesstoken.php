<?php

$consumerKey ="aE15jGTAHGS2CroObdAiRFSiec7ONGoG";
$consumerSecret ="A3wcEEqEuHUoGXF6";
// MPESA ACCESS TOCKEN URL
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$headers = ['Content-Type:application/json; charset=utf8'];
$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);


The error message "Notice: Trying to get property of non-object" in line 18 indicates that the variable $result is not an object, and therefore it cannot access its properties. This may be caused by an error in the response from the API or an issue with the curl request.

To fix the issue, you can add error handling code to check if $result is an object before accessing its properties. For example:

```
$result = json_decode($result);
if (isset($result->access_token)) {
    echo $access_token = $result->access_token;
} else {
    echo "Error: Failed to retrieve access token";
}
curl_close($curl);
```

This code checks if $result has an "access_token" property before trying to access it. If the property is not found, it displays an error message. This can help you identify and troubleshoot issues with the API or the curl request.