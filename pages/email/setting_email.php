<?php

// $mail->isSMTP(); 
// $mail->SMTPDebug  = 1;  
// $mail->SMTPAuth   = TRUE;
// $mail->SMTPSecure = "tls";
// $mail->Port       = 587;
// $mail->Host       = "smtp.gmail.com";
// $mail->Username   = "inspiraworld.info@gmail.com";
// $mail->Password   = "emailadm_99";


// wmpegguqqnenyuzh

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->SMTPAuth = true;
//to view proper logging details for success and error messages
// $mail->SMTPDebug = 1;
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->Username = 'widimicko22@gmail.com';   //email
$mail->Password = 'wmpegguqqnenyuzh';   //16 character obtained from app password created
$mail->Port = 465;                    //SMTP port
$mail->SMTPSecure = "ssl";


$mail->setFrom("widimicko22@gmail.com", "INSPIRA");

	// $mail->isSMTP();                                      // Set mailer to use SMTP
	// $mail->Host = 'mail.inafood.com';  		  // Specify main and backup SMTP servers
	// $mail->SMTPAuth = true;                               // Enable SMTP authentication
	// $mail->Username = 'notification@inafood.com';       // SMTP username
	// $mail->Password = 'inafoodsmaju';                       // SMTP password
	// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	// $mail->Port = 587;                                    // TCP port to connect to
	// $mail->setFrom('notification@inafood.com', 'INAFOOD HRMS');
