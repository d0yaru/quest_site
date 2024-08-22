<?
    if(!defined("Arizona")) return require_once '../../public/pages/404.php';
?>
<div class="layout__content">
	<div class="rating container">
		<div class="rating__title">Самые старые игроки</div>
		<div class="rating__type-list link-list"></div> 
		<div class="divider-line"></div> 
		<div class="rating__server-list link-list"><? echo $cont; ?></div> 
		<table class="rating__list rating-list"></table>
	</div>
</div>
<script>

$(document).ready(function(){
	
		//рейтинг без перезагрузки страницы
		var pathArray = window.location.pathname.split( '/' );
		//$('div.rating__type-list a[href*="'+pathArray[2]+'"]').addClass('nuxt-link-exact-active nuxt-link-active');
		$('a[href*="'+pathArray[3]+'"]').addClass('nuxt-link-exact-active nuxt-link-active');
		$('div.rating__type-list').html('<span>//</span> <a href="/rating/oldest-players/'+pathArray[3]+'" class="">Самые старые игроки</a><span>//</span> <a href="/rating/richest-players/'+pathArray[3]+'" class="">Самые богатые игроки</a><span>//</span> <a href="/rating/most-expensive-houses/'+pathArray[3]+'" class="">Самые дорогие дома</a><span>//</span> <a href="/rating/most-expensive-businesses/'+pathArray[3]+'" class="">Самые дорогие бизнесы</a>');
		
		$(document).on('click', 'div.rating__server-list > a', function (e) {
			e.preventDefault();
			var href = $(this).attr('href');
			var server = $(this).text();
			window.history.pushState('', '', href);
			$('div.rating__server-list a').removeClass('nuxt-link-exact-active nuxt-link-active');
			$(this).addClass('nuxt-link-exact-active nuxt-link-active');
			var pathArray = window.location.pathname.split( '/' );
			$('div.rating__type-list').html('<span>//</span> <a href="/rating/oldest-players/'+pathArray[3]+'" class="">Самые старые игроки</a><span>//</span> <a href="/rating/richest-players/'+pathArray[3]+'" class="">Самые богатые игроки</a><span>//</span> <a href="/rating/most-expensive-houses/'+pathArray[3]+'" class="">Самые дорогие дома</a><span>//</span> <a href="/rating/most-expensive-businesses/'+pathArray[3]+'" class="">Самые дорогие бизнесы</a>');
			$('div.rating__type-list a[href*="'+pathArray[2]+'"]').addClass('nuxt-link-exact-active nuxt-link-active');
			$.ajax({ 
				type: "POST",
				url:"/engine/rating.ajax.php",
				data: "type="+pathArray[2]+"&serverId="+pathArray[3],
				success: function(data){
					data = $.parseJSON(data);
					switch(data.status) {
						case 'success':
						{
							$('table.rating-list').html(data.content);
							break;
						}
					}
				}
			 });
		});

		$(document).on('click', 'div.rating__type-list > a', function (e) {
			e.preventDefault();
			var href = $(this).attr('href');
			var type = $(this).text();
			window.history.pushState('', '', href);
			$('div.rating__title').html(type);
			$('div.rating__type-list a').removeClass('nuxt-link-exact-active nuxt-link-active');
			$(this).addClass('nuxt-link-exact-active nuxt-link-active');
			var pathArray = window.location.pathname.split( '/' );
			$.ajax({ 
				type: "POST",
				url:"/engine/rating.ajax.php",
				data: "type="+pathArray[2]+"&serverId="+pathArray[3],
				success: function(data){
					data = $.parseJSON(data);
					switch(data.status) {
						case 'success':
						{
							$('table.rating-list').html(data.content);
							break;
						}
					}
				}
			 });
		});
		
	});
</script>