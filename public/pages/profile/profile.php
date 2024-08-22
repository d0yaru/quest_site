<?
    if(!defined("Arizona")) return require_once '../../../public/pages/404.php';
?>
<body class="lk">
    <div id="__nuxt">
		<div id="__layout">
			<div class="layout">
				<div class="vue-notification-group" style="width:300px;top:0;right:0"><span></span></div>
				<div class="layout__content">
					<div class="profile container">
						<div class="dflex jc-sb ai-c">
							<div>
								<div class="main-data"><div class="main-data__nickname"><?php echo $name; ?></div>
									<div class="main-data__level level">
										<div class="level__value"><?php echo $account['Level']; ?></div><div class="level__desc">Уровень</div>
									</div>
								</div>
								<div class="balance"><div class="balance__cash">
									<img src="/public/img/profile/cash.svg" alt="Баланс наличных."><span><?php echo $account['Money']; ?> $</span></div>
									<div class="balance__bank"><img src="/public/img/profile/bank.svg"><span><?php echo $account['Bank']; ?> $</span></div>
									<div class="balance__azc"><img src="/public/img/profile/az-coin.svg" alt="Аризона Коины."><span><?php echo $account['VirMoney']; ?>  (0)</span></div>
									<div class="balance__item"><img src="/public/img/profile/deposit.svg" alt="Депозит."><span><?php echo $account['Deposit']; ?> $</span></div>
									<div class="balance__item"><img src="/public/img/profile/euro.svg" alt="Евро."><span><?php echo $account['donation']; ?> </span></div>
									<div class="balance__item"><img src="/public/img/profile/bitcoin.svg" alt="Биткоин."><span><?php echo $account['BitCoin']; ?> </span></div>
								</div>
							</div>
							<div data-number="<?echo $serverid;?>" class="game-server server-<?echo $serverid;?>">Играет на сервере<div class="game-server__name"><? echo $playingserver; ?></div></div>
						</div>
						<div class="user-menu">
							<button id="vk_warning" class="user-menu__link">Привязать страницу ВК</button>
							<button id="recovery_code" class="user-menu__link">Сбросить код банк. карты</button>
							<a href="/shop" class="user-menu__link">Пополнить счет</a>
							<a href="/change-password" class="user-menu__link">Изменить пароль</a>
							<a href="/find-gamer" class="user-menu__link">Найти игрока</a>
							<a href="/logout" class="user-menu__link">Выйти</a>
						</div>
						<div style="text-align: center;"><button class="user-menu-opener">Управление</button></div>
						<div class="general-data">
							<div class="general-data__info"><div class="section-title">Информация об аккаунте</div>
								<div class="data-row"><div class="data-row__key">ID</div><div class="data-row__value"><?php echo $account['ID']; ?> (<?php if($account['Online_status'] == -1) echo 'Отключен'; else echo 'Играет'; ?>)</div></div>
								<div class="data-row"><div class="data-row__key">E-Mail</div><div id="data-value" class="data-row__value"><?php echo $account['Mail']; ?></div></div>
								<div class="data-row"><div class="data-row__key">Двухфакторная авторизация (почта)</div><div class="data-row__value">Отключена</div></div>
								<div class="data-row"><div class="data-row__key">Двухфакторная авторизация (TOTP)</div><div class="data-row__value">Отключена<div title="включить" class="switcher-2fa switcher-progress switcher-progress--blue"><div class="switcher-progress__bar"></div></div></div></div>
								<div class="data-row"><div class="data-row__key">Номер телефона</div><div class="data-row__value"><?php echo $account['TelNum']; ?></div></div>
								<div class="data-row"><div class="data-row__key">Личный счет</div><div class="data-row__value">-1 $</div></div>
								<div class="data-row"><div class="data-row__key">Работа</div><div class="data-row__value"><?php echo $job; ?></div></div>
								<div class="data-row"><div class="data-row__key">Организация</div><div class="data-row__value"><?php echo $member; ?></div></div>
							</div>
							<div class="general-data__skin">
								<div class="skin"><img src="/public/img/skins/<?php echo $account['Skin']; ?>.png" alt="" class="skin-img"></div>
								<a href="/profile/inventory" class="inventory-button">Мой инвентарь</a>
							</div>
							<div class="general-data__gym">
								<div class="gym-item"><div class="gym-item__icon gym-item__icon--heart"></div>
								<div class="gym-item__bar progress1 progress1--red"><div class="progress1__bar" style="width: calc(<?php if($account['Heal'] > 100) echo '100'; else echo $account['Heal']; ?>% - 12px);"></div><div class="progress1__value"><?php echo $account['Heal']; ?>%</div></div></div>
								<div class="gym-item"><div class="gym-item__icon gym-item__icon--cutlery"></div><div class="gym-item__bar progress1 progress1--orange"><div class="progress1__bar" style="width: calc(<?php if($account['Fullness'] > 100) echo '100'; else echo $account['Fullness']; ?>% - 12px);"></div><div class="progress1__value"><?php echo $account['Fullness']; ?>%</div></div></div>
								<div class="gym-item"><div class="gym-item__icon gym-item__icon--fist"></div><div class="gym-item__bar progress2 progress2"><div class="progress2__bar" style="width: 0%;"></div><div class="progress2__title">Сила</div><div class="progress2__value">0%</div></div></div>
								<div class="gym-item"><div class="gym-item__icon gym-item__icon--muscle"></div><div class="gym-item__bar progress2 progress2"><div class="progress2__bar" style="width: 60%;"></div><div class="progress2__title">Мускулатура</div><div class="progress2__value">60%</div></div></div>
								<div class="gym-item"><div class="gym-item__icon gym-item__icon--running"></div><div class="gym-item__bar progress2 progress2"><div class="progress2__bar" style="width: 10%;"></div><div class="progress2__title">Выносливость</div><div class="progress2__value">10%</div></div></div>
							</div>
						</div>
						
						<div class="upgrades">
							<div class="upgrades__title section-title">Улучшения</div>
							<div class="upgrade"><?php if($account['FeFinder'] != 0 ) echo '<div class="upgrade__status upgrade__status--active"></div>'; else echo '<div class="upgrade__status"></div>';?><div class="upgrade__label">Шумахер</div><div class="upgrade__desc">С этим умением ваша машина не будет глохнуть при столкновении</div></div>
							<div class="upgrade"><?php if($account['CarSkillNo'] != 0 ) echo '<div class="upgrade__status upgrade__status--active"></div>'; else echo '<div class="upgrade__status"></div>';?><div class="upgrade__label">Вечный Car Skill</div><div class="upgrade__desc">Ваш навык вождения не будет уменьшаться</div></div>
							<div class="upgrade"><?php if($account['Planshet'] != 0 ) echo '<div class="upgrade__status upgrade__status--active"></div>'; else echo '<div class="upgrade__status"></div>';?><div class="upgrade__label">Планшет</div><div class="upgrade__desc">Вы сможете отправлять объявления на редакцию из любой точки карты</div></div>
							<div class="upgrade"><?php if($account['More'] != 0 ) echo '<div class="upgrade__status upgrade__status--active"></div>'; else echo '<div class="upgrade__status"></div>';?><div class="upgrade__label">Бизнесмен</div><div class="upgrade__desc">Улучшение позволяет вам владеть пятью бизнесами</div></div>
							<div class="upgrade"><?php if($account['Pack'] != 0 ) echo '<div class="upgrade__status upgrade__status--active"></div>'; else echo '<div class="upgrade__status"></div>';?><div class="upgrade__label">Халявщик</div><div class="upgrade__desc">Ваш персонаж становится везунчиком и платит в 2 раза меньше налогов</div></div>
							<div class="upgrade"><div class="upgrade__status"></div><div class="upgrade__label">Больше недвижимости</div><div class="upgrade__desc">Вы сможете владеть 4 домами</div></div>
							<div class="upgrade"><div class="upgrade__status"></div><div class="upgrade__label">Нет налогам</div><div class="upgrade__desc">Вам не придется платить комиссию в банках и банкоматах</div></div>
							<div class="upgrade"><div class="upgrade__status"></div><div class="upgrade__label">2 фермы</div><div class="upgrade__desc">Возможность иметь 2 фермы</div></div>
						</div>
				
						<div class="weapon-skills"><div class="weapon-skills__title section-title">Навыки владения оружием</div>
							<div class="weapon-skill weapon-skill--m4">
								<svg xmlns="http://www.w3.org/2000/svg" class="weapon-skill__graph">
									<circle cx="62.5" cy="62.5" r="62.5" fill="#6278c6"></circle><circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10"></circle>
									<circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10" class="weapon-skill__graph-value" style="stroke-dashoffset: <?php echo 365-($account['M4_Skill']*365/10000); ?>;"></circle>
								</svg>
								<div class="weapon-skill__icon"></div>
								<div class="weapon-skill__value"><?php echo $account['M4_Skill']/100; ?>%</div>
							</div>
							<div class="weapon-skill weapon-skill--ak47">
								<svg xmlns="http://www.w3.org/2000/svg" class="weapon-skill__graph">
									<circle cx="62.5" cy="62.5" r="62.5" fill="#6278c6"></circle><circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10"></circle>
									<circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10" class="weapon-skill__graph-value" style="stroke-dashoffset: <?php echo 365-($account['AK47_Skill']*365/10000); ?>;"></circle>
								</svg>
								<div class="weapon-skill__icon"></div>
								<div class="weapon-skill__value"><?php echo $account['AK47_Skill']/100; ?>%</div>
							</div>
							<div class="weapon-skill weapon-skill--pistol">
								<svg xmlns="http://www.w3.org/2000/svg" class="weapon-skill__graph">
									<circle cx="62.5" cy="62.5" r="62.5" fill="#6278c6"></circle><circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10"></circle>
									<circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10" class="weapon-skill__graph-value" style="stroke-dashoffset: <?php echo 365-($account['Pistol_Skill']*365/10000); ?>;"></circle>
								</svg>
								<div class="weapon-skill__icon"></div>
								<div class="weapon-skill__value"><?php echo $account['Pistol_Skill']/100; ?>%</div>
							</div>
							
							<div class="weapon-skill weapon-skill--sdpistol">
								<svg xmlns="http://www.w3.org/2000/svg" class="weapon-skill__graph">
									<circle cx="62.5" cy="62.5" r="62.5" fill="#6278c6"></circle><circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10"></circle>
									<circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10" class="weapon-skill__graph-value" style="stroke-dashoffset: <?php echo 365-($account['SDPistol_Skill']*365/10000); ?>;"></circle>
								</svg>
								<div class="weapon-skill__icon"></div>
								<div class="weapon-skill__value"><?php echo $account['SDPistol_Skill']/100; ?>%</div>
							</div>
							<div class="weapon-skill weapon-skill--deagle">
								<svg xmlns="http://www.w3.org/2000/svg" class="weapon-skill__graph">
									<circle cx="62.5" cy="62.5" r="62.5" fill="#6278c6"></circle><circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10"></circle>
										<circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10" class="weapon-skill__graph-value" style="stroke-dashoffset: <?php echo 365-($account['Eagle_Skill']*365/10000); ?>;"></circle>
									</svg>
									<div class="weapon-skill__icon"></div>
								<div class="weapon-skill__value"><?php echo $account['Eagle_Skill']/100; ?>%</div>
							</div>
							<div class="weapon-skill weapon-skill--shotgun">
								<svg xmlns="http://www.w3.org/2000/svg" class="weapon-skill__graph">
										<circle cx="62.5" cy="62.5" r="62.5" fill="#6278c6"></circle><circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10"></circle>
										<circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10" class="weapon-skill__graph-value" style="stroke-dashoffset: <?php echo 365-($account['ShotGun_Skill']*365/10000); ?>;"></circle>
									</svg>
								<div class="weapon-skill__icon"></div>
								<div class="weapon-skill__value"><?php echo $account['ShotGun_Skill']/100; ?>%</div>
							</div>
							<div class="weapon-skill weapon-skill--mp5">
								<svg xmlns="http://www.w3.org/2000/svg" class="weapon-skill__graph">
									<circle cx="62.5" cy="62.5" r="62.5" fill="#6278c6"></circle><circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10"></circle>
									<circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10" class="weapon-skill__graph-value" style="stroke-dashoffset: <?php echo 365-($account['MP5_Skill']*365/10000); ?>;"></circle>
								</svg>
								<div class="weapon-skill__icon"></div>
								<div class="weapon-skill__value"><?php echo $account['MP5_Skill']/100; ?>%</div>
							</div>
							<div class="weapon-skill weapon-skill--sniper">
								<svg xmlns="http://www.w3.org/2000/svg" class="weapon-skill__graph">
									<circle cx="62.5" cy="62.5" r="62.5" fill="#6278c6"></circle><circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10"></circle>
									<circle cx="62.5" cy="62.5" r="58" fill="none" stroke="#222a4d" stroke-width="10" class="weapon-skill__graph-value" style="stroke-dashoffset: <?php echo 365-($account['Sniper_Skill']*365/10000); ?>;"></circle>
								</svg>
								<div class="weapon-skill__icon"></div>
								<div class="weapon-skill__value"><?php echo $account['Sniper_Skill']/100; ?>%</div>
							</div>
						</div>
				
						<div class="fstyles-skills">
							<div class="fight-styles"><div class="fight-styles__title section-title">Стили боя</div>
							<div class="fight-style"><div class="fight-style__label"><img src="/public/img/profile/boxing.svg"></div><div class="fight-style__desc">Боксерский стиль</div><?php if($account['BoxingStyle'] != 0) echo '<div class="fight-style__status active">Изучен</div>'; else echo '<div class="fight-style__status">Не изучен</div>'?></div>
							<div class="fight-style"><div class="fight-style__label"><img src="/public/img/profile/kungfu.svg"></div><div class="fight-style__desc">Стиль кунг-фу</div><?php if($account['KungfuStyle'] != 0) echo '<div class="fight-style__status active">Изучен</div>'; else echo '<div class="fight-style__status">Не изучен</div>'?></div>
							<div class="fight-style"><div class="fight-style__label"><img src="/public/img/profile/kneehead.svg"></div><div class="fight-style__desc">Кикбоксерский стиль</div><?php if($account['KneeheadStyle'] != 0) echo '<div class="fight-style__status active">Изучен</div>'; else echo '<div class="fight-style__status">Не изучен</div>'?></div>
							<div class="fight-style"><div class="fight-style__label"><img src="/public/img/profile/grabkick.svg"></div><div class="fight-style__desc">Удар ногой</div><?php if($account['Style'] != 0) echo '<div class="fight-style__status active">Изучен</div>'; else echo '<div class="fight-style__status">Не изучен</div>'?></div>
							<div class="fight-style"><div class="fight-style__label"><img src="/public/img/profile/elbow.svg"></div><div class="fight-style__desc">Захваты и удары</div><?php if($account['ElbowStyle'] != 0) echo '<div class="fight-style__status active">Изучен</div>'; else echo '<div class="fight-style__status">Не изучен</div>'?></div>
							</div>
							<div class="skills"><div class="skills__title section-title">Другие навыки</div>
							<div class="skill"><div class="skill__icon"><img src="/public/img/profile/carSkill.png" alt="" class="skill__icon-image"></div><div class="skill__label">Навык вождения</div><div class="skill__value"><?php echo $account['CarSkill']; ?> очков</div></div>
							<div class="skill"><div class="skill__icon"><img src="/public/img/profile/dSkill.png" alt="" class="skill__icon-image"></div><div class="skill__label">Навык дальнобойщика</div><div class="skill__value"><?php echo $account['CarSkill']; ?> очков</div></div>
							<div class="skill"><div class="skill__icon"><img src="/public/img/profile/taxiSkill.png" alt="" class="skill__icon-image"></div><div class="skill__label">Навык<br>таксиста</div><div class="skill__value"><?php echo $account['CarSkill']; ?> очков</div></div>
							<div class="skill"><div class="skill__icon"><img src="/public/img/profile/productJobSkill.png" alt="" class="skill__icon-image"></div><div class="skill__label">Развозчик продуктов</div><div class="skill__value"><?php echo $account['CarSkill']; ?> очков</div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>