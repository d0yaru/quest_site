<?
	session_start();
	require_once('core/connect.php');
	$mysqli->set_charset("utf8");
	
	$sql = "SELECT * FROM `servers` WHERE `id` = '{$_SESSION['server']}' LIMIT 1";
	$result = $mysqli->query($sql);
	$server = $result->fetch_assoc();	
	$nameserver = $server['server_name'];
	$post_id = stristr($url[1], '-', true);
	
	if( $_SESSION['account_logged'] == 'try' ) 
	{
		$input = '<div class="comments__input-box" data-name="'.$_SESSION['account_name'].'" data-skin="'.$_SESSION['skin'].'" data-server="'.$nameserver.'" data-post="'.$post_id.'">
					<textarea name="message" placeholder="Введите комментарий" class="comments__textarea"></textarea>
					<button class="commends">Отправить</button> 
				</div>';
		if( $_POST['type'] == 'commend' && isset($_POST['post']) && isset($_POST['name']) && isset($_POST['value']) && isset($_POST['server']) && isset($_POST['skin_id']) )
		{
			$post_id = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['post']))));
			$name = $_POST['name'];
			$message = $_POST['value'];
			$nameserver = $_POST['server'];
			$skin = $_POST['skin_id'];

			$sql = "INSERT INTO `commends`(`post_id`,`name`,`server`,`skin_id`,`content`,`status`) VALUES ( '{$post_id}','{$name}','{$nameserver}','{$skin}','{$message}','1' )";
			$result = $mysqli->query($sql);
			
			$sql = "UPDATE `news` SET `commend` = commend +'1' WHERE id = '{$post_id}'";
			$result = $mysqli->query($sql);
		}
	}
	else $input = '<div class="comments__help-message-box">Оставлять комментарий может только авторизованный игрок </div>';

	$post_id = stristr($url[1], '-', true);
	$sql = "SELECT * FROM `news` WHERE `id` = '{$post_id}' LIMIT 1";
	$result = $mysqli->query($sql);
	$rows = $result->num_rows;

	if($rows != 0)
	{	
		$news = $result->fetch_assoc();	
		$date = date('Y-m-d', strtotime($news['date']));
		$transtale = translit($news['title']); //переводим русский в англ
		$lower = strtolower($transtale); //занижаем текст
		$url = preg_replace("![^a-z0-9]+!i", "-", $lower); // заменяем пустоту на -
		$title_post = $news['title'];
		$content = $news['content'];
		$listitem = '<li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
							<a href="/posts" aria-current="page" class="nuxt-link-exact-active nuxt-link-active" itemprop="item"></a> <span itemprop="name">'.$news['title'].'</span> <meta itemprop="position" content="3">
						</li>';
	}
	
	$sql = "SELECT * FROM `commends` WHERE `post_id` = '{$post_id}' AND status != 0";
	$result = $mysqli->query($sql);
	$rows = $result->num_rows;

	if($rows != 0)
	{	
		while($commends = $result->fetch_assoc())	
		{	
			$arr = [ 'янв','фев','мар','апр','май','июн','июл','авг','сен','окт','ноя', 'дек'];
			$month = date('n')-1;
			$date = date_format(date_create($commends['date']), 'd '.$arr[$month].', H:i'); // //11 мар, 16:58
			$cont .= '<div class="comments__comment comment">
							<div class="comment__avatar" style="background-image:url(/public/img/skins/'.$commends['skin_id'].'.png)"></div> 
							<div class="comment__username">'.$commends['name'].'</div> 
							<div class="comment__datetime">'.$date.'</div> 
							<div class="comment__servername">'.$commends['server'].'</div> 
							<div class="comment__content">'.$commends['content'].'</div>
						</div>';
		}
		$result->close();
	}

?>	