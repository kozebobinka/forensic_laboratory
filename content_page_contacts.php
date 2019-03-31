<div class="bg-light-beige content-page pb-5">
	<div class="container">
		<div class="row">
			<div class="d-block d-md-none col-12 back-one-level">
				<a class="a-nounderline" href="<?=$url?>">
					<i class="fa fa-caret-left" aria-hidden="true"></i>&ensp;<?=$back_main?>
				</a>
			</div>
			<div class="col-12 col-md-4 order-2 order-md-1">
				<h3><?=$text_page['parent_name']?></h3>
				<div class="left-links">
					<? foreach ($submenu[$text_page['parent_id']] as $smenu) :?>
					<p><a class="a-nounderline <?=($text_page['menu_id'] == $smenu['id']) ? 'a-light' : ''?>" href="/<?=$smenu['link']?>"><?=$smenu['name']?></a></p>
					<? endforeach ?>
				</div>
				<div class="back-one-level d-none d-md-block">
					<a class="a-nounderline" href="<?=$url?>">
						<i class="fa fa-caret-left" aria-hidden="true"></i>&ensp;<?=$back_main?>
					</a>
				</div>
			</div>
			<div class="col-12 col-md-8 order-1 order-md-2">
				<h2 class="mb-4"><?=$text_page['title']?></h2>
				<div class="contact-text">
					<p><?=$contacts1?></p>
					<h4><?=$contacts2?></h4>
					<table>
						<tr>
							<td class="contact-abbr"><?=$contacts3?></td>
							<td class="contact-number"><?=$ogrn?></td>
						</tr>
						<tr>
							<td class="contact-abbr"><?=$contacts4?></td>
							<td class="contact-number"><?=$inn_kpp?></td>
						</tr>
					</table>
					<p><?=$contacts5?></p>
					<div class="mt-4"></div>
					<p><?=$req_phone?>: <strong><a class="contact-phone" href="tel:<?=$phone?>"><?=$phone?></a></strong></p>
					<p><?=$req_email?>: <a class="a-nounderline" href="mailto:<?=$email?>"><?=$email?></a></p>
					<p class="d-none d-md-block"><?=$contacts6_1?> <strong><?=$contacts7?></strong></p>
					<p class="d-block d-md-none"><?=$contacts6?> <?=mb_strtolower($contacts7)?></p>

					<hr>
					<div class="container px-0" id="order">
						<p class="pt-3 text-center"><?=$request1?></p>
						<p class="pb-4 text-center"><?=$request2?></p>
						<? include "request.php"; ?>
					</div>
					<hr>

					<h3 class="pt-3 text-center text-md-left"><?=$howtoget1?></h3>
					<h4 class="text-center text-md-left"><?=$howtoget2?></h4>
					<?=$howtoget3?>
					<h4 class="text-center text-md-left mt-36px"><?=$howtoget4?></h4>
					<?=$howtoget5?>
					<p class="mt-4 d-none d-md-block"><a href="<?=$url?>docs/Peritus_shema-proezda.jpg" download><?=$contacts8?></a></p>
					<div class="d-block d-md-none text-center py-4">
						<a href="<?=$url?>docs/Peritus_shema-proezda.jpg" download>
							<button class="btn"><?=$contacts8?></button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg-dark-green p-0">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2241.593426200689!2d37.65389185179789!3d55.81765849435972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b535daf49e2c9d%3A0x817d041ad8679d1c!2z0KDQsNC60LXRgtC90YvQuSDQsS3RgCwgMTYsINCc0L7RgdC60LLQsCwg0KDQvtGB0YHQuNGPLCAxMjk2MjY!5e0!3m2!1sru!2sua!4v1541157417078" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>