<nav class="navbar navbar-expand-md fixed-top peritus-width">
	<a class="navbar-brand" href="https://peritus.ru/"></a>
	<div class="navbar-info <?=($main_page) ? 'text-right mr-2' : 'text-center' ?> text-md-left">
		<div><a id="a-tel-<?=$site_id?>" class="navbar-phone" href="tel:<?=$phone?>"><?=$phone?></a></div>
		<div><a class="navbar-email" href="mailto:<?=$email?>"><?=$email?></a></div>
	</div>
	<? if (!$main_page) : ?>
	<div class="navbar-toggler collapsed text-center"  data-toggle="collapse" data-target="#top_buttons" aria-controls="top_buttons" aria-expanded="false" aria-label="Меню">
		<span class="navbar-toggler-icon"></span>
	</div>
	<div class="collapse navbar-collapse navbar-links" id="top_buttons">
		<ul class="navbar-nav d-none d-md-flex">
			<li class="nav-item <?=(isset($_GET['order_letter'])) ? 'active' : ''?>">
				<a class="px-0 a-white" href="<?=$url?>?order_letter"><?=$top_letter?></a>
			</li>
			<li class="nav-item <?=(isset($_GET['order_invoice'])) ? 'active' : ''?>">
				<a class="px-0 a-white" href="<?=$url?>?order_invoice"><?=$top_contract?></a>
			</li>
		</ul>
		<div class="d-flex d-md-none align-items-center justify-content-center flex-column fullscreen-buttons">				
			<a class="a-nounderline mb-4" href="<?=$url?>?order_letter"><button class="btn"><?=$top_letter?></button></a>
			<a class="a-nounderline" href="<?=$url?>?order_invoice"><button class="btn"><?=$top_contract?></button></a>				
		</div>
	</div>
	<? endif ?>
</nav>