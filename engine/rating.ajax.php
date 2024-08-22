<?
	require_once('../engine/core/connect.php');
	
 	if($_POST['servers'] == 'list')
	{
		$sql = "SELECT * FROM `servers` WHERE `status` != '0'";
		$result = $mysqli->query($sql);
		$serveronline = $result->num_rows;
	
		if($result->num_rows != 0) 
		{
			while($servers = $result->fetch_assoc())
			{
				$cont .= '<span>//</span> <a href="/rating/'.$_POST['type'].'/'.strtolower($servers['server_name']).'" class="">'.$servers['server_name'].'</a>';
			}
			echo json_encode(array('status' => 'success','servers' => $cont));
			$result->close();
		}
	}
	
	$serverId = stripslashes(htmlspecialchars(trim($_POST['serverId'])));

	$sql = "SELECT * FROM `servers` WHERE `server_name` = '{$serverId}'";
	$result = $mysqli->query($sql);
	
	$servers = $result->fetch_assoc();
	//$name_server = $servers['server_name'];
	$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);
	$mysqli->set_charset("utf8");
	
	switch($_POST['type'])
	{
		case 'oldest-players':
		{
			$title = 'Самые старые игроки - '.$servers['server_name'].' - Рейтинги '.$projectname.' Roleplay';
			$content .='<thead><tr><td>№</td> <td>Игрок</td> <td>Уровень</td> <td>Статус</td></tr></thead><tbody>';
			
			$sql = "SELECT * FROM `Qelksekm` ORDER BY Level DESC LIMIT 0, 15";
			$result = $mysqli->query($sql);
			$rows = $result->num_rows;
			
			if($rows != 0)
			{
				for ($x = 0; $x < $rows; $x++)
				{	
					$idnum++;
					$account = $result->fetch_assoc();	
					if($account['Online_status'] == -1) $status = "Не в игре";
					else $status = "Сейчас играет";
					
					$content .= '<tr><td>'.$idnum.'</td> <td>'.$account['NickName'].'</td> <td>'.$account['Level'].'</td> <td>'.$status.'</td></tr>';
				};
				$result->close();
				$content .= '</tbody>';
			}
			echo json_encode(array('status' => 'success','content' => $content));
			break;
		}
		case 'richest-players':
		{
			$title = 'Самые богатые игроки - '.$servers['server_name'].' - Рейтинги '.$projectname.' Roleplay';
			$content .='<thead><tr><td>№</td> <td>Игрок</td> <td>Статус</td></tr></thead><tbody>';

			$sql = "SELECT * FROM `Qelksekm` ORDER BY Level DESC LIMIT 0, 15";
			$result = $mysqli->query($sql);
			$rows = $result->num_rows;
			if($rows != 0)
			{
				for ($x = 0; $x < $rows; $x++)	
				{	
					$idnum++;
					$account = $result->fetch_assoc();	
					if($account['Online_status'] == -1) $status = "Не в игре";
					else $status = "Сейчас играет";
					
					$content .= '<tr><td>'.$idnum.'</td> <td>'.$account['NickName'].'</td> <td>'.$status.'</td></tr>';
				};
				$result->close();
				$content .= '</tbody>';
			}
			echo json_encode(array('status' => 'success','content' => $content));
			break;
		}
		case 'most-expensive-houses':
		{
			$title = 'Самые дорогие дома - '.$servers['server_name'].' - Рейтинги '.$projectname.' Roleplay';
			$content .='<thead><tr><td>№</td> <td>Стоимость</td> <td>Владелец</td></tr></thead><tbody>';
			
			$sql = "SELECT * FROM `Houses` ORDER BY Cost DESC LIMIT 0, 15";
			$result = $mysqli->query($sql);
			$rows = $result->num_rows;
			if($rows != 0)
			{
				for ($x = 0; $x < $rows; $x++)	
				{	
					$idnum++;
					$house = $result->fetch_assoc();	
					
					$content .= '<tr><td>'.$idnum.'</td> <td>$'.number_format($house['Cost'], 0, ',', ',').'</td> <td>'.$house['Owner'].'</td></tr>';
				};
				$result->close();
				$content .= '</tbody>';
			}
			echo json_encode(array('status' => 'success','content' => $content));
			break;
		}
		case 'most-expensive-businesses':
		{
			$title = 'Самые дорогие бизнесы - '.$servers['server_name'].' - Рейтинги '.$projectname.' Roleplay';
			$content .='<thead><tr><td>№</td> <td>Стоимость</td> <td>Название</td> <td>Владелец</td></tr></thead><tbody>';
			
			$sql = "SELECT * FROM `Businesses` ORDER BY Cost DESC LIMIT 0, 15";
			$result = $mysqli->query($sql);
			$rows = $result->num_rows;
			if($rows != 0)
			{
				for ($x = 0; $x < $rows; $x++)	
				{	
					$idnum++;
					$biz = $result->fetch_assoc();	
					
					$content .= '<tr><td>'.$idnum.'</td> <td>$'.number_format($biz['Cost'], 0, ',', ',').'</td> <td>'.$biz['Name'].'</td> <td>'.$biz['Owner'].'</td></tr>';
				};
				$result->close();
				$content .= '</tbody>';
			}
			echo json_encode(array('status' => 'success','content' => $content));
			break;
		}
		default: return false;
	}
?>