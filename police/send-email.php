<?php
use PHP<ailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

if(isset($_POST['submit'])){
	$OPTcode = $_POST['name'];

	try{
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'yourmail@gmail.com'; //Need to enter Username
		$mail->Password = '[Password]'; //Need to enter the Password
		$mail->SMTPSecure = "tls";
		$mail->Port = '587';

		$mail->setFrom('yourmail@gmail.com'); //Need to enter Username
		$mail->addAddress('Gmail Address'); //Need to read the file from the DB and config data

		$mail->isHTML(true)
		$mail->Subject = 'Your One-Time Password is:'. $OTPcode;
		$mail->Body = "Please enter the follwoing as your One-Time Password to login to the system. <br>One-Time Password: $OTPCode";

	}
}




















