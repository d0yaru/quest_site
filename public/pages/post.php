<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>

<div class="layout__content">
	<div class="post-view container">
		<h1 class="post-view__title"><?php echo $title_post; ?></h1>
		<div class="post-view__content">
			<?php echo $content; ?>
		</div>
		<div class="post-view__comments comments">
			<div class="comments__title">Комментарии</div> 
				<div class="comments__comments">
						<?php echo $cont; ?>
				</div> 
				<?php echo $input; ?>
		</div>
	</div>
	<div class="breadcrumbs">
		<div class="breadcrumbs__wrapper container">
			<ul itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs__list">
				<li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
					<a href="/" class="nuxt-link-active" itemprop="item"><span itemprop="name">SAMP</span></a> <meta itemprop="position" content="1">
				</li>
				<li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
					<a href="/posts" class="nuxt-link-active" itemprop="item"><span itemprop="name">Новости</span></a> <meta itemprop="position" content="1">
				</li>
				<?php echo $listitem; ?>
			</ul>
		</div>
	</div>
</div>





