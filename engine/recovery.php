<?
	session_start();
	require_once('../engine/core/connect.php');
	require_once('../engine/smtp_mailer.php');
	
	$chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
	$lenght = 20;
	$acode = null;
	for($i = 0; $i<$lenght; $i++) $acode.=$chars[rand(0,strlen($chars)-1)];
	
	if($_POST['codebank'] == 'recovery' && isset($_POST['email']) && isset($_POST['server']))
	{
		$email = stripslashes(htmlspecialchars(trim($_POST['email'])));
		$server = stripslashes(htmlspecialchars(trim($_POST['server'])));
		if( $_SESSION['account_logged'] == 'try' ) 
		{
			if($email === 'No Mail Adress') echo json_encode(array('status' => 'error'));
			else
			{
				$mysqli->set_charset("utf8");
				$sql = "SELECT * FROM `servers` WHERE id = '{$server}'";
				$result = $mysqli->query($sql);
				if($result->num_rows != 0) 
				{
					$servers = $result->fetch_assoc();
					$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);

					$mysqli->set_charset("utf8");
					$sql = "SELECT * FROM `Qelksekm` WHERE `Mail` = '{$email}'";
					$result = $mysqli->query($sql);
					
					if($result->num_rows != 0)
					{
						$_SESSION['email'] = $email;
						$_SESSION['server_recovery'] = $server;
						$_SESSION['acode'] = $acode;
						
						if($config['smtp_enable'] == 1)
						{
							$mail->isHTML(true);  
							$mail->addAddress($email);	
							$mail->Subject = 'Сброс пин кода банка';
							$mail->Body = 'Ссылка:  <a href="'.$config['url_site'].'/profile?token='.$acode.'">Подтвердить</a>';
							$mail->send();
							//$mail->ErrorInfo;
							//echo json_encode(array('status' => 'success', 'type' => $mail->ErrorInfo));
							echo json_encode(array('status' => 'success'));
						}
						else
						{
							$from = $config['email_name'];
							$topic = "Сброс пин кода банка";
							$message = 'Ссылка:  <a href="'.$config['url_site'].'/profile?token='.$acode.'">Подтвердить</a>';
							$headers = "From: ".$from."\r\nReply-To: ".$from."\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
							$headers .= "Content-Type: text/html; charset=utf-8;";
							$mbody .= $message."\r\n\r\n";
							mail($email, $topic, $mbody, $headers);
							echo json_encode(array('status' => 'success'));
						}
						
					} else echo json_encode(array('status' => 'error'));
					$result->close();
				}
			}
			$mysqli->close();
		} else return false;
	}
	else
	{
		$server = stripslashes(htmlspecialchars(trim($_POST['serverId2'])));
		$email = stripslashes(htmlspecialchars(trim($_POST['email'])));
		
		if($server == '0') { echo json_encode(array('status' => 'error', 'type' => 'invalidserver')); return false; }
		else if($email == '') { echo json_encode(array('status' => 'error', 'type' => 'invalidemail')); return false; }
		else
		{
			$mysqli->set_charset("utf8");
			$sql = "SELECT * FROM `servers` WHERE id = '{$server}'";
			$result = $mysqli->query($sql);
			if($result->num_rows != 0) 
			{
				$servers = $result->fetch_assoc();
				$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);

				$mysqli->set_charset("utf8");
				$sql = "SELECT * FROM `Qelksekm` WHERE `Mail` = '{$email}'";
				$result = $mysqli->query($sql);
				
				if($result->num_rows != 0)
				{
					$_SESSION['email'] = $email;
					$_SESSION['server_recovery'] = $server;

					$newpassword = mt_rand(999999, mt_getrandmax());
					
					$_SESSION['newpass'] = $newpassword;
					$_SESSION['acode'] = $acode;
					
					if($config['smtp_enable'] == 1)
					{
						$mail->isHTML(true);  
						$mail->addAddress($email);	
						$mail->Subject = 'Восстановление доступа к игровому аккаунту';
						$mail->Body = 'Ссылка:  <a href="'.$config['url_site'].'/recovery-password?token='.$acode.'">Подтвердить</a>';
						$mail->send();
						//$mail->ErrorInfo;
						echo json_encode(array('status' => 'success'));
					}
					else
					{
						$from = $config['email_name'];
						$topic = "Восстановление доступа к игровому аккаунту";
						$message = 'Ссылка:  <a href="'.$config['url_site'].'/recovery-password?token='.$acode.'">Подтвердить</a>';
						$headers = "From: ".$from."\r\nReply-To: ".$from."\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=utf-8;";
						$mbody .= $message."\r\n\r\n";
						mail($email, $topic, $mbody, $headers);
						echo json_encode(array('status' => 'success'));
					}
				} else { echo json_encode(array('status' => 'error', 'type' => 'noemail')); }
				$result->close();
			}
		}
		$mysqli->close();
	}
?>