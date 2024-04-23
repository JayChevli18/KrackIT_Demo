
<?php	
		use PHPMailer\PHPMailer\PHPMailer; 
		use PHPMailer\PHPMailer\Exception;   
		require 'vendor/autoload.php';

function sendOTP($email,$otp) {
		$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
		$mail = new PHPMailer;
$toemail=$_POST['usnm'];	
$mail->isSMTP();                            
$mail->Host = 'smtp.gmail.com';             
$mail->SMTPAuth = true;                     
$mail->Username = 'jconeseven@gmail.com';   
$mail->Password = 'vzzkwyybxaavlyuc'; 
$mail->SMTPSecure = 'tls';            
$mail->Port = 587;                    
$mail->setFrom('jconeseven@gmail.com', 'jc oneseven');
$mail->addReplyTo('jconeseven@gmail.com', 'jc oneseven');
$mail->addAddress($toemail);
$mail->isHTML(true);
$mail->Body = "Welcome to Krackit!<br>Your OTP: ".$otp;
$res=$mail->send();
return $res;
}

?>