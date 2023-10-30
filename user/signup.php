<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];

    $password=md5($_POST['password']);
    $ret="select Email from tbluser where Email=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('You have signup  Scuccessfully');</script>";
echo "<script>window.location.href ='signin.php'</script>";
} else{
echo "<script>alert('Something went wrong.Please try again');</script>";
echo "<script>window.location.href ='signup.php'</script>";
}} else {
echo "<script>alert('Email-id already exist. Please try again');</script>";
}}


?>
<!doctype html>
<html class="fixed">
	<head>
<title>Sign Up | Crime Record Management System</title>

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">
		<script src="../assets/vendor/modernizr/modernizr.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script type="text/javascript">
			// For Email availabilty
function checkAvailability() {
$("#loaderIcon").css('display','block');
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").css('display','none');
},
error:function (){}
});
}
		</script>

	</head>
	<body>
<a href="../index.php" class="logo pull-left"><h2 style="padding-top: 30px;padding-left: 30px;color: blue"><i class="fa fa-home"></i></h2></a>
		<section class="body-sign">
			<div class="center-sign">
				<a href="signup.php" class="logo pull-left">
					<strong style="font-size: 18px">Crime Information Management System</strong>
				</a>
<hr />
				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group mb-md">
								<label>Full Name</label>
								<input id="fname" type="text" class="form-control input-md" placeholder="Full Name" name="fname" required="true">
							</div>

							<div class="form-group mb-md">
								<label>E-mail Address</label>
								<input id="email" type="email" class="form-control input-md" placeholder="Email" name="email" required="true" onBlur="return checkAvailability()">
								  <span id="user-availability-status"></span>
							</div>

	<div class="form-group mb-md">
								<label>Mobile Number</label>
						<input id="mobno" type="text" class="form-control input-md" placeholder="Mobile" name="mobno" maxlength="12" pattern="[0-9]+" required="true">
							</div>

              <style>
                  .feedback {
                      margin-top: 5px;
                      font-size: 12px;
                      color: red;
                  }

                  .valid {
                      color: green;
                  }
              </style>

	<div class="form-group mb-md">
								<label>Password</label>
					<input id="password" type="password" class="form-control input-md" placeholder="Password" name="password" required="true">
							</div>
              <div id="passwordFeedback" class="feedback"></div>
              <ul id="passwordCriteria" class="feedback"></ul>

              <script>
                  $(document).ready(function() {
                      $('#password').on('input', function() {
                          var password = $(this).val();
                          var regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{10,15}$/;

                          var hasUpperCase = /[A-Z]/.test(password);
                          var hasDigit = /\d/.test(password);
                          var hasSpecialChar = /[!@#$%^&*()\-_=+{};:,<.>]/.test(password);
                          var isLengthValid = (password.length >= 10 && password.length <= 15);

                          var criteriaList = $('#passwordCriteria');
                          criteriaList.empty();

                          if (!isLengthValid) {
                              criteriaList.append('<li>✘ Password must be between 10 and 15 characters.</li>');
                          } else {
                              criteriaList.append('<li class="valid">✔ Password must be between 10 and 15 characters.</li>');
                          }

                          if (!hasUpperCase) {
                              criteriaList.append('<li>✘ Password must contain at least one uppercase letter.</li>');
                          } else {
                              criteriaList.append('<li class="valid">✔ Password must contain at least one uppercase letter.</li>');
                          }

                          if (!hasDigit) {
                              criteriaList.append('<li>✘ Password must contain at least one digit.</li>');
                          } else {
                              criteriaList.append('<li class="valid">✔ Password must contain at least one digit.</li>');
                          }

                          if (!hasSpecialChar) {
                              criteriaList.append('<li>✘ Password must contain at least one special character.</li>');
                          } else {
                              criteriaList.append('<li class="valid">✔ Password must contain at least one special character.</li>');
                          }

                          if (!regex.test(password)) {
                              $('#passwordFeedback').text('Please make sure it meets the requirements');
                          } else {
                              $('#passwordFeedback').text('');
                          }
                      });
                  });
              </script>




							<div class="row">

								<div class="col-sm-4 text-left">
									<br><button type="submit" class="btn btn-primary hidden-xs" id="submit" name="submit">Sign Up</button>

								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>


							<p class="text-center">Already have an account? <a href="signin.php">Sign In!</a>

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

	</body>
</html>
