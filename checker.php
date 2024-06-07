<?php
$proxy = "geo.iproyal.com:12321";
$proxy_auth = "ZZwOjSCwzmli56Gq:2ZdgE0ZvD3qcJ3iP";
$url = "http://ip-api.com/json";

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
