<?php

require 'PHPMailer/class.phpmailer.php';

date_default_timezone_set('Asia/Kolkata');

error_reporting(0);



$name = $_POST['name'];

$email = $_POST['email'];

$contact_number = $_POST['telephone'];



$hive_url = 'https://www.lead-hive.com/aura/enquiry/sendenquiry';



$fromemail = 'noreply@ranawatgroup.in';

$frompassword = 'kShire@202Q2';

$name_from = "Aura Water Enquiry";



$jsonPostData = array(

		"name"=>$name,

		"email"=>$email,

		"phone_number"=>$contact_number,

		"source"=>"Google",

		"media"=>"Search",

		"campaign"=>"Aura LP"

	);



	$ch = curl_init();

	

	$curlConfig = array(

		CURLOPT_URL            => $hive_url,

		CURLOPT_POST           => true,

		CURLOPT_RETURNTRANSFER => true,

		CURLOPT_POSTFIELDS     => $jsonPostData

	);

	curl_setopt_array($ch, $curlConfig);

	$result = curl_exec($ch);
    
	curl_close($ch);



	try{

		$mail = new PHPMailer(true);

		$mail->SMTPDebug = 0;

		$mail->IsSMTP(); // telling the class to use SMTP

		$mail->SMTPAuth = true; // enable SMTP authentication

		$mail->SMTPSecure = "ssl"; // sets the prefix to the servier

		$mail->Host = "ssl://smtp.gmail.com"; // sets GMAIL as the SMTP server

		$mail->Port = 465; // set the SMTP port for the GMAIL server

		//$mail->isSMTP();

		//$mail->SMTPSecure = 'ssl';

		$mail->isHTML(true);

		$mail->Username = $fromemail; // GMAIL username

		$mail->Password = $frompassword; // GMAIL password

		$mail->CharSet = 'UTF-8';

		$email_from = $fromemail;

		$mail->SetFrom($email_from, $name_from);

		//$mail->addAddress('sales@theuniquespaces.com');

		$mail->addBcc('techsupport@squareone.co.in');

		$mail->Subject = 'Aura Water enquiry of '.$name;

		$file_contents = 'Aura Water Enquiry From : <br/> Name : '.$name.' <br/> Email:'.$email.'<br/> Phone Number:'.$contact_number.' <br/><br/> Thanks & Regards';

		

		$mail->Body = $file_contents;

		

 		$myfile = file_put_contents('leads.txt', $file_contents.PHP_EOL , FILE_APPEND | LOCK_EX);

		

		$mail->Send();



		header("Location:thank-you.html");

	

	}catch (phpmailerException $e) {

	 // echo $e->errorMessage(); //Pretty error messages from PHPMailer

	  header("Location:thank-you.html");

	}catch (Exception $e) {

	 // echo $e->getMessage(); //Boring error messages from anything else!

	  header("Location:thank-you.html");

	}

?>