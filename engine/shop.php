<?
	require_once('./engine/core/connect.php');
	
	$sql = "SELECT * FROM `shop` WHERE `status` != '0'";
	$result = $mysqli->query($sql);
	
	if($result->num_rows != 0) 
	{	
		while($shops = $result->fetch_assoc())
		{
			if($shops['packet_type'] == 3 && $config['donat_specials'] != 0)
			{
				$sale = $shops['price'] - ($shops['price'] * ( $config['donat_sale'] / 100 ));
				if($config['donat_sale'] != 0 ) $button_buy = '<button>Купить за <span>'.$sale.'руб</span></button><span>'.$shops['price'].'р</span>';
				else $button_buy = '<button>Купить за <span>'.$shops['price'].'руб</span></button>';
				$specials .= '<div class="special">
						<picture style="grid-row: span 6 / auto;">
							<img src="'.$shops['packet_url'].'" class="special__icon" />
						</picture>
						<div class="special__title">
							Набор<br />
							<span>«'.$shops['packet_name'].'»</span>
						</div>
						<div class="special__cash">'.number_format($shops['packet_sum'], 0, '.', '.').'$ <span>наличными</span></div>
						<div class="special__bonus special__bonus--gold">Premium <span>VIP</span></div>
						<div class="special__bonus">Premium <span>Maverick</span></div>
						<div class="special__bonus">Владение <span>4 домами и бизнесами</span></div>
						<div class="special__button pay-button" data-packet="'.$shops['id'].'">'.$button_buy.'</div>
					</div>';
			}
			else
			{
				$sale = $shops['price'] - ($shops['price'] * ( $config['donat_sale'] / 100 ));
				if($shops['packet_type'] == 1) $paket = 'packet--vip'; else if($shops['packet_type'] == 2) $paket = 'packet--admins'; else $paket = '';
				if($shops['packet_economy'] != 0 && $shops['packet_type'] == 0) $packet_economy = '<div class="packet__economy">Выгода <span>+'.number_format($shops['packet_economy'], 0, '.', '.').'$</span></div>'; else $packet_economy = '';
				if($shops['packet_sum'] != 0 && $shops['packet_type'] == 0) $packet_sum = '<div class="packet__sum">'.number_format($shops['packet_sum'], 0, '.', '.').'$<br><span>наличными</span></div>'; else $packet_sum = '';
				if($config['donat_sale'] != 0 ) $button_buy = '<button>Купить за <span>'.$sale.'руб</span></button><span>'.$shops['price'].'р</span>';
				else $button_buy = '<button>Купить за <span>'.$shops['price'].'руб</span></button>';
				
				$content .= '<div class="packet '.$paket.'">
						'.$packet_economy.'
						<picture><img src="'.$shops['packet_url'].'" class="packet__image"></picture>
						<div class="packet__name">'.$shops['packet_name'].'</div>
						'.$packet_sum.'
						<div class="packet__button pay-button" data-packet="'.$shops['id'].'">'.$button_buy.'</div>
					</div>';
			}
		}
		$result->close();
	}
?>