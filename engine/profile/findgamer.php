<?php
	$server = stripslashes(htmlspecialchars(trim($_POST['serverId2'])));
	$name = stripslashes(htmlspecialchars(trim($_POST['username'])));
	
	if($server == '0') { echo json_encode(array('status' => 'error', 'type' => 'invalidserver')); return false; }
	else if($name == '') { echo json_encode(array('status' => 'error', 'type' => 'invalidusername')); return false; }

	require_once('../../engine/core/connect.php');
	$mysqli->set_charset("utf8");
	$sql = "SELECT * FROM `servers` WHERE id = '{$server}'";
	$result = $mysqli->query($sql);
	if($result->num_rows != 0) 
	{
		$servers = $result->fetch_assoc();
		$mysqli = @new mysqli($servers['db_host'], $servers['db_user'], $servers['db_password'], $servers['db_name']);
		//if (mysqli_connect_errno()) { echo json_encode(array('status' => 'error', 'type' => 'dbinvalidserver')); return false; }
		$sql = "SELECT * FROM `Qelksekm` WHERE `NickName` = '{$name}'";
		$result = $mysqli->query($sql);
		
		if($result->num_rows != 0)
			{	
				$account = $result->fetch_assoc();
				switch($account['VIP'])
				{
					case 0: $VIP = "Нет"; break;
					case 1: $VIP = "Bronze"; break;
					case 2: $VIP = "Gold"; break;
					case 3: $VIP = "Platinum"; break;
					case 4: $VIP = "Diamond"; break;
					case 5: $VIP = "Titan"; break;
					case 6: $VIP = "Premium"; break;
					case 7: $VIP = "ADD"; break;
				}
				switch($account['Job'])
				{
					case 1: $job = "Водитель автобуса"; break;
					case 2: $job = "Детектив"; break;
					case 3: $job = "Развозчик продуктов"; break;
					case 4: $job = "Механик"; break;
					case 5: $job = "Таксист"; break;
					case 6: $job = "Адвокат"; break;
					case 7: $job = "Фермер"; break;
					case 8: $job = "Крупье"; break;
					case 9: $job = "Инкассатор"; break;
					case 10: $job = "Наркодиллер"; break;
					case 11: $job = "Дальнобойщик"; break;
					case 12: $job = "Развозчик пиццы"; break;
					case 13: $job = "Развозчик металлолома"; break;
					case 14: $job = "Мусорщик"; break;
					case 15: $job = "Грузчик"; break;
					case 16: $job = "Работник Налоговой"; break;
					case 17: $job = "Начинающий фермер"; break;
					case 18: $job = "Тракторист"; break;
					case 19: $job = "Комбайнер"; break;
					case 20: $job = "Водитель кукурузника"; break;
					case 21: $job = "Строитель"; break;
					default: $job = "Безработный"; break;
				}
				switch($account['Member'])
				{
					case 1: $member = "Полиция ЛС"; break;
					case 2: $member = "RCPD"; break;
					case 3: $member = "FBI"; break;
					case 4: $member = "Полиция СФ"; break;
					case 5: $member = "Больница LS"; break;
					case 6: $member = "Правительство"; break;
					case 7: $member = "Армия LV"; break;
					case 8: $member = "Больница SF"; break;
					case 9: $member = "Лицензеры"; break;
					case 10: $member = "Radio LS"; break;
					case 11: $member = "Grove"; break;
					case 12: $member = "Vagos"; break;
					case 13: $member = "Ballas"; break;
					case 14: $member = "Aztecas"; break;
					case 15: $member = "Rifa"; break;
					case 16: $member = "Russian Mafia"; break;
					case 17: $member = "Yakuza"; break;
					case 18: $member = "La Cosa Nostra"; break;
					case 19: $member = "Warlock MC"; break;
					case 20: $member = "Армия LS"; break;
					case 21: $member = "Центральный Банк"; break;
					case 22: $member = "Больница LV"; break;
					case 23: $member = "Полиция LV"; break;
					case 24: $member = "Radio LV"; break;
					case 25: $member = "Night Wolfs"; break;
					case 26: $member = "Radio SF"; break;
					case 27: $member = "Армия SF"; break;
					default: $member = "Отсутствует"; break;
				}
				$content = '
					<div class="gamer-data__row"><div class="gamer-data__key">ID</div><div class="gamer-data__value">'.$account['ID'].'</div></div>	
					<div class="gamer-data__row"><div class="gamer-data__key">Ник</div><div class="gamer-data__value">'.$account['NickName'].'</div></div>
					<div class="gamer-data__row"><div class="gamer-data__key">Статус</div><div class="gamer-data__value">Не в сети</div><div class="gamer-data__value" style="display: none;">Сейчас в игре</div></div>
					<div class="gamer-data__row"><div class="gamer-data__key">Уровень</div><div class="gamer-data__value">'.$account['Level'].'</div></div>
					<div class="gamer-data__row"><div class="gamer-data__key">Номер телефона</div><div class="gamer-data__value">'.$account['TelNum'].'</div></div>
					<div class="gamer-data__row"><div class="gamer-data__key">Уровень VIP</div><div class="gamer-data__value">'.$VIP.'</div></div>
					<div class="gamer-data__row"><div class="gamer-data__key">Наличные</div><div class="gamer-data__value">'.formatToHuman($account['Money']).'</div></div>
					<div class="gamer-data__row"><div class="gamer-data__key">Накопления</div><div class="gamer-data__value">'.formatToHuman($account['Bank']).'</div></div>
					<div class="gamer-data__row"><div class="gamer-data__key">Состояние депозита</div><div class="gamer-data__value">'.formatToHuman($account['Deposit']).'</div></div>
					<div class="gamer-data__row"><div class="gamer-data__key">Работа</div><div class="gamer-data__value">'.$job.'</div></div>
					<div class="gamer-data__row"><div class="gamer-data__key">Организация</div><div class="gamer-data__value">'.$member.'</div></div>';
				echo json_encode(array('status' => 'success', 'content' => $content));
				
			} else { echo json_encode(array('status' => 'error', 'type' => 'noaccount')); return false; }
			$result->close();
	}
	
function formatToHuman($number)
{        
		if ($number < 1000) {
			 return sprintf('%d', $number);
		}
		if ($number < 1000000) {
			$number = $number / 1000;
			return $newVal = number_format($number,1) . ' тыс.';
		}
		if ($number >= 1000000 && $number < 1000000000) {
			$number = $number / 1000000;
			return $newVal = number_format($number,1) . ' млн';
		}
		if ($number >= 1000000000 && $number < 1000000000000) {
			$number = $number / 1000000000;
			return $newVal = number_format($number,1) . ' млрд';
		}
		return sprintf('%d%s', floor($number / 1000000000000), ' трлн');        
}
?>