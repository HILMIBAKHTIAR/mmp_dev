<?php
	// require './PHPMailer-master/PHPMailerAutoload.php';
	// var_dump('BEFORE IMPORT PHPMAILER');
	// die;

	require_once('../../PHPMailer-master/PHPMailerAutoload.php');
	$mail = new PHPMailer;

	$mail->SMTPDebug = 1;                               // Enable verbose debug output

	include '../setting_email.php';
	
	$pieces_recipient = (explode("|",$email['recipients']));

	for($i_recipient = 0; $i_recipient < count($pieces_recipient); $i_recipient++){
		$mail->addAddress($pieces_recipient[$i_recipient]);
	}

  $mail->IsHTML(true);

	$mail->Subject = $email['title'];
	$mail->Body    = $email['message'];

	if(isset($email['attachments'])){
		$pieces_attachment = (explode("|",$email['attachments']));
		for($i_attachment = 0; $i_attachment < count($pieces_attachment); $i_attachment++){
			$mail->addAttachment($pieces_attachment[$i_attachment]);
		}
	}
	
	// $mail->AltBody = $message;
	
	
	if(!$mail->send()) {
	    // echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
		$result_email_sent=0;	  
	} else {
	  // echo 'Message has been sent';
	  $result_email_sent=1;
	}
