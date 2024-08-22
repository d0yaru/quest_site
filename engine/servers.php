<?
	function isMobile() { 
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
	require_once('core/connect.php');
	require_once('sampquery.php');
	
	$mysqli->set_charset("utf8");
	$sql = "SELECT * FROM `servers` WHERE `status` != '0'";
	$result = $mysqli->query($sql);

	if($result->num_rows != 0) 
	{
		while($servers = $result->fetch_assoc())
		{	
			sscanf($servers['server_ip'], "%s:%d", $ip, $port);
			$query = new SampQueryAPI($ip, $port); 
			$serverInfo = $query->getInfo(); 
				
			$online = $serverInfo['players'] + 0;
			$allonline += $online;
		}
		if($url[0] === 'servers')
		{
			$sql = "SELECT * FROM `servers` WHERE `status` != '0'";
			$result = $mysqli->query($sql);
			
			while($servers = $result->fetch_assoc())
			{	
				sscanf($servers['server_ip'], "%s:%d", $ip, $port);
				$query = new SampQueryAPI($ip, $port); 
				$serverInfo = $query->getInfo(); 
				
				$serversonline .= '<div class="mon-server server-'.$servers['id'].' '.$flag.'">
					<div class="mon-server__title">
						<div class="mon-server__project">'.$projectname.' Roleplay</div>
							<div class="mon-server__name">'.$servers['server_name'].'</div>
						</div>
						<div class="mon-server__online"><div class="mon-server__players">'.$serverInfo['players'].'</div>
							<div class="mon-server__maxplayers">из '.$serverInfo['maxplayers'].'</div>
						</div>
					<div class="mon-server__ip">'.$servers['server_ip'].'</div>
				<div class="mon-server__buttons">
					<a href="'.$servers['group_vk_url'].'" target="_blank" class="mon-server__button has-tooltip" title="Сообщество '.$servers['server_name'].' Вконтакте">
					<img src="/public/img/group_vk.png" alt="" class="mon-server__button-image"></a>
					
					<a href="map/'.strtolower($servers['server_name']).'" class="mon-server__button has-tooltip" title="Карта Штата '.$servers['server_name'].'">
					<img src="/public/img/map.png" alt="" class="mon-server__button-image"></a>
					
					<a href="rating/oldest-players/'.strtolower($servers['server_name']).'" class="mon-server__button has-tooltip" title="Самые старые игроки '.$servers['server_name'].'">
					<img src="/public/img/star.png" alt="" class="mon-server__button-image"></a>
					
					<a href="fractions/'.strtolower($servers['server_name']).'" class="mon-server__button has-tooltip" title="null">
					<img src="/public/img/fraction.png" alt="" class="mon-server__button-image"></a>
				</div>
				</div>';
			}
			$result->close();
		} 
		else 
		{
			if(isMobile()) $sql = "SELECT * FROM `servers` WHERE `status` != '0' ORDER BY id DESC LIMIT 1";
			else $sql = "SELECT * FROM `servers` WHERE `status` != '0' ORDER BY id DESC LIMIT 3";
			$result = $mysqli->query($sql);
			
			while($servers = $result->fetch_assoc())
			{	
				sscanf($servers['server_ip'], "%s:%d", $ip, $port);
				$query = new SampQueryAPI($ip, $port); 
				$serverInfo = $query->getInfo(); 
				
				$serversonline .= '<div class="mon-server server-'.$servers['id'].' '.$flag.'">
					<div class="mon-server__title">
						<div class="mon-server__project">'.$projectname.' Roleplay</div>
							<div class="mon-server__name">'.$servers['server_name'].'</div>
						</div>
						<div class="mon-server__online"><div class="mon-server__players">'.$serverInfo['players'].'</div>
							<div class="mon-server__maxplayers">из '.$serverInfo['maxplayers'].'</div>
						</div>
					<div class="mon-server__ip">'.$servers['server_ip'].'</div>
				<div class="mon-server__buttons">
					<a href="'.$servers['group_vk_url'].'" target="_blank" class="mon-server__button has-tooltip" title="Сообщество '.$servers['server_name'].' Вконтакте">
					<img src="/public/img/group_vk.png" alt="" class="mon-server__button-image"></a>
					
					<a href="map/'.strtolower($servers['server_name']).'" class="mon-server__button has-tooltip" title="Карта Штата '.$servers['server_name'].'">
					<img src="/public/img/map.png" alt="" class="mon-server__button-image"></a>
					
					<a href="rating/oldest-players/'.strtolower($servers['server_name']).'" class="mon-server__button has-tooltip" title="Самые старые игроки '.$servers['server_name'].'">
					<img src="/public/img/star.png" alt="" class="mon-server__button-image"></a>
					
					<a href="fractions/'.strtolower($servers['server_name']).'" class="mon-server__button has-tooltip" title="Состав организаций '.$servers['server_name'].'">
					<img src="/public/img/fraction.png" alt="" class="mon-server__button-image"></a>
				</div>
				</div>';
			}
			$result->close();
		}
	}
	else return false; $mysqli->close();
?>