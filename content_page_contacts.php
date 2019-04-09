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