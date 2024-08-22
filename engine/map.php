<?	
    require_once('./engine/core/connect.php');
	$server = ucfirst($url[1]);
	$mysqli->set_charset("utf8");
	$sql = "SELECT * FROM `servers` WHERE `server_name` = '{$server}'";
	$result = $mysqli->query($sql);
	
	if($result->num_rows != 0) 
	{
		$servers = $result->fetch_assoc();
		$namemap = $servers['server_name'];
		$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);
		if (mysqli_connect_errno()) { header("Location: /error"); $mysqli->close(); }

		$mysqli->set_charset("utf8");
		$sql = "SELECT * FROM Businesses";
		$result = $mysqli->query($sql);
		$rows = $result->num_rows;	
		
		if($rows != 0)
		{
			for ($i = 0;$i < $rows;$i ++)
			{
				$result->data_seek($i);
				$map = $result->fetch_assoc();
				
				$idbiz = $map['ID']-1;
				$name = $map['Name'];
				$x = $map['Enter_X'];
				$y = $map['Enter_Y'];
				$owner = $map['Owner'];
				$cost = $map['Cost'];
				$state = $map['State'];
				
				if($x > 0) $left = (3500 + abs($x))/5.3;
				else $left = (3300 - abs($x))/5.3;
				if($y > 0) $top = (3180 - abs($y))/5.3;
				else $top = (3100 + abs($y))/5.3;
				
				if($state == 18) $content .= '<div class="map-icon" style="top:'.$top.'px; left:'.$left.'px;" data-original-title="'.$name.'" data-toggle="tooltip" data-html="true"><img src="/public/img/map/casino.png"></div>';
				else if($owner == 'The State') $content .= '<div class="map-icon" style="top:'.$top.'px; left:'.$left.'px" data-original-title="'.$name.'" data-toggle="tooltip" data-html="true"><img src="/public/img/map/business_1.png"></div>';
				else $content .= '<div class="map-icon" style="top:'.$top.'px; left:'.$left.'px" data-original-title="'.$name.'" data-toggle="tooltip" data-html="true"><img src="/public/img/map/business_0.png"></div>';
			};
		}
		$result->close();
		
		$sql = "SELECT * FROM Houses";
		$result = $mysqli->query($sql);
		$rows = $result->num_rows;

		if($rows != 0)
		{	
			for ($i = 0;$i < $rows;$i ++)
			{
				$result->data_seek($i);
				$map = $result->fetch_assoc();
				
				$id = $map['ID'];
				$x = $map['Enter_X'];
				$y = $map['Enter_Y'];
				$owner = $map['Owner'];
				$cost = $map['Cost'];
				
				if($x > 0) $left = (3250 + abs($x))/5.1;
				else $left = (3000 - abs($x))/4.9;
				if($y > 0) $top = (2970 - abs($y))/4.8;
				else $top = (3170 + abs($y))/5.1;
				
				if($owner == 'The State') $content .= '<div class="map-icon" style="top:'.$top.'px; left:'.$left.'px;" data-original-title="№ '.$id.'" data-toggle="tooltip" data-html="true"><img src="/public/img/map/house_1.png"></div>';
				else $content .= '<div class="map-icon" style="top:'.$top.'px; left:'.$left.'px;" data-original-title="№ '.$id.'" data-toggle="tooltip" data-html="true"><img src="/public/img/map/house_0.png"></div>';
			};
		}
		$result->close();
		$mysqli->close();
	} else header("Location: /error");
?>
