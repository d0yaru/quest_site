<?
	session_start();
	require_once('core/connect.php');
	$mysqli->set_charset("utf8");
	
	$sql = "SELECT * FROM `servers` WHERE `id` = '{$_SESSION['server']}' LIMIT 1";
	$result = $mysqli->query($sql);
	$server = $result->fetch_assoc();	
	$nameserver = $server['server_name'];
	
	$sql = "SELECT * FROM `commends` WHERE `name` = '{$_SESSION['account_name']}' AND `server` = '{$nameserver}' ORDER BY id DESC LIMIT 1";
	$result = $mysqli->query($sql);
	$comm = $result->fetch_assoc();
	$time = $comm['date'];
	$diff = strtotime ($time)-strtotime (date("Y-m-d H:i:s"));
	//echo json_encode(array('status' => 'error', 'diff' => $diff));
	if(($diff+600) < 0) echo json_encode(array('status' => 'success'));
	else echo json_encode(array('status' => 'error'));
?>	