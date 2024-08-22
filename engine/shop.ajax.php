<?
	require_once('core/connect.php');
	$mysqli->set_charset("utf8");
	
	if($_POST['type'] == 'packet' && isset($_POST['packet_id'])) // покупка товаров
	{
		session_start();
		if($_SESSION['account_logged'] != 'try') { echo json_encode(array('status' => 'error', 'type' => 'nologin')); return false; }
		else
		{
			$server = $_SESSION['server'];
			$packet_id = stripslashes(htmlspecialchars(trim($_POST['packet_id'])));
			
			$sql = "SELECT * FROM `shop` WHERE `id` = '{$packet_id}'";
			$result = $mysqli->query($sql);
			$packetInfo = $result->fetch_assoc();
			$price = $packetInfo['price'] - ($packetInfo['price'] * ( $config['donat_sale'] / 100 ));
			
			$sql = "INSERT INTO `payment`(`username`,`server_id`,`type`,`price`,`status`) VALUES ('{$_SESSION['account_name']}','{$_SESSION['server']}','{$packet_id}','{$price}','0')";
			$result = $mysqli->query($sql);
			$curent_id = $mysqli->insert_id;
			
			$sql = "SELECT * FROM `servers` WHERE `id` = '{$_SESSION['server']}'";
			$result = $mysqli->query($sql);
			
			$servers = $result->fetch_assoc();
			$name_server = $servers['server_name'];
			$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);
			$mysqli->set_charset("utf8");
			
			$sql = "SELECT * FROM `Qelksekm` WHERE `NickName` = '{$_SESSION['account_name']}'";
			$result = $mysqli->query($sql);
			$rows = $result->num_rows;
			
			if($rows != 0)
			{
				$result->data_seek(0);
				$account = $result->fetch_assoc();

				if($account['Online_status'] != 0) { echo json_encode(array('status' => 'error', 'type' => 'online')); return false; }
				if($price < 150) { $qiwi = 'disabled'; $help = '<div class="order-ps-help">Доступно от 150 ₽</div>'; $qiwi_href = '#';}
				else { $qiwi = ''; $help = ''; $qiwi_href = '';}
				
				$content_packet = '<div class="order-data__items">
												<div class="order-data__item order-item">
													<div class="order-item__param">Номер счета</div>
													<div class="order-item__value">№ '.$curent_id.'</div>
												</div>
												<div class="order-data__item order-item">
													<div class="order-item__param">Ник</div>
													<div class="order-item__value">'.$_SESSION['account_name'].'</div>
												</div>
												<div class="order-data__item order-item">
													<div class="order-item__param">Сервер</div>
													<div class="order-item__value">'.$name_server.' (№ '.$_SESSION['server'].')</div>
												</div>
												<div class="order-data__item order-item">
													<div class="order-item__param">Сумма</div>
													<div class="order-item__value">₽'.$price.'</div>
												</div>
											</div>
											<div class="order-data__buttons">
												<div><a href="#" class="order-button disabled">Банк. карты</a></div>
												<div><a href="'.$qiwi_href.'" class="order-button '.$qiwi.'"><img src="/public/img/qiwi_logo_rgb_small.png" alt="Логотип QIWI."></a>
												'.$help.'
											</div>
											<div><a href="#" class="order-button ua-flag">Украинские карты<span>Visa/MasterCard</span></a></div>
											<div><a href="#" class="order-button green two-lines">Все способы<span>Visa, MasterCard</span></a></div>
											</div>';
					
					echo json_encode(array('status' => 'success', 'accept_packet' => $content_packet));
			} else { echo json_encode(array('status' => 'error', 'type' => 'noaccount')); return false; }
		}
	}
	else //покупка AZ
	{
	
		$server = stripslashes(htmlspecialchars(trim($_POST['serverId'])));
		$name = stripslashes(htmlspecialchars(trim($_POST['username'])));
		$sum = stripslashes(htmlspecialchars(trim($_POST['sum'])));
		
		if($server == 0) { echo json_encode(array('status' => 'error', 'type' => 'invalidserver')); return false; }
		else if($name == '') { echo json_encode(array('status' => 'error', 'type' => 'invalidname')); return false; }
		else if($sum < 1) { echo json_encode(array('status' => 'error', 'type' => 'invalidsum')); return false; }
		else
		{
			$sql = "INSERT INTO `payment`(`username`,`server_id`,`type`,`price`,`status`) VALUES ('{$name}','{$server}','0','{$sum}','0')";
			$result = $mysqli->query($sql);
			$curent_id = $mysqli->insert_id;
			
			$sql = "SELECT * FROM `servers` WHERE `id` = '{$server}'";
			$result = $mysqli->query($sql);
			
			$servers = $result->fetch_assoc();
			$name_server = $servers['server_name'];
			$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);
			if (mysqli_connect_errno()) { echo json_encode(array('status' => 'error', 'type' => 'dbinvalidserver')); return false; }
			$mysqli->set_charset("utf8");
			
			$sql = "SELECT * FROM `Qelksekm` WHERE `NickName` = '{$name}'";
			$result = $mysqli->query($sql);
			$rows = $result->num_rows;
						
			if($rows != 0)
			{
				$result->data_seek(0);
				$account = $result->fetch_assoc();

				if($account['Online_status'] != 0) { echo json_encode(array('status' => 'error', 'type' => 'online')); return false; }
				if($sum < 150) { $qiwi = 'disabled'; $help = '<div class="order-ps-help">Доступно от 150 ₽</div>'; $qiwi_href = '#';}
				else { $qiwi = ''; $help = ''; $qiwi_href = '';}
				
				$content = '<div class="check-payment-modal vm--container">
									<div data-modal="check-payment-system" aria-expanded="true" class="vm--overlay" onclick="document.getElementsByClassName(&quot;check-payment-modal&quot;)[0].remove();">
										<div class="vm--top-right-slot">
									</div>
								</div> 
								<div aria-expanded="true" role="dialog" aria-modal="true" class="vm--modal" style="background: transparent; box-shadow: unset; padding-top: 20px; width: 400px; height: 645px; position: absolute; margin: auto; top: -9999px; bottom: -9999px; left: -9999px; right: -9999px;">
								<div class="order-data">
									<div class="order-data__title">Проверка данных</div>
										<div class="order-data__items">
											<div class="order-data__item order-item">
												<div class="order-item__param">Номер счета</div>
												<div class="order-item__value">№ '.$curent_id.'</div>
											</div>
											<div class="order-data__item order-item">
												<div class="order-item__param">Ник</div>
												<div class="order-item__value">'.$name.'</div>
											</div>
											<div class="order-data__item order-item">
												<div class="order-item__param">Сервер</div>
												<div class="order-item__value">'.$name_server.' (№ '.$server.')</div>
											</div>
											<div class="order-data__item order-item">
												<div class="order-item__param">Сумма</div>
												<div class="order-item__value">₽'.$sum.'</div>
											</div>
										</div>
										<div class="order-data__buttons">
											<div><a href="#" class="order-button disabled">Банк. карты</a></div>
											<div><a href="'.$qiwi_href.'" class="order-button '.$qiwi.'"><img src="/public/img/qiwi_logo_rgb_small.png" alt="Логотип QIWI."></a>
											'.$help.'
										</div>
										<div><a href="#" class="order-button ua-flag">Украинские карты<span>Visa/MasterCard</span></a></div>
										<div><a href="#" class="order-button green two-lines">Все способы<span>Visa, MasterCard</span></a></div>
										</div><div class="terms"><input type="checkbox" checked="checked"><span>Продолжая покупку, вы соглашаетесь с <a href="/document/terms" class="">пользовательским соглашением</a>.</span>
									</div></div></div></div>';
									
				//$url = 'http://www.free-kassa.ru/merchant/cash.php?m='.$merchant_id.'&oa='.$sum.'&o='.$order_id.'&s='.$sign.'&us_account='.$name.'&us_server='.$server.'';

				echo json_encode(array('status' => 'success', 'accept' => $content));
			} else echo json_encode(array('status' => 'error', 'type' => 'noaccount'));
		}
	}
	
	
?>