<!DOCTYPE html>
<html>
<head>
    <title>Sign In Page</title>
</head>
<body>
    <form method="POST" action="verify_otp.php">
        <label>Username</label>
        <input type="text" name="username" required>
        <br>
        <label>Password</label>
        <input type="password" name="password" required>
        <br>
        <label>OTP</label>
        <input type="text" name="otp" required>
        <br>
        <input type="submit" value="Sign In">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate the username and password
        // ...

        // Retrieve the user's mobile number from the database
        $host = '127.0.0.1';
        //$username = 'your_username';
        //$password = 'your_password';
        $database = 'crimedb';

        $connection = new mysqli($host, $username, $password, $database);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        $query = "SELECT mobile_number FROM users WHERE username = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($mobile_number);

        if ($stmt->fetch()) {
            // Send the OTP to the user's mobile number using Twilio
            require 'path/to/twilio-php/Services/Twilio.php';

            $accountSid = 'YOUR_ACCOUNT_SID';
            $authToken = 'YOUR_AUTH_TOKEN';
            $fromPhoneNumber = '+9876543210'; // Replace with your Twilio phone number

            $twilio = new Services_Twilio($accountSid, $authToken);

            // Generate a random OTP and store it in your database associated with the user's account
            $otp = generateRandomOTP(); // Implement your OTP generation logic
            storeOTPInDatabase($username, $otp); // Implement your storage logic

            $message = "Your OTP is: $otp";

            $twilio->account->messages->create(
                array(
                    'To' => $mobile_number,
                    'From' => $fromPhoneNumber,
                    'Body' => $message
                )
            );
        }

        $stmt->close();
        $connection->close();
    }

    function generateRandomOTP() {
        // Implement your OTP generation logic
    }

    function storeOTPInDatabase($username, $otp) {
        // Implement your storage logic
    }
    ?>
</body>
</html>
