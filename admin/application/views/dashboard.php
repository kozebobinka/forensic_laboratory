<div class="container">
	<div class="row">
		<div class="col-3 bg-dark-beige">
			<div class="mb-2">
				<a href="<?=site_url('dashboard/menu')?>" class="btn w-100 <?=($editor == 'menu') ? 'active' : '' ?>">Меню</a>
			</div>
			<div class="mb-2">
				<a href="<?=site_url('dashboard/phrases')?>" class="btn w-100 <?=($editor == 'phrases') ? 'active' : '' ?>">Фразы</a>
			</div>
			<div class="mb-2">
				<a href="<?=site_url('dashboard/whys')?>" class="btn w-100 <?=($editor == 'whys') ? 'active' : '' ?>">"Почему мы"</a>
			</div>
			<div class="mb-2">
				<a href="<?=site_url('dashboard/partners')?>" class="btn w-100 <?=($editor == 'partners') ? 'active' : '' ?>">"Нам доверяют"</a>
			</div>
			<div class="mb-2">
				<a href="<?=site_url('dashboard/services')?>" class="btn w-100 <?=($editor == 'services') ? 'active' : '' ?>">"Виды исследований"</a>
			</div>
			<div class="my-4">
				<a href="<?=site_url('dashboard/admin')?>" class="btn w-100 <?=($editor == 'admin') ? 'active' : '' ?>">Настройки</a>
			</div>
			<div class="mt-4 text-center">
			<a href="<?=site_url('login/logout')?>"><i class="fas fa-door-open"></i> Выйти</a>
			</div>
		</div>
		<div class="col-9 bg-light-beige">
			<?=$right_content?>
		</div>
	</div>
</div>