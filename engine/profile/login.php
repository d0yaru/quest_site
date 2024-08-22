<?
	$server = stripslashes(htmlspecialchars(trim($_POST['serverId'])));
	$password = stripslashes(htmlspecialchars(trim($_POST['password'])));
	$name = stripslashes(htmlspecialchars(trim($_POST['username'])));
	
	if($server == '0') { echo json_encode(array('status' => 'error', 'type' => 'invalidserver')); return false; }
	else if($name == '') { echo json_encode(array('status' => 'error', 'type' => 'invalidusername')); return false; }
	else if($password == '') { echo json_encode(array('status' => 'error', 'type' => 'invalidpassword')); return false; }
	else 
	{
		require_once('../../engine/core/connect.php');
		$mysqli->set_charset("utf8");
		$sql = "SELECT * FROM `servers` WHERE id = '{$server}'";
		$result = $mysqli->query($sql);
		if($result->num_rows != 0) 
		{
			$servers = $result->fetch_assoc();
			$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);
			if (mysqli_connect_errno()) { echo json_encode(array('status' => 'error', 'type' => 'dbinvalidserver')); return false; }
				
			session_start();
			$mysqli->set_charset("utf-8");
			$sql = "SELECT * FROM `Qelksekm` WHERE `NickName` = '{$name}'";
			$result = $mysqli->query($sql);

			if($result->num_rows == 1)
			{	
				$result->data_seek(0);
				$account = $result->fetch_assoc();
				$dbpassword = $account['Password'];
				$id = $account['ID'];
				$skin = $account['Skin'];
				$admin = $account['Admin'];
				
				if($password == $dbpassword)
				{			
					$_SESSION['server'] = $server;
					$_SESSION['account_name'] = $name;
					$_SESSION['account_id'] = $id;
					$_SESSION['skin'] = $skin;
					$_SESSION['account_logged'] = 'try';
					echo json_encode(array('status' => 'success', 'url' => '/profile'));
				} else { echo json_encode(array('status' => 'error', 'type' => 'noaccount')); return false; }
			} else { echo json_encode(array('status' => 'error', 'type' => 'noaccount')); return false; }
			$result->close();
		} else { echo json_encode(array('status' => 'error', 'type' => 'invalidserver')); return false; }
	}		
	$mysqli->close();
?>