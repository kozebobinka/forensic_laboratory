<nav class="navbar navbar-expand-md fixed-top peritus-width">
	<a class="navbar-brand" href="https://peritus.ru/"></a>
	<div class="navbar-text text-center text-md-left pl-lg-4 pl-0">
		<div><a id="a-tel-<?=$site_id?>" class="navbar-phone" href="tel:<?=$phone?>"><?=$phone?></a></div>
		<div><a class="a-light" href="mailto:<?=$email?>"><?=$email?></a></div>
	</div>
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
		<div class="mobile-menu-container d-block d-md-none">				
			<div class="mobile-buttons w-100 row text-center ">
				<div class="mobile-buttons w-100 row py-4 text-center ">
					<a class="a-nounderline col-12 mb-3" href="<?=$url?>?order_letter"><button class="btn"><?=$top_letter?></button></a><br>
					<a class="a-nounderline col-12" href="<?=$url?>?order_invoice"><button class="btn"><?=$top_contract?></button></a>				
				</div>	
				
				<div class="mobile-menu w-100 py-4">
					<ul class="navbar-nav navbar-menu">
						<? foreach ($menu as $id => $topmenu) :?>
						<li class="nav-item pb-0 <?=($text_page['parent_id'] == $topmenu['id']) ? 'show_active' : ''?>">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?=$topmenu['name']?>
							</a>
							<div class="dropdown-menu show" aria-labelledby="navbarDropdown">
								<? foreach ($submenu[$id] as $smenu) :?>
								<a class="dropdown-item pl-0 <?=($text_page['menu_id'] == $smenu['id']) ? 'show_active' : ''?>" href="/<?=$smenu['link']?>"><?=$smenu['name']?></a>
								<? endforeach ?>
							</div>		
						</li>
						<? endforeach ?>
					</ul>
				</div>				
			</div>
		</div>
	</div>
	<div class="navbar-text navbar-menu-button text-center d-md-block d-none">
		<button type="button" class="d-md-inline-block d-none <?=$menu_class?>">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
</nav>
<nav class="navbar navbar-second navbar-expand-md fixed-top peritus-width d-none <?=$menu_class?>">
	<div class="d-inline-block">
		<div class="collapse navbar-collapse" id="top_menu">
			<ul class="navbar-nav navbar-menu">
				<? foreach ($menu as $id => $topmenu) :?>
				<li class="nav-item dropdown <?=($text_page['parent_id'] == $topmenu['id']) ? 'show_active' : ''?>">
					<a class="nav-link dropdown-toggle px-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?=$topmenu['name']?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<? foreach ($submenu[$id] as $smenu) :?>
						<a class="dropdown-item pl-0 <?=($text_page['menu_id'] == $smenu['id']) ? 'show_active' : ''?>" href="/<?=$smenu['link']?>"><?=$smenu['name']?></a>
						<? endforeach ?>
					</div>		
				</li>
				<? endforeach ?>
			</ul>		
		</div>
	</div>
</nav>
<div class="conteiner-fluid fixed-top navbar-submenu">
</div>						