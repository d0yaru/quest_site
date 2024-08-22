<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>
<div class="layout__content">
	<div class="fractions container">
		<div class="fractions__title"><? echo $fractions__title;?></div> 
		<div class="fractions__list">
			<? echo $cont; ?>
		</div>
		<table class="rating__list rating-list">
			<? echo $content; ?>
		</table>
	</div>
</div>