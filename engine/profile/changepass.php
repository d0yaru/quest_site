<?
	$oldpass = stripslashes(htmlspecialchars(trim($_POST['oldpass'])));
	$newpass = stripslashes(htmlspecialchars(trim($_POST['newpass'])));
	$confirmpass = stripslashes(htmlspecialchars(trim($_POST['confirmpass'])));
	
	if($oldpass == '') { echo json_encode(array('status' => 'error', 'type' => 'invalidoldpass')); return false; }
	else if($newpass == '') { echo json_encode(array('status' => 'error', 'type' => 'invalidnewpass')); return false; }
	else if( $newpass != $confirmpass) { echo json_encode(array('status' => 'error', 'type' => 'invalid')); return false; }
	else if( strlen($newpass) < 8) { echo json_encode(array('status' => 'error', 'type' => 'invalidpassvalue')); return false; }
	else if( $oldpass == $newpass) { echo json_encode(array('status' => 'error', 'type' => 'nochange')); return false; }
	else 
	{
		session_start();
		require_once('../../engine/core/connect.php');

		$mysqli->set_charset("utf8");
		$sql = "SELECT * FROM `servers` WHERE id = '{$_SESSION['server']}'";
		$result = $mysqli->query($sql);
		
		if($result->num_rows != 0) 
		{
			$servers = $result->fetch_assoc();
			$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);

			$name = $_SESSION['account_name'];
			$mysqli->set_charset("utf8");
			$sql = "SELECT * FROM `Qelksekm` WHERE NickName = '{$name}'";
			$result = $mysqli->query($sql);

			if($result->num_rows != 0)
			{
				$account = $result->fetch_assoc();
				$dbpassword = $account['Password'];
				if($oldpass == $dbpassword)
				{
					$sql = "UPDATE `Qelksekm` SET `Password` = '{$newpass}' WHERE `NickName` = '{$name}'";
					$mysqli->query($sql);
					echo json_encode(array('status' => 'success', 'url' => '/profile'));
				} else { echo json_encode(array('status' => 'error', 'type' => 'invalidoldpasserror')); return false; }
			}
			$result->close();
		} else { echo json_encode(array('status' => 'error', 'type' => 'errorserver')); return false; }
	}
	$mysqli->close();
?>