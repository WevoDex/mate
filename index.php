<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPQualityScore API Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            max-width: 600px;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-size: 20px;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            font-size: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        h1 {
            font-size: 30px;
        }
        p {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <?php
    // List of API keys
    $api_keys = [
        '1JmnNqrPUSKY1MrbdKihNRox8h3Y2Td9',
        'PpsEl4skeciD1slzUuO3xzbqq3fwnmiB',
        '4kHA1hCaNick2s4ShTdVMupb7cWlbpWC',
        'gTjlcel7UT5GnKhVu9cV3YZtfMr1d1sz'
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Rotate through API keys
        $api_key = $api_keys[array_rand($api_keys)];

        // Get the IP address from the form
        $ip = $_POST['ip'];

        // Prepare the API URL
        $url = "https://www.ipqualityscore.com/api/json/ip/{$api_key}/{$ip}";

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL session
        $response = curl_exec($ch);

        // Check if an error occurred
        if(curl_error($ch)) {
            echo 'Error occurred while making the API request: ' . curl_error($ch);
        } else {
            // Decode the JSON response
            $data = json_decode($response, true);

            // Display the fraud score
            if(isset($data['fraud_score'])) {
                echo '<h1>Fraud Score</h1>';
                echo '<p>' . $data['fraud_score'] . '</p>';
            } else {
                echo 'Fraud score not available.';
            }
        }

        // Close the cURL session
        curl_close($ch);
    }
    ?>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="ip">Enter IP Address:</label><br>
            <input type="text" id="ip" name="ip" required><br>
            <button type="submit">Check IP</button>
        </form>
    </div>
</body>
</html>
