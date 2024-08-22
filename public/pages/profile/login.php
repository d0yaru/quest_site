<?
    if(!defined("Arizona")) return require_once '../../../public/pages/404.php';
?>
<body class="login">
    <div class="layout__content"><div class="login-page">
		<h1 class="login-page__title">Авторизация</h1>
		<div class="login-page-render"></div>
			<div class="login-page-form">
				<form id="login-form" method="POST" role="form">
					<div class="input-group">
						<div class="input input--blue"><label for="username" class="input__label">Никнейм</label>
							<div class="input__row"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input__icon"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
								<input id="username-error" name="username" placeholder="Игровой ник" class="input__element">
							</div>
							<div id="error-input-username" class="input__error"></div>
						</div>
						<div class="input input--blue"><label for="password" class="input__label">Пароль</label>
							<div class="input__row"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input__icon"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path></svg>
								<input id="password-error" type="password" placeholder="Пароль" name="password" class="input__element">
							</div>
							<div id="error-input-password" class="input__error"></div>
						</div>
						<div class="input input--blue"><label for="serverId" class="input__label">Сервер</label>
							<div class="input__row"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input__icon"><path d="M444.52 3.52L28.74 195.42c-47.97 22.39-31.98 92.75 19.19 92.75h175.91v175.91c0 51.17 70.36 67.17 92.75 19.19l191.9-415.78c15.99-38.39-25.59-79.97-63.97-63.97z"></path></svg>
								<select id="serverId-error" name="serverId" class="input__element">
									<option value="0">Игровой сервер</option>
									<?	for ($x=0; $x<$rows; $x++) echo '<option value='.$serverid[$x].'>'.$servername[$x].'</option>'; ?>
								</select>
							</div>
							<div id="error-input-server" class="input__error"></div>
						</div>
					</div>
						
			</div>	
			<div class="login-page-buttons">
				<button type="submit" class="btn btn--red btn--login">Войти
					
				</button>
				</form>
				<button style="color: white;">Войти через ВКонтакте</button>
				<a href="/recovery-password" class="" style="cursor: pointer;">Я забыл пароль</a>
			</div>
		</div>
	</div>
</body>