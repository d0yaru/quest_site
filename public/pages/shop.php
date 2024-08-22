<?
    if(!defined("Arizona")) return require_once '../../../public/pages/404.php';
?>
<div class="layout__content">
	<div class="shop-page">
		<div class="container">
			<h1 class="shop-title">Донат <?php echo $config['nameproject'];?> Role Play</h1>
			<div class="form">
				<form id="donate" method="POST" role="form">
					<div class="input-group">
						<div class="input input--blue">
							<label for="username" class="input__label">Никнейм</label>
							<div class="input__row">
								<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512" class="input__icon">
									<path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
								</svg>
								<input id="username" name="username" placeholder="Игровой ник" maxlength="25" class="input__element">
							</div>
							<div id="error-input-username" class="input__error"></div>
						</div>
						<div class="input input--blue">
						<label for="serverId" class="input__label">Сервер</label>
							<div class="input__row"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input__icon"><path d="M444.52 3.52L28.74 195.42c-47.97 22.39-31.98 92.75 19.19 92.75h175.91v175.91c0 51.17 70.36 67.17 92.75 19.19l191.9-415.78c15.99-38.39-25.59-79.97-63.97-63.97z"></path></svg>
								<select id="serverId" name="serverId" class="input__element" style="color: rgba(255, 255, 255, 0.3);">
									<option value='0'>Игровой сервер</option>
									<?	for ($x=0; $x<$rows; $x++) echo '<option value='.$serverid[$x].'>'.$servername[$x].'</option>'; ?>
								</select>
							</div>
							<div id="error-input-serverId" class="input__error"></div>
						</div>
						<div class="input input--blue">
							<label for="sum" class="input__label">Сумма</label>
							<div class="input__row">
								<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512" class="input__icon">
									<path d="M0 405.3V448c0 35.3 86 64 192 64s192-28.7 192-64v-42.7C342.7 434.4 267.2 448 192 448S41.3 434.4 0 405.3zM320 128c106 0 192-28.7 192-64S426 0 320 0 128 28.7 128 64s86 64 192 64zM0 300.4V352c0 35.3 86 64 192 64s192-28.7 192-64v-51.6c-41.3 34-116.9 51.6-192 51.6S41.3 334.4 0 300.4zm416 11c57.3-11.1 96-31.7 96-55.4v-42.7c-23.2 16.4-57.3 27.6-96 34.5v63.6zM192 160C86 160 0 195.8 0 240s86 80 192 80 192-35.8 192-80-86-80-192-80zm219.3 56.3c60-10.8 100.7-32 100.7-56.3v-42.7c-35.5 25.1-96.5 38.6-160.7 41.8 29.5 14.3 51.2 33.5 60 57.2z"></path>
								</svg>
								<input id="sum" name="sum" placeholder="Сумма" type="number" class="input__element">
							</div>
							<div id="error-input-sum" class="input__error"></div>
						</div>
					</div>
					<div class="calculator">
						<div class="calculator__title">Калькулятор</div>
						<div class="calculator__input">
							<div class="calculator__input-desc">Заплатите</div>
							<div class="calculator__value counter_give">0<span>руб</span></div>
						</div>
						<div class="calculator__output">
							<div class="calculator__input-desc">Получите</div>
							<div class="calculator__value counter_get">0<span>az</span></div>
						</div>
					</div>
					<div class="shop-button-container"><button type="submit" class="shop-button">Оплатить</button></div>
				</form>
				<div class="render"></div>
			</div>
		</div>
		
		<script>
			$('#sum').keyup(function () {
				let sum = $(this).val();
				if(sum < 0) sum = 0;
				if(sum > 50000) sum = 50000;
				
				$('.counter_give').html(sum+'<span>руб</span>');
				$('.counter_get').html(sum*<?php echo $config['donat_x']?>+'<span>az</span>');
			});
			</script>
		<?php if($config['donat_specials'] != 0) echo '<div class="shop-title">Специальные предложения</div>
		<div class="specials">
			<div class="specials__items container">
				'.$specials.'
			</div>
		</div>';
		?>

		<div class="packets">
			<div class="packets__wrapper container" style="justify-content: flex-start;">
				<?php echo $content;?>
			</div>
		</div>
	</div>
</div>