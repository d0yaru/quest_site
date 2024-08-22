<?
	if($_GET['token'] == $_SESSION['acode'] && !empty($_SESSION['acode']))
    {
        require_once('/engine/core/connect.php');
		require_once('/engine/smtp_mailer.php');
		$mysqli->set_charset("utf8");
		$sql = "SELECT * FROM `servers` WHERE id = '{$_SESSION['server_recovery']}'";
		$result = $mysqli->query($sql);

		if($result->num_rows != 0) 
		{
			$servers = $result->fetch_assoc();
			$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);
			
			$mysqli->set_charset("utf8");
			$sql = "SELECT * FROM `Qelksekm` WHERE `Mail` = '{$_SESSION['email']}'";
			$result = $mysqli->query($sql);
			
			if($result->num_rows == 1)
			{
				$sql = "UPDATE `Qelksekm` SET `Password` = '{$_SESSION['newpass']}' WHERE `Mail` = '{$_SESSION['email']}'";
				$mysqli->query($sql);
				
				if($config['smtp_enable'] == 1)
				{
					$mail->isHTML(true);
					$mail->addAddress($_SESSION['email']);
					$mail->Subject = 'Восстановление доступа к игровому аккаунту';
					$mail->Body = 'Ваш новый пароль: '.$_SESSION['newpass'].'';
					$mail->send();
					//$mail->ErrorInfo;
				}
				else
				{
					$from = $config['email_name'];
					$topic = "Восстановление доступа к игровому аккаунту";
					$message = 'Ваш новый пароль: '.$_SESSION['newpass'].'';
					$headers = "From: ".$from."\r\nReply-To: ".$from."\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=utf-8;";
					$mbody .= $message."\r\n\r\n";
					mail($_SESSION['email'], $topic, $mbody, $headers);
				}
			}
			$result->close();
			$mysqli->close();
			session_unset();
		}
    }
?>