<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>

<div class="layout__content">
	<div class="rating container">
		<div class="rating__title">Панель управления</div>
		<div class="rating__type-list link-list">
			<span>//</span> <a href="/panel/news" class="">Управление новостями</a>
			<span>//</span> <a href="/panel/servers" class="">Управление серверами</a>
			<span>//</span> <a href="/panel/commends" class="">Управление комментариями</a>
			<span>//</span> <a href="/panel/shop" class="">Управление товарами</a>
		</div> 
		<div class="divider-line"></div>
		<table class="rating__list rating-list"></table>
		<span class="botton"></span>
	</div>
</div>

<div class="backpopup" style="display:none;"></div>
<div class="popup-window" style="display:none;">
	<p class="close"></p>	
	<span class="textarea"></span>
	<a class="btn btn--red btn--navbar savetext">Сохранить</a>
</div>
<script>
	$(document).on('click', 'div.link-list > a', function (e) {
		e.preventDefault();
		var href = $(this).attr('href');
		window.history.pushState('', '', href);
		$('div.link-list a').removeClass('nuxt-link-exact-active nuxt-link-active');
		$(this).addClass('nuxt-link-exact-active nuxt-link-active');
		var pathArray = window.location.pathname.split( '/' );
		$.ajax({ 
			type: "POST",
			url:"/engine/settings.php",
			data: "href="+href,
			success: function(data){
				data = $.parseJSON(data);
				switch(data.status) {
					case 'success':
					{
						$('table.rating-list').html(data.content);
						$('table').attr('data-table', pathArray[2]);
						$('span.botton').html(data.botton);
						if(pathArray[2] === 'commends') $('span.botton').html('');
						break;
					}
				}
			}
		 });
	});
	
</script>
