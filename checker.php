<?php
$proxy = "gw.dataimpulse.com:1043";
$proxy_auth = "b92b45fdfee4f3b6cb86__cr.us:08be108b6bc4e117";
$url = "http://ip-api.com/json";
// gw.dataimpulse.com:1043:b92b45fdfee4f3b6cb86__cr.us:08be108b6bc4e117
// Initialize cURL session
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, $url);

// Set the proxy and authentication
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxy_auth);

// Set other cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // Print the response
    echo $response;
}

// Close the cURL session
curl_close($ch);
?>
