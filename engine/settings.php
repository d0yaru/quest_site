<?
	require_once('core/connect.php');
	$mysqli->set_charset("utf8");
	if(isset($_POST['table']) && isset($_POST['field']) && isset($_POST['value']) && isset($_POST['id']))
	{
		$table = $_POST['table'];
		$type = $_POST['field'];
		$value = $_POST['value'];
		$id = $_POST['id'];
		
		$sql = "UPDATE `{$table}` SET `{$type}` = '{$value}' WHERE id = '{$id}'";
		$mysqli->query($sql);
		$mysqli->close();
    }
	else if(isset($_POST['table']) && isset($_POST['deleteid']))
	{
		$table = $_POST['table'];
		$id = $_POST['deleteid'];

		$sql = "DELETE FROM `{$table}` WHERE id = '{$id}'";
		$mysqli->query($sql);
		$mysqli->close();
    }
	else if(isset($_POST['table']) && isset($_POST['post_id']) && $_POST['get_text'] == 'yes')
	{
		$table = $_POST['table'];
		$post_id = $_POST['post_id'];
		
		$sql = "SELECT * FROM `{$table}` WHERE id = '{$post_id}'";
		$result = $mysqli->query($sql);
		$news_td = $result->fetch_assoc();	
		$text = $news_td['content'];
		$result->close();

		echo json_encode(array('text' => $text));
    }
	else if(isset($_POST['table']) && $_POST['add'] == 'yes')
	{
		if($_POST['table'] == 'servers')
		{
			$sql = "INSERT INTO `servers`
			(`server_name`,`server_ip`,`group_vk_url`,`db_host`,`db_user`,`db_password`,`db_name`,`status`) VALUES 
			('Phoenix','185.169.134.3:7777','https://vk.com/public112280295','127.0.0.1','root','clfF60r9EegDSi','arizona_1','0')";
		}
		else if($_POST['table'] == 'shop')
		{
			$sql = "INSERT INTO `shop`(`packet_type`,`packet_url`,`packet_name`,`packet_sum`,`packet_economy`,`packet_admins`,`price`,`status`) VALUES ('0','/public/img/shop/cash-1.png','Название товара','500000','1000000','0','100','0')";
		}
		else
		{
			$sql = "INSERT INTO `news`(`title`,`content`,`image`,`status`) VALUES ('Название новости','Содержимое новости','https://i.ytimg.com/vi/2bz08gf8sEI/maxresdefault.jpg','0')";
		}
		$mysqli->query($sql);
		$last_id = $mysqli->insert_id;
		$mysqli->close();
		
		echo json_encode(array('status' => 'success', 'type' => $last_id, 'time' => date('Y-m-d H:i:s')));
    }
	
	if($_POST['href'] == '/panel/servers') 
	{	
		$table = 'servers';
		
		$sql = "SELECT * FROM `servers`";
		$result = $mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows != 0)
		{
			$content .='<thead><tr>
				<td>№</td> 
				<td>Название</td> 
				<td>IP:PORT</td> 
				<td>Группа ВК</td> 
				<td>DB HOST</td> 
				<td>DB USER</td> 
				<td>DB PASS</td> 
				<td>DB NAME</td> 
				<td>Статус</td>
			</tr></thead><tbody>';
			
			for ($x = 0; $x < $rows; $x++)	
			{	
				$servers = $result->fetch_assoc();	
				if($servers['status'] == 0) $statustext = "<font color='#c92e2e'>Выключен</font>";
				else $statustext = "<font color='#9cf122'>Включен</font>";
				
				if($servers['status'] == 0) $status = "failed";
				else $status = "success";
				
				$content .= '<tr data-id="'.$servers['id'].'">
					<td class="id">'.$servers['id'].'</td> 
					<td class="edit server_name">'.$servers['server_name'].'</td> 
					<td class="edit server_ip">'.$servers['server_ip'].'</td>
					<td class="edit group_vk_url">'.$servers['group_vk_url'].'</td> 
					<td class="edit db_host">'.$servers['db_host'].'</td> 
					<td class="edit db_user">'.$servers['db_user'].'</td> 
					<td class="edit db_password">'.$servers['db_password'].'</td> 
					<td class="edit db_name">'.$servers['db_name'].'</td>
					<td class="status '.$status.'">'.$statustext.'</td>
					<td class="delete"><button class="del"></botton></td>
						</tr>';
			};
			$result->close();
			$content .= '</tbody>';
		}
		$botton = '<a class="btn btn--red btn--navbar servers">Добавить сервер</a>';
		echo json_encode(array('status' => 'success', 'botton' => $botton, 'content' => $content));
	}
	else if($_POST['href'] == '/panel/news') 
	{	
		$table = 'news';
		
		$sql = "SELECT * FROM `news`";
		$result = $mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows != 0)
		{
			$content .='<thead><tr><td>№</td> 
					<td>Название</td> 
					<td>Содержимое</td> 
					<td>Картинка</td> 
					<td>Дата</td> 
					<td>Статус</td>
				</tr></thead><tbody>';
			
			for ($x = 0; $x < $rows; $x++)	
			{	
				$news = $result->fetch_assoc();	
				if($news['status'] == 0) $statustext = "<font color='#c92e2e'>Выключен</font>";
				else $statustext = "<font color='#9cf122'>Включен</font>";
				
				if($news['status'] == 0) $status = "failed";
				else $status = "success";
				
				$text[] = $news['content'];
				
				$content .= '<tr data-id="'.$news['id'].'">
					<td class="id">'.$news['id'].'</td> 
					<td class="edit title">'.$news['title'].'</td> 
					<td class="text"><button class="textedit">Посмотреть</botton></td> 
					<td class="edit image">'.$news['image'].'</td> 
					<td class="edit date">'.$news['date'].'</td> 
					<td class="status '.$status.'">'.$statustext.'</td>
					<td class="delete"><button class="del"></botton></td>
						</tr>';
			};
			$result->close();
			$content .= '</tbody>';
		}
		$botton = '<a class="btn btn--red btn--navbar news">Добавить новость</a>';
		echo json_encode(array('status' => 'success', 'botton' => $botton, 'content' => $content));
	}
	else if($_POST['href'] == '/panel/shop') 
	{	
		$table = 'shop';
		
		$sql = "SELECT * FROM `shop`";
		$result = $mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows != 0)
		{
			$content .='<thead><tr><td>№</td> 
					<td>Тип товара</td> 
					<td>Картинка</td> 
					<td>Название</td> 
					<td>Сумма</td> 
					<td>Выгода</td> 
					<td>Админка</td> 
					<td>Цена</td> 
					<td>Статус</td>
				</tr></thead><tbody>';
			
			for ($x = 0; $x < $rows; $x++)	
			{	
				$shop = $result->fetch_assoc();	
				if($shop['status'] == 0) $statustext = "<font color='#c92e2e'>Выключен</font>";
				else $statustext = "<font color='#9cf122'>Включен</font>";
				if($shop['status'] == 0) $status = "failed";
				else $status = "success";
				
				if($shop['packet_type'] == 0) { $packet_type = "<font color='#22f19b'>Money</font>"; $type = "money"; }
				else if($shop['packet_type'] == 1) { $packet_type = "<font color='#f1d822'>VIP</font>"; $type = "vip"; }
				else if($shop['packet_type'] == 2) { $packet_type = "<font color='#f12278'>Admins</font>"; $type = "admins"; }
				else { $packet_type = "<font color='#f561ea'>Specials</font>"; $type = "specials"; }
				
				$content .= '<tr data-id="'.$shop['id'].'">
					<td class="id">'.$shop['id'].'</td> 
					<td class="packet_type '.$type.'">'.$packet_type.'</td>
					<td class="edit packet_url">'.$shop['packet_url'].'</td> 
					<td class="edit packet_name">'.$shop['packet_name'].'</td>
					<td class="edit packet_sum">'.$shop['packet_sum'].'</td> 
					<td class="edit packet_economy">'.$shop['packet_economy'].'</td> 
					<td class="edit packet_admins">'.$shop['packet_admins'].'</td> 
					<td class="edit price">'.$shop['price'].'</td> 
					<td class="status '.$status.'">'.$statustext.'</td>
					<td class="delete"><button class="del"></botton></td>
						</tr>';
			};
			$result->close();
			$content .= '</tbody>';
		}
		$botton = '<a class="btn btn--red btn--navbar shop">Добавить товар</a>';
		echo json_encode(array('status' => 'success', 'botton' => $botton, 'content' => $content));
	}
	else if($_POST['href'] == '/panel/commends') 
	{	
		$table = 'commends';
		
		$sql = "SELECT * FROM `commends`";
		$result = $mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows != 0)
		{
			$content .='<thead><tr><td>№</td> 
					<td>POST ID</td> 
					<td>Ник</td> 
					<td>Сервер</td> 
					<td>Комментарий</td> 
					<td>Статус</td>
				</tr></thead><tbody>';
			
			for ($x = 0; $x < $rows; $x++)	
			{	
				$commends = $result->fetch_assoc();	
				if($commends['status'] == 0) $statustext = "<font color='#c92e2e'>Выключен</font>";
				else $statustext = "<font color='#9cf122'>Включен</font>";
				
				if($commends['status'] == 0) $status = "failed";
				else $status = "success";
				
				$content .= '<tr data-id="'.$commends['id'].'">
					<td class="id">'.$commends['id'].'</td> 
					<td>'.$commends['post_id'].'</td> 
					<td>'.$commends['name'].'</td> 
					<td>'.$commends['server'].'</td> 
					<td class="edit content">'.$commends['content'].'</td> 
					<td class="status '.$status.'">'.$statustext.'</td>
					<td class="delete"><button class="del"></botton></td>
						</tr>';
			};
			$result->close();
			$content .= '</tbody>';
		}
		echo json_encode(array('status' => 'success', 'content' => $content));
	} else return false;
?>