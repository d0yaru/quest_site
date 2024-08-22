<?
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'phpmailer/Exception.php';
	require 'phpmailer/PHPMailer.php';
	require 'phpmailer/SMTP.php';

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = $config['smtp_debug'];	
	$mail->Host = $config['smtp'];
	$mail->SMTPAuth = true;
	$mail->Username = $config['smtp_username'];
	$mail->Password = $config['smtp_password'];
	$mail->SMTPSecure = $config['smtp_secure'];
	//$mail->SMTPAutoTLS = false;
	$mail->Port = $config['smtp_port'];
	
	/* $mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	); */
	
	$mail->CharSet = 'UTF-8';
	$mail->From = $config['email_name'];
	$mail->FromName = ''.$config['nameproject'].' Support';
?>