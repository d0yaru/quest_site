<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>
<div class="layout__content">
	<div>
		<div class="slider slider--homepage">
			<div class="slider__wrapper container lory-slider">
				<div class="lory-frame">
					<div class="lory-slides">
						<div class="lory-slide active">
							<div class="slider__slide slide" style="white-space: normal;">
								<div class="slide__title">Займи верхушку криминального мира</div>
								<div class="slide__subtitle-container"><div class="slide__subtitle">В SAMP ты можешь стать кем захочешь, нет времени на размышления всё в твоих руках!</div></div>
								<picture class="slide__picture">
									<img src="/public/img/slide-1.png" alt="Arizona Roleplay: Займи верхушку криминального мира" draggable="false" class="slide__image">
								</picture>
								<div class="slide__action">
									<button class="btn btn--hp-slider">Начать играть</button>
									<div class="hp-slider-line">
										<div class="line"></div>
										<div class="circle"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="lory-slide">
							<div class="slider__slide slide" style="white-space: normal;">
								<div class="slide__title">Начни свою жизнь с полного нуля</div>
								<div class="slide__subtitle-container"><div class="slide__subtitle">В SAMP ты можешь стать кем захочешь, нет времени на размышления всё в твоих руках!</div></div>
								<picture class="slide__picture">
									<img src="/public/img/slide-2.png" alt="Arizona Roleplay: Начни свою жизнь с полного нуля" draggable="false" class="slide__image">
								</picture>
								<div class="slide__action">
									<button class="btn btn--hp-slider">Начать играть</button>
									<div class="hp-slider-line">
										<div class="line"></div>
										<div class="circle"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="lory-slide">
							<div class="slider__slide slide" style="white-space: normal;">
								<div class="slide__title">Строй личную жизнь в виртуальном мире</div>
								<div class="slide__subtitle-container"><div class="slide__subtitle">В SAMP ты можешь стать кем захочешь, нет времени на размышления всё в твоих руках!</div></div>
								<picture class="slide__picture">
									<img src="/public/img/slide-4.png" alt="Arizona Roleplay: Строй личную жизнь в виртуальном мире" draggable="false" class="slide__image">
								</picture>
								<div class="slide__action">
									<button class="btn btn--hp-slider">Начать играть</button>
									<div class="hp-slider-line">
										<div class="line"></div>
										<div class="circle"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="lory-slide">
							<div class="slider__slide slide" style="white-space: normal;">
								<div class="slide__title">Сколоти огромное состояние на бизнесе</div>
								<div class="slide__subtitle-container"><div class="slide__subtitle">В SAMP ты можешь стать кем захочешь, нет времени на размышления всё в твоих руках!</div></div>
								<picture class="slide__picture">
									<img src="/public/img/slide-6.png" alt="Arizona Roleplay: Сколоти огромное состояние на бизнесе" draggable="false" class="slide__image">
								</picture>
								<div class="slide__action">
									<button class="btn btn--hp-slider">Начать играть</button>
									<div class="hp-slider-line">
										<div class="line"></div>
										<div class="circle"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="lory-slide">
							<div class="slider__slide slide" style="white-space: normal;">
								<div class="slide__title">Служи и охраняй свою родину от бандитов</div>
								<div class="slide__subtitle-container"><div class="slide__subtitle">В SAMP ты можешь стать кем захочешь, нет времени на размышления всё в твоих руках!</div></div>
								<picture class="slide__picture">
									<img src="/public/img/slide-5.png" alt="Arizona Roleplay: Служи и охраняй свою родину от бандитов" draggable="false" class="slide__image">
								</picture>
								<div class="slide__action">
									<button class="btn btn--hp-slider">Начать играть</button>
									<div class="hp-slider-line">
										<div class="line"></div>
										<div class="circle"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="lory-slide">
							<div class="slider__slide slide" style="white-space: normal;">
								<div class="slide__title">Выбивай долги и бери крышу с бизнесов</div>
								<div class="slide__subtitle-container"><div class="slide__subtitle">В SAMP ты можешь стать кем захочешь, нет времени на размышления всё в твоих руках!</div></div>
								<picture class="slide__picture">
									<img src="/public/img/slide-3.png" alt="Arizona Roleplay: Выбивай долги и бери крышу с бизнесов" draggable="false" class="slide__image">
								</picture>
								<div class="slide__action">
									<button class="btn btn--hp-slider">Начать играть</button>
									<div class="hp-slider-line">
										<div class="line"></div>
										<div class="circle"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-dots">
				<span class="active" data-to="1"></span>
				<span class="" data-to="2"></span>
				<span class="" data-to="3"></span>
				<span class="" data-to="4"></span>
				<span class="" data-to="5"></span>
				<span class="" data-to="6"></span>
			</div>
		</div>
		<h1 class="h1__title">Играй в GTA SA-MP по сети</h1>
		<? require_once('engine/servers.php'); ?>
		<div id="monitoring" class="monitoring">
			<div class="monitoring__title monitoring-title">
				<div class="monitoring-title__text">Мониторинг</div>
				<picture class="monitoring-title__picture">
					<source srcset="/public/img/monitoring-render-1.webp" type="image/png">
					<img src="/public/img/monitoring-render-1.webp" alt="Arizona Roleplay" class="monitoring-title__image">
				</picture>
			</div>
										<div class="monitoring__summary">
				<div class="monitoring__summary-value"><? echo $allonline; ?></div>
				<div class="monitoring__summary-title">Сейчас играет</div>
			</div>
			<div class="monitoring__servers container">
				<div class="monitoring__servers-container">
					<div class="monitoring__servers-wrap">
						<? echo $serversonline; ?>
					</div>
				</div>
			</div>
			<div class="open-all-servers"><a href="/servers">Показать все сервера</a></div>
		</div>
		<div id="present" class="present">
			<div class="present__wrapper">
				<button itemid="https://www.youtube.com/embed/jGod2jhDBoc" itemscope="itemscope" itemtype="https://schema.org/VideoObject" class="present__video present__video--1 present-video">
					<meta itemprop="duration" content="PT1M47S"> <meta itemprop="name" content="Arizona SAMP | Коротко и ясно!">
					<meta itemprop="thumbnailUrl" content="https://i.ytimg.com/vi/jGod2jhDBoc/maxresdefault.jpg"> <meta itemprop="contentUrl" content="https://www.youtube.com/embed/jGod2jhDBoc">
					<meta itemprop="uploadDate" content="2021-01-01T08:00:00+08:00">
					<div itemprop="author" itemscope="" itemtype="https://schema.org/Organization" style="display: none;">
						<div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
							<img itemprop="url image" src="/public/img/navbar-logo.c7f96c6.png" alt="SAMP: Arizona Roleplay" title="SAMP: Arizona Roleplay" style="display: none;">
						</div>
						<meta itemprop="name" content="SAMP: Arizona Roleplay"> <meta itemprop="url" content="https://arizona-games.ru/"> <meta itemprop="telephone" content="">
						<meta itemprop="address" content="Россия">
					</div>
					<div class="present-video__icon"></div>
					<div itemprop="description" class="present-video__title">Познакомтесь с нашим проектом за 5 минут</div>
				</button>
				<button itemid="https://www.youtube.com/embed/XWTQZsNYGa8" itemscope="itemscope" itemtype="https://schema.org/VideoObject" class="present__video present__video--2 present-video">
					<meta itemprop="duration" content="PT1M09S"> <meta itemprop="name" content="Как начать играть ARIZONA SAMP MOBILE или ARIZONA ROLE PLAY!">
					<meta itemprop="thumbnailUrl" content="https://i.ytimg.com/vi/XWTQZsNYGa8/maxresdefault.jpg"> <meta itemprop="contentUrl" content="https://www.youtube.com/embed/XWTQZsNYGa8">
					<meta itemprop="uploadDate" content="2021-01-01T08:00:00+08:00">
					<div itemprop="author" itemscope="" itemtype="https://schema.org/Organization" style="display: none;">
						<div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
							<img itemprop="url image" src="/public/img/navbar-logo.png" alt="SAMP: Arizona Roleplay" title="SAMP: Arizona Roleplay" style="display: none;">
						</div>
						<meta itemprop="name" content="SAMP: Arizona Roleplay"> <meta itemprop="url" content="https://arizona-games.ru/"> <meta itemprop="telephone" content="">
						<meta itemprop="address" content="Россия">
					</div>
					<div class="present-video__icon"></div>
					<div itemprop="description" class="present-video__title">Посмотрите, как начать игру</div>
				</button>
			</div>
		</div>
		<div id="launcher" class="launcher">
			<div itemscope="" itemtype="https://schema.org/HowTo" class="launcher__wrap container">
				<meta itemprop="totalTime" content="PT10M"> <meta itemprop="tool" content="Компьютер"> <meta itemprop="tool" content="ОС Windows"> <meta itemprop="supply" content="Доступ в интернет">
				<h2 data-shadow="Начать играть в SAMP стало еще проще!" itemprop="name" class="launcher__title">Начать играть в SAMP стало еще проще!</h2>
				<div>
					<div class="launcher__subtitle-container">
						<div class="launcher__subtitle">
							Никогда еще играть в самп не было так просто:
							<ul>
								<li itemprop="step" itemscope="" itemtype="https://schema.org/HowToStep">
									<meta itemprop="text" content="Скачать лаунчер"> <span itemprop="name">Загрузи лаунчер</span>, <meta itemprop="url" content="http://arizona-new.ru/samp-launcher">
									<img itemprop="image" src="/public/img/launcher-screen.png" style="display: none;">
								</li>
								<li itemprop="step" itemscope="" itemtype="https://schema.org/HowToStep">
									<meta itemprop="name" content="выбери любимую игру"> <span itemprop="text">выбери любимую игру</span>, <meta itemprop="url" content="http://arizona-new.ru/samp-launcher">
									<img itemprop="image" src="/public/img/launcher-screen.png" style="display: none;">
								</li>
								<li itemprop="step" itemscope="" itemtype="https://schema.org/HowToStep">
									<meta itemprop="name" content="начни играть"> <span itemprop="text">начни играть</span>! <meta itemprop="url" content="http://arizona-new.ru/samp-launcher">
									<img itemprop="image" src="/public/img/launcher-screen.png" style="display: none;">
								</li>
							</ul>
						</div>
					</div>
					<picture class="launcher__picture">
						 <source srcset="/public/img/launcher-screen.webp" type="image/webp" />
						<img src="/public/img/launcher-screen.png" alt="SAMP Лаунчер для игры в GTA San Andreas Online" class="launcher__image">
					</picture>
				</div>
				<div class="launcher__action">
					<a href="/" class="btn btn--red btn--launcher">Скачать SAMP </a>
					<span class="launcher__available">
						Доступно на
						<picture>
					<!--         <source
								srcset="
									data:image/webp;base64,
									UklGRh4BAABXRUJQVlA4WAoAAAAQAAAAHQAAHQAAQUxQSLkAAAAFcBvbtqqcr7i7u1tGsxQAMX24NEAL7s69/2NxREwANFZD4Xg2k/ewrKFwKpNJJwNgusORYsfdTjhBXiCSiEdTmWTMDDTEAZiLWUHC64I8Y5VB1WJh0wd/imQmKVPO2gxqVRlw0JQoQ6HBOfVAFE6QLgzsJQJK8gTMkyDqcl7ZKAV5xlngT7FBn3lcn1IolE5n08mgADQwYq3xVA6F46WWuxtVGaALl0AwlslkUjHrE82d4Ugqm01YAQBWUDggPgAAADADAJ0BKh4AHgA+MRiKQ6IhoRQEACADBLKAOwB+AABBlBAA/vIiX//5SrwWN0ef//mXnzLz5l5/ytAAAAAA
								"
								type="image/webp"
							/> -->
							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAABUElEQVRIie2XPUsDQRCGn7vEICGCaKExajQGv4qkE/zF+i9sbEQsRCy1sBPLEBEhKi/MyRJOsrebcIX3wkC4y8wzO5fMzSQ3gwELUgNoA1vALtAHDoBDYL0eyWw5wfctsKwH7AEbfzn6gNcscAc4Bi7t2gXQBVYDEh5l4I4FUUm2neyV9Q7QdJyugBQYBgB/JfAjcATUPH0+PCs1E3waGyREKtmoLHApqsD/A+z7/3WVRHJr6VRX8tGSWYyaaiBnBU/9ZCc+jwBPBL4r4CDgxD7fAt+hZIE/C574xPweQqFKPp3DDyVEicDjgo5fZjEaVy2zAi8UvFIW+KUMcN06UdusZ9Z3hvLNqSazPC/wuzV+2XXOfXcNUZJvNtA/2wzeCAGH7k6qgF4QWlFUEQ392foi00Kga1pxchU6mGdvpVez+5zvaLXJVh8loscn6wKtHxHiJ9FFuY6PAAAAAElFTkSuQmCC" alt="MS Windows">
						</picture>
					</span>
				</div>
				<div class="launcher__bonus">
					<img src="/public/img/bonus.png" alt=""><span>При использовании лаунчера, игроки с 8-го уровня будут получать 1 гражданскую монету каждый PAYDAY</span>
				</div>
			</div>
		</div>
		<div id="mobile-launcher" class="mobile-launcher">
			<div data-shadow="Играй на своем смартфоне" class="title block-title block-title--with-shadow">ИГРАЙ В SAMP НА ТЕЛЕФОНЕ</div>
				<div class="subtitle">
					Мы запустили наш SAMP MOBILE лаунчер для смартфонов на базе Android. Любой желающий может присоединиться к нам прямо сейчас. Для игры необходима версия ОС Android выше 7.0, Arizona Mobile доступна к скачиванию на нашем сайте и в Google Play
				</div>
			<div class="action"><a href="/" class="btn btn--red link">СКАЧАТЬ</a></div>
		</div>
		<div id="alt-launcher" class="alt-launcher">
			<div class="alt-launcher__wrap container">
				<div class="alt-launcher-header">
					<picture class="alt-launcher-header-icon__picture"><!-- 
						<source srcset="//public/img/home-altlaunch-icon.3ccfdfa.webp" type="image/webp" /> -->
						<img src="/public/img/home-altlaunch-icon.png" alt="Arizona Roleplay - альтернативный способ запуска" class="alt-launcher-header-icon__image">
					</picture>
					<div class="alt-launcher-header-right">
						<div class="alt-launcher-header-right-head">АЛЬТЕРНАТИВНЫЙ СПОСОБ</div>
						<div class="alt-launcher-header-right-text">
							Вы можете играть на нашем проекте на<br>
							стандартной версии GTA SA:MP
						</div>
					</div>
				</div>
				<div class="alt-launcher-steps">
					<div class="alt-launcher-step alt-launcher-step1">
						<img src="/public/img/home-altlaunch-gta-sa-icon.png" alt="Arizona Roleplay - альтернативный способ запуска - шаг 1" class="alt-launcher-step1__image">
						<p>Скачать и установить</p>
						<p class="main">GTA SA</p>
					</div>
					<div class="alt-launcher-step alt-launcher-step2">
						<img src="/public/img/home-altlaunch-icon.png" alt="Arizona Roleplay - альтернативный способ запуска - шаг 2" class="alt-launcher-step2__image">
						<p>Скачать и установить</p>
						<p class="main">SA:MP</p>
						<div class="action"><a href="https://files.sa-mp.com/sa-mp-0.3.7-R3-1-install.exe" class="btn btn--red link">Скачать</a></div>
					</div>
					<div class="alt-launcher-step alt-launcher-step3">
						<img src="/public/img/home-altlaunch-gta-sa-icon.png" alt="Arizona Roleplay - альтернативный способ запуска - шаг 3" class="alt-launcher-step3__image">
						<p>Выберите и подключитесь</p>
						<p class="main">К СЕРВЕРУ</p>
						<div class="action"><a href="/" class="btn btn--red link">Выбрать</a></div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="homepage-news">
			<div class="homepage-news__wrapper">
				<div class="posts">
					<h1 data-shadow="Новости" class="title block-title block-title--with-shadow">Новости</h1>
					<div class="posts__wrapper container">
						<?php echo $bignews;?>
						<?php echo $content;?>
					</div>
				</div>
				<div class="action"><a href="/posts" class="btn link">Больше новостей</a></div>
			</div>
		</div>
		<?php require_once $page_faq; ?>
	</div>
</div>
