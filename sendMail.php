<?php

$fname=$_POST["fname"] ;
$lname=$_POST["lname"];
$company=$_POST["company"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$pageName=$_POST["pageName"];


require 'class.phpmailer.php';
require 'class.smtp.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = '	smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'testingflat11@gmail.com';                 // SMTP username
$mail->Password = 'testing!@#';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom($email, $fname);
$mail->addAddress('rm@shotgunflat.com', 'shotgunflat');
$mail->addReplyTo('rm@shotgunflat.com', 'shotgunflat');

/*$mail->addAddress('emanuel@cybertrontechnologies.com', 'shotgunflat');
$mail->addReplyTo('emanuel@cybertrontechnologies.com', 'shotgunflat');*/

$mail->isHTML(true);                                  // Set email format to HTML
$mailBody = '<html><body><table width="100%">';

$mailBody .='<tr>';
$mailBody .='<td style="padding:10px">First Name</td>';
$mailBody .='<td style="padding:10px">'. $fname.'</td>';
$mailBody .='</tr>';

$mailBody .='<tr>';
$mailBody .='<td style="padding:10px">Last Name</td>';
$mailBody .='<td style="padding:10px">'. $lname.'</td>';
$mailBody .='</tr>';
if($company != null){
	$mailBody .='<tr>';
	$mailBody .='<td style="padding:10px">Company</td>';
	$mailBody .='<td style="padding:10px">'. $company.'</td>';
	$mailBody .='</tr>';
}

$mailBody .='<tr>';
$mailBody .='<td style="padding:10px">Phone</td>';
$mailBody .='<td style="padding:10px">'. $phone.'</td>';
$mailBody .='</tr>';

$mailBody .='<tr>';
$mailBody .='<td style="padding:10px">Email</td>';
$mailBody .='<td style="padding:10px">'. $email.'</td>';
$mailBody .='</tr>';
$mailBody .='</table></body></html>';
$mail->Subject = $pageName.'-Banking: Lowell 5 Contact form';
$mail->Body    = $mailBody;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo 'Message has been sent';
}

   	/*$headers = "From: ".$fname."<".$email."> \r\n".
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

	$to="emanuel@cybertrontechnologies.com";
	$subject = "Lowell 5 Contact form";

	$mailBody = '<html><body><table width="100%">';
	
	$mailBody .='<tr>';
	$mailBody .='<td style="padding:10px">First Name</td>';
	$mailBody .='<td style="padding:10px">'. $fname.'</td>';
	$mailBody .='</tr>';

	$mailBody .='<tr>';
	$mailBody .='<td style="padding:10px">Last Name</td>';
	$mailBody .='<td style="padding:10px">'. $lname.'</td>';
	$mailBody .='</tr>';
	if($company != null){
		$mailBody .='<tr>';
		$mailBody .='<td style="padding:10px">Company</td>';
		$mailBody .='<td style="padding:10px">'. $company.'</td>';
		$mailBody .='</tr>';
	}

	$mailBody .='<tr>';
	$mailBody .='<td style="padding:10px">Phone</td>';
	$mailBody .='<td style="padding:10px">'. $phone.'</td>';
	$mailBody .='</tr>';

	$mailBody .='<tr>';
	$mailBody .='<td style="padding:10px">Email</td>';
	$mailBody .='<td style="padding:10px">'. $email.'</td>';
	$mailBody .='</tr>';
	$mailBody .='</table></body></html>';

   	if(mail($to,$subject,$mailBody,$headers)){
   		echo true;
   	}
   	else {
   		echo false;
   	}
?>