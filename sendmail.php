<?php
require_once(__DIR__ . '/vendor/autoload.php');

$email = 'chathu9935@gmail.com';
$subject = 'This is a test email';

$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
    new GuzzleHttp\Client(),
    $config
);


session_start();
error_reporting(0);
include('/police/includes/dbconnection.php');
// Function to generate a random 6-character password
function generatePassword() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }
    return $password;
}
// Set or retrieve the password from the session
if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
} else {
    $password = generatePassword();
    $_SESSION['password'] = $password;
}
// Set or retrieve the expiration time from the session
if (isset($_SESSION['expiration'])) {
    $expiration = $_SESSION['expiration'];
} else {
    $expiration = time() + 60;
    $_SESSION['expiration'] = $expiration;
}
// Update the password and expiration time every 60 seconds
if (time() > $expiration) {
    $password = generatePassword();
    $_SESSION['password'] = $password;
    $expiration = time() + 60;
    $_SESSION['expiration'] = $expiration;
}
// Display the password and countdown timer
echo "<h2>One-Time Password: $password</h2>";
$remainingTime = $expiration - time();
echo "<h3>Time remaining: <span id='countdown'>$remainingTime</span> seconds</h3>";

// Verify the entered password
/* if (isset($_POST['otp'])) {
    $enteredPassword = $_POST['otpcode'];
    if ($enteredPassword === $password) { //error
        //echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
        echo "Okay";
        echo '
        <script>
  window.location.href="dashboard.php";
</script>
        ';
        
    } else {
        echo "<p>Incorrect password. Please try again.</p>";
    }
} */
?>

<!-- JavaScript code for countdown -->
<script>
// Countdown function
function countdown() {
    var countdownElement = document.getElementById('countdown');
    var remainingTime = parseInt(countdownElement.textContent);
    if (remainingTime > 0) {
        remainingTime--;
        countdownElement.textContent = remainingTime;
        setTimeout(countdown, 1000);
    }
}

// Start the countdown when the page loads
window.onload = function() {
    countdown();
};
</script>

<?php
$OTP = $password;


$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
$sendSmtpEmail['subject'] = 'OTP CODE';
$sendSmtpEmail['htmlContent'] = '<html><body><h1>The OTP code is</h1></body></html>'.$OTP;
$sendSmtpEmail['sender'] = array('name' => 'OTP Code', 'email' => 'do-not-reply@example.com');
$sendSmtpEmail['to'] = array(
    array('email' => 'chathu9935@gmail.com', 'name' => 'Chathuri Perera')
);

// $sendSmtpEmail['cc'] = array(
//     array('email' => 'example2@example2.com', 'name' => 'Janice Doe')
// );
// $sendSmtpEmail['bcc'] = array(
//     array('email' => 'example@example.com', 'name' => 'John Doe')
// );

//$sendSmtpEmail['replyTo'] = array('email' => 'replyto@domain.com', 'name' => 'John Doe');
$sendSmtpEmail['headers'] = array('Some-Custom-Name' => 'unique-id-1234');
$sendSmtpEmail['params'] = array('parameter' => 'My param value', 'subject' => 'New Subject');

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    //print_r($result);
    echo '
    <script>
window.location.href="/crimerms/police/otp02.php";
</script>
    ';
} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}
?>
