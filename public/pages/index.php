<!DOCTYPE html>
<html lang="ru-RU" class="no-webp">
<head>
	<title><? if(!empty($title)) echo $title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta data-hid="og:locale" name="og:locale" content="ru_RU">
	<meta data-hid="og:type" name="og:type" content="article">
	<meta data-hid="og:title" name="og:title" content="SAMP: Играть в GTA по сети - Arizona Role Play">
	<meta data-hid="og:image" name="og:image" content="//public/img/navbar-logo.png">
	<meta data-hid="og:site_name" name="og:site_name" content="Arizona RP SAMP">
	<meta data-hid="description" name="description" content="SAMP - это Arizona RP — Играй в GTA San Andreas по сети на компьютере или телефоне на самом большом сервере GTA SAMP!">
	<link data-n-head="ssr" rel="icon" type="image/x-icon" href="/favicon.ico">
	<link href="https://www.google-analytics.com" rel="preconnect">
	<script async="" src="https://www.google-analytics.com/analytics.js" charset="utf-8"></script>
	<script src="https://code.jquery.com/jquery-latest.min.js"></script>


	<link href="/public/css/style.css" rel="stylesheet" type="text/css">
	<?php if(!empty($css)) echo $css; ?>
</head>
<body class="<?php if(!empty($background)) echo $background; ?>">
	<div id="__nuxt">
		<div id="__layout">
			<div class="layout">
				<div class="vue-notification-group" style="width: 300px; top: 0; right: 0;"><span></span></div>
				<div class="layout__nav">
					<div id="navbar" class="navbar container">
						<a href="/" aria-current="page" class="navbar__logo nuxt-link-exact-active nuxt-link-active">
							<picture>
								<source srcset="/public/img/navbar-logo.png" type="image/png">
								<img src="/public/img/navbar-logo.png" alt="Arizona Roleplay" class="navbar__logo-image">
							</picture>
						</a>
						<nav class="navbar__nav nav nav--navbar">
							<ul class="nav__list">
								<li class="nav__list-item"><a href="/" aria-current="page" class="nav__link nuxt-link-exact-active nuxt-link-active">Главная</a></li>
								<li class="nav__list-item"><a href="/#launcher" class="nav__link">Как играть</a></li>
								<li class="nav__list-item"><a href="/posts" class="nav__link">Новости</a></li>
								<li class="nav__list-item"><a href="/" class="nav__link">Форум</a></li>
								<li class="nav__list-item"><a href="/shop" class="nav__link">Магазин</a></li>
							</ul>
						</nav>
								<div class="navbar__profile"><?php if(empty($_SESSION['account_id']) || $_SESSION['account_logged'] != 'try') echo '<a href="/login" class="btn btn--red btn--navbar">Войти</a>'; else echo '<a href="/profile" class="btn btn--red btn--navbar">Кабинет</a>';?></div>
								<button class="navbar__opener"></button>
						<div class="vm--container mobile__navi" style="display:none">
							<div data-modal="mobile-nav" aria-expanded="true" class="vm--overlay">
								<div class="vm--top-right-slot"></div>
							</div> 
							<div aria-expanded="true" role="dialog" aria-modal="true" class="vm--modal" style="background: transparent; box-shadow: unset; padding-top: 20px; top: 166px; left: 0px; height: 430px;">
								<nav class="navbar__mobile-nav nav nav--navbar">
									<?php if(empty($_SESSION['account_id']) || $_SESSION['account_logged'] != 'try') echo '<a href="/login" class="btn btn--red btn--navbar">Войти</a>'; else echo '<a href="/profile" class="btn btn--red btn--navbar">Кабинет</a>';?>
									<ul class="nav__list">
										<li class="nav__list-item"><a href="/" aria-current="page" class="nav__link nuxt-link-exact-active nuxt-link-active">Главная</a></li>
										<li class="nav__list-item"><a href="/#how-to-play" class="nav__link">Как играть</a></li>
										<li class="nav__list-item"><a href="/posts" class="nav__link">Новости</a></li>
										<li class="nav__list-item"><a href="/" class="nav__link">Форум</a></li>
										<li class="nav__list-item"><a href="/shop" class="nav__link">Магазин</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<?php require_once $page; ?>
				<div class="layout__footer">
					<footer id="footer" class="footer">
						<div class="footer__wrapper container">
							<div>
								<div class="footer__copy">Professional Gaming Solutions Limited © 2022</div>
								<div class="footer__copy-text">Palliser House, Palliser Road, London, UK, W149EB</div>
								<div class="footer__docs">
									<a href="/document/terms" class="footer__link">Пользовательское соглашение</a>
									<a href="/document/policy" class="footer__link">Политика конфиденциальности</a>
									<a href="mailto:<?php echo $config['email_name'];?>" target="_blank" class="footer__link"><?php echo $config['email_name'];?></a>
								</div>
								<!-- <div class="footer__projects"><a href="/" target="_blank" class="footer__link">CRMP: Rodina Role Play</a>
									<a href="/" target="_blank" class="footer__link">SAMP: Жизнь в деревне</a>
								</div> -->
							</div>
						<div class="footer__menu">
							<div class="footer__links">
								<a href="/" aria-current="page" class="footer__link nuxt-link-exact-active nuxt-link-active">Главная</a>
								<a href="/#how-to-play" class="footer__link">Как начать игру</a>
								<a href="/" target="_blank" class="footer__link">Форум</a>
								<a href="/shop" class="footer__link">Магазин</a><a href="/profile" class="footer__link">Личный кабинет</a>
							</div>
						</div>
						<div class="footer__menu">
							<div class="footer__links">
								<a href="/servers" class="footer__link">Наши сервера</a>
								<!-- <a href="/about-us" class="footer__link">О нас</a> -->
								<a href="<?php echo $config['url_group_vk'];?>" target="_blank" class="footer__link">Сообщество ВКонтакте</a>
								<a href="/" target="_blank" class="footer__link">YouTube канал</a>
								<a href="/" target="_blank" class="footer__link">Канал в Telegram</a>
							</div>
						</div>
						<div class="footer__contacts"><img src="/public/img/visa-secure-white.png" alt="VISA Secure">
							<img src="/public/img/visa-white.png" alt="VISA">
							<img src="/public/img/mastercard-white.png" alt="Mastercard ID Check">
							<img src="/public/img/mc-45px.png" alt="Mastercard">
						</div>
						<div class="footer__up-container"><button class="footer__up"></button></div>
						</div>
					</footer>
				</div>
			</div>	
		</div>
	</div>
	<script src='https://code.jquery.com/jquery-latest.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lory.js/2.5.3/jquery.lory.min.js" integrity="sha512-JP+KOfqT3/ruE/YbanwE4IwXuOmXjRHrjdbPJFCEfsjDuWe7VthRLfqROjFSAVK7i7x3odYIHg1mIRnmg6DjsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src='/public/js/jquery.min.js'></script>
</body>
	<?php if(!empty($script)) echo $script; ?>
</html>