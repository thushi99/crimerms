<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

function generateRandomPassword($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+=-';
    $password = '';
    $characterCount = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $characterCount - 1)];
    }

    return $password;
}

$expirationTime = time() + 60; // Set the expiration time to 60 seconds in the future
$password = generateRandomPassword(6);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Random Password Generator</title>
    <script>
        function updateTimer() {
            var currentTime = new Date().getTime();
            var remainingTime = <?php echo $expirationTime * 1000; ?> - currentTime;

            if (remainingTime <= 0) {
                location.reload(); // Reload the page when the timer expires
            } else {
                var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
                document.getElementById("timer").innerText = seconds + "s";
            }
        }

        setInterval(updateTimer, 1000);
    </script>
</head>
<body>
    <h1>Random Password Generator</h1>
    <p>Current Password: <?php echo $password; ?></p>
    <p>Password will change in: <span id="timer">60s</span></p>
</body>
</html>


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
  <a href="../index.php" class="logo pull-left"><h2 style="padding-top: 30px;padding-left: 30px;color: blue"><i class="fa fa-home"></i></h2></a>
  <section class="body-sign">
    <div class="center-sign">
      <a href="sigin.php" class="logo pull-left">
        <strong style="font-size: 18px">One-Time Password</strong>
      </a>
      <hr />

      <div class="panel panel-sign">
        <div class="panel-title-sign mt-xl text-right">
          <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> OTP</h2>
        </div>
        <div class="panel-body">
          <form method="post">
            <div class="form-group mb-md">
              <label>OTP Code</label>
              <div class="input-group input-group-icon">
                 <input type="password" class="form-control input-md" placeholder="Enter Your OTP Code" required="true" name="otp">
                <span class="input-group-addon">
                  <span class="icon icon-md">
                    <i class="fa fa-lock"></i>
                  </span>
                </span>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4 text-left">
                <button type="submit" class="btn btn-primary hidden-xs" name="login">Sign In</button>
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
