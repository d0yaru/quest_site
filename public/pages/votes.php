<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>

<div class="rates container">
	<div itemscope="itemscope" itemtype="http://schema.org/Product" class="rates_wrapper">
		<span itemprop="name" class="rates_name">Сервера SAMP</span> 
		<div class="rates_default">
			<div class="rates_current" data-rate="<?php echo $allpoints;?>" style="width: <?php echo ($rating_site*100)/5;?>%"></div> 
			<span class="<?php echo $rate_class;?>"><a data-rate="1" title="1/5" rel="nofollow" style="width: 20%; z-index: 16;">1</a></span> 
			<span class="<?php echo $rate_class;?>"><a data-rate="2" title="2/5" rel="nofollow" style="width: 40%; z-index: 15;">2</a></span> 
			<span class="<?php echo $rate_class;?>"><a data-rate="3" title="3/5" rel="nofollow" style="width: 60%; z-index: 14;">3</a></span> 
			<span class="<?php echo $rate_class;?>"><a data-rate="4" title="4/5" rel="nofollow" style="width: 80%; z-index: 13;">4</a></span> 
			<span class="<?php echo $rate_class;?>"><a data-rate="5" title="5/5" rel="nofollow" style="width: 100%; z-index: 12;">5</a></span>
		</div>
		<span itemprop="aggregateRating" itemscope="itemscope" itemtype="http://schema.org/AggregateRating" class="aggregateRating">
			<span itemprop="ratingValue" class="rating"><?php echo $rating_site;?></span>
			<span>/</span> <span itemprop="reviewCount" class="totalvotes"><?php echo number_format($allvotes, 0, '', ' ');?></span>
		</span>
	</div>
</div>