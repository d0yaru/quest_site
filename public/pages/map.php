<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>

<div id="layout__content">
	<div class="map container">
		<p class="map__title">Карта штата <?php echo $namemap; ?></p>
		<div class="map__mobile-help">Используйте горизонтальный скролл, чтобы просматривать карту полностью.</div>
			<div class="map__scroll">
				<div class="map__container"><?php echo $content; ?></div>
			</div>
	</div>
</div>
<div class="breadcrumbs"><div class="breadcrumbs__wrapper container">
	<ul itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs__list">
	<li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem"><a href="/" class="nuxt-link-active" itemprop="item"><span itemprop="name">SAMP</span>
	</a> <meta itemprop="position" content="1"></li><li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
	<a href="/servers" aria-current="page" class="nuxt-link-exact-active nuxt-link-active" itemprop="item"></a> <span itemprop="name">Карта штата <?php echo $namemap; ?></span> 
	<meta itemprop="position" content="2"></li></ul></div>
</div> 
<?php require_once('public/pages/votes.php');?>