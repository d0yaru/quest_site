<?
	require_once('./engine/core/connect.php');
	
	$sql = "SELECT * FROM `servers` WHERE `status` != '0'";
	$result = $mysqli->query($sql);
	$serveronline = $result->num_rows;
	
	if($result->num_rows != 0) 
	{	
		while($servers = $result->fetch_assoc())
		{
			$cont .= '<span>//</span> <a href="/rating/oldest-players/'.strtolower($servers['server_name']).'" class="">'.$servers['server_name'].'</a>';
		}
		$result->close();
	}
?>