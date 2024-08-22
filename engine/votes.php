<?
	session_start();
	require_once('core/connect.php');
	
	$mysqli->set_charset("utf8");
	$sql = "SELECT * FROM rating";
	$result = $mysqli->query($sql);
	$allvotes = $result->num_rows;
	if($result->num_rows != 0) 
	{
		while($stars_site = $result->fetch_assoc())
		{
			$points = $stars_site['rating'] + 0;
			$allpoints += $points;
		}
		if ($allvotes == 0) $rating_site = 0;
		else $rating_site = round($allpoints/$allvotes, 2);
	}
	
	$mysqli->set_charset("utf8");
	$sql = "SELECT * FROM rating WHERE player_id = '{$_SESSION['account_id']}'";
	$result = $mysqli->query($sql);
	if($result->num_rows != 0) $rate_class = '';
	else $rate_class = 'rate';
	
	$sql = "SELECT * FROM `servers` WHERE `id` = '{$_SESSION['server']}'";
	$result = $mysqli->query($sql);
	if($result->num_rows != 0) 
	{
		$servers = $result->fetch_assoc();
		$server = $servers['server_name'];
	}
	
	
	if(!empty($_POST['votes']))
	{
		if($_SESSION['account_logged'] == 'try')
		{
			$sql = "SELECT * FROM rating WHERE player_id = '{$_SESSION['account_id']}' AND `server` = '{$server}'";
			$result = $mysqli->query($sql);
			if($result->num_rows != 0) $sql = "UPDATE `rating` SET `rating` = '{$_POST['votes']}' WHERE player_id = '{$_SESSION['account_id']}'";
			else $sql = "INSERT INTO `rating`(`player_id`,`server`,`rating`) VALUES ('{$_SESSION['account_id']}','{$server}','{$_POST['votes']}')";
			$result = $mysqli->query($sql);
		}
		else return false;
	}
?>