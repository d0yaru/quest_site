<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>
<div class="layout__content">
	<div class="all-servers">
		<h1>Серверы SAMP Arizona Role Play</h1> 
		<div class="all-servers__wrap">
			<? echo $serversonline; ?>
		</div>
	</div> 
</div>
<div class="breadcrumbs"><div class="breadcrumbs__wrapper container">
	<ul itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs__list">
	<li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem"><a href="/" class="nuxt-link-active" itemprop="item"><span itemprop="name">SAMP</span>
	</a> <meta itemprop="position" content="1"></li><li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
	<a href="/servers" aria-current="page" class="nuxt-link-exact-active nuxt-link-active" itemprop="item"></a> <span itemprop="name">Серверы ⏩ № ➊</span> 
	<meta itemprop="position" content="2"></li></ul></div>
</div> 
<?php require_once('public/pages/votes.php');?>