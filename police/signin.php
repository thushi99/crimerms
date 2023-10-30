<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$maxAttempts = 5; // Maximum number of login attempts
$lockoutTime = 300; // Lockout time in seconds (5 minutes)
$extendedLockoutTime = 3600; // Extended lockout time in seconds (1 hour)


/* login sessio time checking code */
if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= $maxAttempts) {
    // User is locked out, check lockout time
    $lockoutEndTime = $_SESSION['lockout_time'] + $lockoutTime;   
    if (time() < $lockoutEndTime) {
        $remainingTime = $lockoutEndTime - time();
        echo "<script>alert('You are locked out. Please try again after $remainingTime seconds.');</script>";
        exit();
    } else {
        // Lockout time has expired, reset login attempts
        unset($_SESSION['login_attempts']);
        unset($_SESSION['lockout_time']);
    }
}
/* login sessio time checking code */



if (isset($_POST['login'])) {
    $pid = $_POST['pid'];
   // $password = md5($_POST['password']);
   $password = $_POST['password'];
    $sql = "SELECT ID, PID, PoliceStationId ,Email FROM tblpolice WHERE PID = :pid AND Password = :password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['crmspid'] = $result->ID;
            $_SESSION['crmsipid'] = $result->PID;
            $_SESSION['psid'] = $result->PoliceStationId;
			$_SESSION['email'] = $result->Email;
        }
        $_SESSION['login'] = $_POST['pid'];
        unset($_SESSION['login_attempts']); // Reset login attempts
        echo "<script type='text/javascript'> document.location ='otp02.php'; </script>";
    } else {
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 1;
        } else {
            $_SESSION['login_attempts']++;
        }
        if ($_SESSION['login_attempts'] >= $maxAttempts) {
            // Reached maximum login attempts
            $_SESSION['lockout_time'] = time(); // Set lockout time
            echo "<script>alert('Invalid Details. You are locked out for $lockoutTime seconds.');</script>";
            exit();
        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    }
}
?>
<!doctype html>
<html class="fixed">
	<head>
<title>Signin | Crime Record Management System</title>
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datsepicker/css/datepicker3.css" />
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
					<strong style="font-size: 18px">Crime Information Management System</strong>
				</a>
				<hr />

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form method="post" action="">
							<div class="form-group mb-md">
								<label>Police ID</label>
								<div class="input-group input-group-icon">
									 <input type="text" class="form-control input-md" placeholder="Enter Your ID" required="true" name="pid">
									<span class="input-group-addon">
										<span class="icon icon-md">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-md">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="forgot-password.php" class="pull-right">Lost Password?</a>
								</div>
								<div class="input-group input-group-icon">
									<input type="password" class="form-control input-md" name="password" required="true" value="" placeholder="Enter Password"/>
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
