<?php
include "config.php";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['submit']) && $_POST['txt1']){
    $email = $_POST['txt1'];
    $q = mysqli_query($con, 
      "select * from signup_table where u_email='{$email}'" ) 
      or die(mysqli_error($con));
    $result = mysqli_fetch_array($q);    
    if($result){

        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz#$%@"), 0, 8);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'yourstore1010@gmail.com';                     //SMTP username
        $mail->Password   = 'yourstore@thriwin';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('yourstore1010@gmail.com', 'ys');
        $mail->addAddress($email, 'yash');     //Add a recipient
        

            //Add attachments
    
        $pass2=md5($pass);
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = "Hey user... <br>This is the mail regarding your request of generating new password.
		<br>Your new password is :<b> $pass </b>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $q1 = mysqli_query($con, 
        "update signup_table set u_password='{$pass2}' where u_email='{$email}'" ) 
        or die(mysqli_error($con));

        $mail->send();
        echo "<script>alert('password is changed')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }header("location:signin1.php");
}
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V9</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login_images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_css/util.css">
	<link rel="stylesheet" type="text/css" href="login_css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="" method="POST">
				<span class="login100-form-title p-b-37">
					Forgot Password
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="email" name="txt1" placeholder="E-Mail Address">
					<span class="focus-input100"></span>
				</div>
				<br/>
                <div class="container-login100-form-btn">
					<button class="login100-form-btn" name="submit">
						Send
					</button>
				</div>
				<!--
				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div>

				<div class="flex-c p-b-112">
					<a href="#" class="login100-social-item">
						<i class="fa fa-facebook-f"></i>
					</a>

					<a href="#" class="login100-social-item">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
					</a>
				</div>
			--><br/><br/>
				<div class="text-left">
					<a href="signin1.php" class="txt2 hov1">
						Sign in now
					</a>
				</div> 
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>