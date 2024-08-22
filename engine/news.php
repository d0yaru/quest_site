<?
	require_once('core/connect.php');

	$mysqli->set_charset("utf8");
	$sql = "SELECT * FROM `news` WHERE `status` = '1' ORDER BY id DESC";
	$result = $mysqli->query($sql);
	$rows = $result->num_rows;

	if($rows != 0)
	{	
		$result->data_seek(0);
		$news = $result->fetch_assoc();	
		$date = date('Y-m-d', strtotime($news['date']));
		$transtale = translit($news['title']); //переводим русский в англ
		$lower = strtolower($transtale); //занижаем текст
		$url = preg_replace("![^a-z0-9]+!i", "-", $lower); // заменяем пустоту на -
		$post_id = $news['id'];
		$url_post = ''.$post_id.'-'.$url.'';
		$bignews = '<div class="post post--size-big">
								<div class="post__image" style="background-image: url('.$news['image'].');"></div>
							<div class="post__label"><span>Главное</span></div>
							<a href="/posts/'.$url_post.'" class="post__title">'.$news['title'].'</a>
							<div class="post__content">
								'.mb_strimwidth($news['content'], 0, 300, "...").'
							</div>
							<div class="post__datetime">
								'.$date.', '.$news['commend'].' комментария
							</div>
						</div>';
				
		while($news = $result->fetch_assoc())	
		{
			$date = date('Y-m-d', strtotime($news['date']));
			$transtale = translit($news['title']); //переводим русский в англ
			$lower = strtolower($transtale); //занижаем текст
			$url = preg_replace("![^a-z0-9]+!i", "-", $lower); // заменяем пустоту на -
			$post_id = $news['id'];
			$url_post = ''.$post_id.'-'.$url.'';
			$content .= '<div class="post">
							<div class="post__image" style="background-image: url('.$news['image'].');"></div>
							<a href="/posts/'.$url_post.'" class="post__title">'.$news['title'].'</a>
							<div class="post__datetime">
								'.$date.', '.$news['commend'].' комментариев
							</div>
						</div>';
		};
		$result->close();
	}
?>	