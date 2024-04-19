<?php

// URL to which the POST request will be sent
$url = 'http://localhost:4000/pessoa';

// Data to be sent in the request body (if any)
$data = array(
    'nome' => 'John Doe PHP Developer',
    'idade' => 30
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Execute cURL session
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)) {
    echo 'POST request failed: ' . curl_error($ch);
} else {
    // Check the HTTP status code
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_status == 200) {
        echo 'POST request was successful';
    } else {
        echo 'POST request failed with status code: ' . $http_status;
    }
}

// Close cURL session
curl_close($ch);

?>
