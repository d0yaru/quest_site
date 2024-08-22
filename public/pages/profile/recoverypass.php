<?
    if(!defined("Arizona")) return require_once '../../../public/pages/404.php';
?>
<div class="layout__content">
	<div class="recovery-password">
		<div class="recovery-password__content">
			<div style="display: flex; justify-content: center;">
				<div class="restore-password">
					<div class="ask">?</div>
					<div class="title">Не можете войти?</div>
					<div class="subtitle">Введите ваш E-Mail. Мы вышлем инструкции по восстановлению пароля.</div>
					<form id="recovery-form"method="POST" role="form">
						<div class="input-group">
							<div class="input input--blue">
								<label for="email" class="input__label">E-Mail</label>
								<div class="input__row"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input__icon">
									<path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
									<input id="email" name="email" placeholder="E-Mail" class="input__element">
								</div>
								<div id="error-input-email" class="input__error"></div>
							</div>
							<div class="input input--blue">
								<label for="serverId2" class="input__label">Сервер</label>
								<div class="input__row"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input__icon">
									<path d="M444.52 3.52L28.74 195.42c-47.97 22.39-31.98 92.75 19.19 92.75h175.91v175.91c0 51.17 70.36 67.17 92.75 19.19l191.9-415.78c15.99-38.39-25.59-79.97-63.97-63.97z"></path></svg>
									<select id="serverId2" name="serverId2" class="input__element">
										<option value="0">Игровой сервер</option>
										<?	for ($x=0; $x<$rows; $x++) echo '<option value='.$serverid[$x].'>'.$servername[$x].'</option>'; ?>							
									</select>
								</div>	
								<div id="error-input-server" class="input__error"></div>
							</div>
							<button type="submit" class="btn btn--red btn--login" style="margin-left: auto; margin-right: auto;">Восстановить</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>