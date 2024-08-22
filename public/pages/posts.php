<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>

<div class="posts">
	<h1 data-shadow="Новости" class="title block-title block-title--with-shadow">Новости</h1>
	<div class="posts__wrapper container">
		<?php echo $bignews; ?>
		<?php echo $content; ?>
	</div>
</div>
<div class="breadcrumbs">
	<div class="breadcrumbs__wrapper container">
		<ul itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs__list">
			<li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
				<a href="/" class="nuxt-link-active" itemprop="item"><span itemprop="name">SAMP</span></a> <meta itemprop="position" content="1">
			</li>
			<li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
				<a href="/posts" aria-current="page" class="nuxt-link-exact-active nuxt-link-active" itemprop="item"></a> <span itemprop="name">Новости</span> <meta itemprop="position" content="2">
			</li>
			<?php echo $listelements; ?>
		</ul>
	</div>
</div>
<?php require_once('public/pages/votes.php');?>


