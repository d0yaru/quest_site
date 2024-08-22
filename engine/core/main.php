<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>
<?
	require_once('connect.php');
	require_once('./engine/smtp_mailer.php');

    $projectname = $config['nameproject'];
	
	$action = stripslashes(htmlspecialchars(trim($_GET['action'])));
	
	$url = explode('/', $action);
	
	$mysqli->set_charset("utf8");
	$sql = "SELECT * FROM `servers` WHERE `status` != '0'";
	$result = $mysqli->query($sql);
	$rows = $result->num_rows;
	
	while($servers = $result->fetch_assoc())
	{		
		$servername[] = $servers['server_name'];
		$serverid[] = $servers['id'];
		
		if($url[0] == 'map' && $url[1] == strtolower($servers['server_name']))
	    {
			$background = 'bg-9';
			$title = 'Карта штата '.$servers['server_name'].' - '.$projectname.' Roleplay';
			require_once('engine/votes.php');
			require_once('engine/map.php');
			$page = 'public/pages/map.php';
			$script = '<script src=/public/js/change.rating.js></script>
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			<script src="/public/js/map.js"></script>';
			return false;
		}
		else if($url[0] == 'rating' && $url[2] == strtolower($servers['server_name']))
	    {
			$background = 'rating-page';
			$title = 'Рейтинги '.$projectname.' Roleplay';
			require_once('engine/rating.php');
			$page = 'public/pages/rating.php';
			//$script = '<script src="/public/js/ajax.js"></script>';
			return false;
		}
		else if($url[0] == 'fractions' && $url[1] == strtolower($servers['server_name']))
	    {
			$background = 'rating-page';
			$title = 'Организации - '.$projectname.' Roleplay';
			require_once('engine/fractions.php');
			$page = 'public/pages/fractions.php';
			return false;
		}
	}
	$result->close();

	if(empty($url[0]))
	{
		$title = 'SAMP: Играть в GTA по сети - '.$projectname.' Role Play';
		$page = 'public/pages/main.php';
		$background = 'homepage';
		 require_once('engine/news.php');
		$page_news = 'public/pages/news.php';
		$page_faq = 'public/pages/faq.php';
		$script = "<script charset='utf-8' src='/public/js/script.js'></script>";
	}
	else if($url[0] == "profile" || $url[0] == "login")
	{
		if(empty($_SESSION['account_id']) || $_SESSION['account_logged'] != 'try')
		{
			$title = 'Авторизация - Личный кабинет';
			$page = 'public/pages/profile/login.php';
			$background = 'login';
			$script = "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js'></script>
				<script charset='utf-8' src='/public/js/auth.js'></script>";
		}
		else 
		{            
            require_once('engine/profile/profile.php');
			$title = 'Личный кабинет - '.$projectname.' Roleplay';
			$page = 'public/pages/profile/profile.php';
			$background = 'lk';
			$script = '<script src="/public/js/ajax.js"></script>';
		}
	}
	else if($url[0] == "panel")
	{
		if($_SESSION['account_logged'] == 'try')
		{
			if($_SESSION['account_name'] == $config['admin_name'])
			{
				$title = 'Панель управления - '.$projectname.' Role Play';
				$background = 'bg-9';
				//require_once('engine/settings.php');
				$page = 'public/pages/settings.php';
				$script = '<script src="/public/js/ajax.js"></script>';
			}
			else header('Location: /error');
		}
		else header('Location: /login');
	}
	else
	{
		switch ($url[0])
		{	
			case 'posts':
			{
				if(!empty($url[1]))
				{
					$mysqli->set_charset("utf8");
					$sql = "SELECT * FROM `news` WHERE `status` != '0'";
					$result = $mysqli->query($sql);
					
					while($news = $result->fetch_assoc())
					{
						$transtale = translit($news['title']); //переводим русский в англ
						$lower = strtolower($transtale); //занижаем текст
						$post_url = preg_replace("![^a-z0-9]+!i", "-", $lower); // заменяем пустоту на -
						$post_id = $news['id'];
						$url_post = ''.$post_id.'-'.$post_url.'';
						
						if($url[1] == $url_post)
						{
							$background = 'bg-9';
							$title = ''.$news['title'].' - SAMP: '.$projectname.' Roleplay Новости';
							require_once('engine/post.php');
							$page = 'public/pages/post.php';
							$script = '<script src="/public/js/commends.js"></script>
								<script src="/public/js/date.format.js"></script>';
							return false;
						}
						else $page = 'public/pages/404.php';
					}
				}
				else
				{
					$title = 'SAMP: Новости '.$projectname.' Role Play - обновления, акции, важные сообщения';
					require_once('engine/news.php');
					$background = 'bg-9';
					$page = 'public/pages/posts.php';
					require_once('engine/votes.php');
					$script = '<script src=/public/js/change.rating.js></script>';
					return false;
				}
				break;
			}
			case 'recovery-password':
			{
				$title = 'Восстановление пароля - Личный кабинет';
				require_once('engine/profile/recoverypass.php');
				$page = 'public/pages/profile/recoverypass.php';
				$background = 'recovery-password-page bg-9';
				$script = "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js'></script>
						<script charset='utf-8' src='/public/js/auth.js'></script>";
				break;
			}
			case 'servers':
		    {
			    $title = 'SAMP: Серверы GTA SA-MP — '.$projectname.' Role Play';
				$background = 'bg-9';
				$flag = 'mon-server--with-flag';
				require_once('engine/votes.php');
				require_once('engine/servers.php');
				$page = 'public/pages/servers.php';
				$script = '<script src=/public/js/change.rating.js></script>';
				break;
			}
			case 'logout':
		    {
				require_once('public/pages/profile/logout.php');
				break;
			}
			case 'find-gamer':
			{
				$title = 'Поиск игрока';
				$page = 'public/pages/profile/findgamer.php';
				$background = 'find-gamer-page bg-9';
				$script = '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>';
				break;
			}
			case 'change-password':
			{
				if(!empty($_SESSION['account_id']) && $_SESSION['account_logged'] == 'try')
		        { 
			        $title = 'Изменение пароля - Личный кабинет';
				    $page = 'public/pages/profile/changepass.php';
				    $background = 'bg-9';
					$script = "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js'></script>
						<script charset='utf-8' src='/public/js/auth.js'></script>";
			    }
				else header("Location: /login");
				break;
			}
            case 'shop':
            {
			    $title = ''.$projectname.' Донат: Купить AZ Coin | Официальный сайт '.$projectname.' RP';
				require_once('engine/shop.php');
				$page = 'public/pages/shop.php';
				$script = "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js'></script>
					<script src='/public/js/shop.js'></script>";
				$background = 'shop';
				break;
			}
            case 'error':
			{
				$title = 'Unknown Property';
				$page = 'public/pages/error.php';
				break;
			}			
			default:
			{
                $title = 'Ошибка 404';
				$page = 'public/pages/404.php';
			}
		}	
	}
	function translit($str) {
		$rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
		$lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
		return str_replace($rus, $lat, $str);
	}
?>