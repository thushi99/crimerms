
<?php
session_start();

//echo $_SESSION['email'];
error_reporting(0);
include('includes/dbconnection.php');
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
/* echo "<h2>One-Time Password: $password</h2>";
$remainingTime = $expiration - time();
echo "<h3>Time remaining: <span id='countdown'>$remainingTime</span> seconds</h3>"; */

// Verify the entered password
if (isset($_POST['otp'])) {
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
}
?>

<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$email = $_SESSION['email'];
$subject = 'This is a test email';

$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
    new GuzzleHttp\Client(),
    $config
);

$OTP = $password;


$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
$sendSmtpEmail['subject'] = 'OTP CODE';
$sendSmtpEmail['htmlContent'] = '<html><body><h1>The OTP code is</h1></body></html>'.$OTP;
$sendSmtpEmail['sender'] = array('name' => 'OTP Code', 'email' => 'do-not-reply@example.com');
$sendSmtpEmail['to'] = array(
    array('email' => $email, 'name' => $email)
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
    /* echo '
    <script>
window.location.href="/crimerms/police/otp02.php";
</script>
    '; */
echo "you have been sent an email with the OTP code. please check and give";


} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}
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


<!DOCTYPE html>
<html>
<head>
  <title>Random Password Generator</title>
    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" href="../assets/stylesheets/theme.css" />
    <link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />
    <link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">
    <script src="../assets/vendor/modernizr/modernizr.js"></script>

  </head>
  <body>
    <!-- <a href="../index.php" class="logo pull-left"><h2 style="padding-top: 30px;padding-left: 30px;color: blue"><i class="fa fa-home"></i></h2></a> -->
    <section class="body-sign">
      <div class="center-sign">
       <!--  <a href="sigin.php" class="logo pull-left"> -->
          <strong style="font-size: 18px">One-Time Password</strong>
        </a>
        <hr />

        <div class="panel panel-sign">
          <div class="panel-title-sign mt-xl text-right">
            <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>OTP</h2>
          </div>
          <div class="panel-body">
            <form method="post">
              <div class="form-group mb-md">
                <label>OTP Code</label>
                  <!-- <br><h4>Time remaining: <span id='countdown'>remainingTime</span> seconds</h4> -->
                <div class="input-group input-group-icon">
                   <input type="password" class="form-control input-md" placeholder="Enter Your OTP Code" required="true" name="otpcode">
                  <span class="input-group-addon">
                    <span class="icon icon-md">
                      <i class="fa fa-lock"></i>
                    </span>
                  </span>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4 text-left">
                  <button type="submit" class="btn btn-primary hidden-xs" name="otp">Sign In</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
    <!-- end: page -->

    <!-- Vendor -->
    <script src="../assets/vendor/jquery/jquery.js"></script>
    <script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="../assets/javascripts/theme.js"></script>
    <script src="../assets/javascripts/theme.custom.js"></script>
    <script src="../assets/javascripts/theme.init.js"></script>
  </body><img src="http://www.ten28.com/fref.jpg">

  </html>


