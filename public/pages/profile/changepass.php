<?
    if(!defined("Arizona")) return require_once '../../../public/pages/404.php';
?>

<div class="layout">
	<div class="vue-notification-group" style="width:300px;top:0;right:0"><span></span></div> 
	<div class="layout__content">
		<div class="change-password flex-centered">
			<div class="change-password__title title block-title">Смена пароля</div> 
			<div class="change-password">
				<form data-id="<?=$_SESSION['server'];?>" id="change-pass" method="POST" role="form">
					<div class="input-group">
						<div class="input input--blue">
							<label for="currentPassword" class="input__label">Текущий пароль</label>
							<div class="input__row">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input__icon"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path></svg> 
								<input id="currentPassword" type="password" name="oldpass" placeholder="Текущий пароль" class="input__element">
							</div>
							<div id="error-input-oldpass" class="input__error"></div>
						</div> 
						<div class="input input--blue">
							<label for="newPassword" class="input__label">Новый пароль</label>
							<div class="input__row">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input__icon"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path></svg> 
								<input id="newPassword" type="password" name="newpass" placeholder="Новый пароль" class="input__element">
							</div>
							<div id="error-input-newpass" class="input__error"></div>
						</div> 
							<div class="input input--blue">
							<label for="newPassword" class="input__label">Новый пароль еще раз</label> 
							<div class="input__row">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input__icon"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path></svg>
								<input id="newPasswordCompare" type="password" name="confirmpass" placeholder="Новый пароль еще раз" class="input__element">
							</div>
							<div id="error-input-comparepass" class="input__error"></div>
						</div>
					</div> 
					<div style="text-align: center;">
						<button type="submit" class="btn btn--red btn--change">Изменить</button>
					</div>
				</form>
			</div>			
		</div>
	</div>
</div>
