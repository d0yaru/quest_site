<?
	require_once('core/connect.php');
	
	$sql = "SELECT * FROM `servers` WHERE `server_name` = '{$url[1]}'";
	$result = $mysqli->query($sql);
	
	if($result->num_rows != 0) 
	{	
		$servers = $result->fetch_assoc();
		$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);
		$mysqli->set_charset("utf8");
		
		$sql = "SELECT * FROM `OrgsInfo`";
		$result = $mysqli->query($sql);
		
		if($result->num_rows != 0) 
		{	
			while($orgs = $result->fetch_assoc())
			{
				$rank_1[] = $orgs['Rank_1']; $rank_2[] = $orgs['Rank_2']; $rank_3[] = $orgs['Rank_3']; $rank_4[] = $orgs['Rank_4']; $rank_5[] = $orgs['Rank_5'];
				$rank_6[] = $orgs['Rank_6']; $rank_7[] = $orgs['Rank_7']; $rank_8[] = $orgs['Rank_8']; $rank_9[] = $orgs['Rank_9']; $rank_10[] = $orgs['Rank_10'];
				$orgsname[] = $orgs['Name'];
				$cont .= '<div class="fractions__list-item"><a href="/fractions/'.$url[1].'/'.$orgs['ID'].'" class="">'.$orgs['Name'].'</a></div>';
			}
			$result->close();
		}
		
		if(!empty($url[2]))
		{
			$content .='<thead><tr><td>№</td> <td>Игрок</td> <td>Ранг</td> <td>Статус</td></tr></thead><tbody>';
		
			$sql = "SELECT * FROM `Qelksekm` WHERE `Member` = '{$url[2]}' ORDER BY Rank DESC";
			$result = $mysqli->query($sql);
			$rows = $result->num_rows;
			
			if($rows != 0)
			{
				for ($x = 0; $x < $rows; $x++)	
				{	
					$idnum++;
					$account = $result->fetch_assoc();	
					if($account['Online_status'] == 0) $status = "Не в игре";
					else $status = "Сейчас играет";
					if($account['Leader'] != 0) $leader = ' (лидер)';
					else $leader = '';
					
					$content .= '<tr><td>'.$idnum.'</td> <td>'.$account['NickName'].'</td> <td>'.${"rank_".$account['Rank']}[$url[2]-1].$leader.'</td> <td>'.$status.'</td></tr>';
				};
				$result->close();
				$content .= '</tbody>';
			}
			$fractions__title = ''.$orgsname[$url[2]-1].' '.ucfirst($url[1]).'';
			$title = ''.$orgsname[$url[2]-1].' - Организации - '.$projectname.' Roleplay';
		} else $fractions__title = 'Организации';
	} else header("Location: /error");
?>