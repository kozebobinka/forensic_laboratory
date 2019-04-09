<?
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h2>Меню для сайта <?=$this->session->site?></h2>
<? if ($this->session->flashdata("msg")) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata("msg") ?> </h2>
<? endif ?>
<div class="row mb-3">
	<div class="d-none item_id item_name item_prior">
	</div>
	<div class="col-11 text-right">
		<a class="edit_menu_btn" href="javascript:void(0)" data-toggle="modal" data-target="#edit_item"><i class="fas fa-plus"></i> Добавить</a>
	</div>
</div>
<div class="row border-bottom border-white text-info">
	<div class="col-5">
		Заголовок
	</div>
	<div class="col-3">
		Ссылка
	</div>
	<div class="col-3">
		Приоритет
	</div>
</div>
<? foreach ($menu as $id => $topmenu) :?>
<div class="row border-bottom border-white">
	<div class="d-none item_id">
		<?=$topmenu->id?>
	</div>
	<div class="col-8 item_name">
		<?=$topmenu->name?>
	</div>
	<div class="d-none item_link">
	</div>
	<div class="col-2 item_prior">
		<?=$topmenu->prior?>
	</div>
	<div class="col-2 text-right">
		<a href="<?=site_url("dashboard/menu_page/{$topmenu->id}/0")?>" class="a-nounderline" title="Добавить подпункт"><i class="fas fa-plus"></i></a>&nbsp;
		<a href="javascript:void(0)" class="a-nounderline edit_menu_btn" data-toggle="modal" data-target="#edit_item"><i class="fas fa-pencil-alt"></i></a>&nbsp;
		<a href="javascript:void(0)" class="a-nounderline delete_menu_btn" data-toggle="modal" data-target="#delete_item"><i class="fas fa-trash-alt"></i></a>
	</div>	
</div>
<? foreach ($submenu[$topmenu->id] as $smenu) :?>
<div class="row border-bottom border-white">
	<div class="d-none item_id">
		<?=$smenu->id?>
	</div>
	<div class="col-1 text-center">
		&mdash;
	</div>
	<div class="col-4 item_name">
		<?=$smenu->name?>
	</div>
	<div class="col-4 item_link">
		<?=$smenu->link?>
	</div>
	<div class="col-2 item_prior">
		<?=$smenu->prior?>
	</div>
	<div class="col-1 text-right">
		<a href="<?=site_url("dashboard/menu_page/{$topmenu->id}/{$smenu->id}")?>" class="a-nounderline" title="Редактировать"><i class="fas fa-pencil-alt"></i></a>&nbsp;
		<a href="javascript:void(0)" class="a-nounderline delete_menu_btn" data-toggle="modal" data-target="#delete_item"><i class="fas fa-trash-alt"></i></a>
	</div>	
</div>
<? endforeach ?>
<? endforeach ?>

<? if ($common) : ?>
<h2 class="mt-5">Общие страницы</h2>
<? if ($this->session->flashdata("msg")) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata("msg") ?> </h2>
<? endif ?>
<div class="row border-bottom border-white text-info">
	<div class="col-7">
		Заголовок
	</div>
	<div class="col-3">
		Ссылка
	</div>
</div>
<? foreach ($common as $id => $page) :?>
<div class="row border-bottom border-white">
	<div class="d-none item_id">
		<?=$page->id?>
	</div>
	<div class="col-7 item_name">
		<?=$page->name?>
	</div>
	<div class="col-3 item_link">
		<?=$page->link?>
	</div>
	<div class="d-none item_prior">
	</div>
	<div class="col-2 text-right">
		<a href="<?=site_url("dashboard/menu_page/-1/{$page->id}")?>" class="a-nounderline" title="Редактировать"><i class="fas fa-pencil-alt"></i></a>&nbsp;
	</div>	
</div>
<? endforeach ?>
<? endif ?>


<div class="modal fade" id="edit_item" tabindex="-1" role="dialog" aria-labelledby="edit_item_title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="edit_item_title"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?=form_open('dashboard/menu')?>
			<div class="modal-body">
				<input name="cmd" value="edit" hidden>
				<input name="id" id="edit_item_id" value="" hidden>
				<div class="form-group">
					<input type="text" name="name" id="edit_item_name" class="form-control"  value="" placeholder=" " required>
					<label class="moving-label focus" for="edit_item_text">Пункт верхнего меню*</label>
					<div class="invalid-feedback">Поле является обязательным</div>
				</div>
				<div class="form-group">
					<input type="text" name="prior" id="edit_item_prior" class="form-control"  value="" placeholder=" " required>
					<label class="moving-label focus" for="edit_item_prior">Приоритет*</label>
					<div class="invalid-feedback">Поле является обязательным</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn active" data-dismiss="modal">Отмена</button>
				<button type="submit" class="btn">Сохранить</button>
			</div>
			<?=form_close()?>
		</div>
	</div>
</div>

<div class="modal fade" id="delete_item" tabindex="-1" role="dialog" aria-labelledby="edit_item_title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="edit_item_title"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?=form_open("dashboard/menu_page/delete/0")?>
			<div class="modal-body">
				<input name="id" id="delete_item_id" value="" 1hidden>
				<div class="form-group">
					<input type="text" id="delete_item_name" class="form-control"  value="" placeholder=" " readonly>
					<label class="moving-label focus" for="delete_item_text">Пункт меню</label>
				</div>
				<div class="form-group">
					<input type="text" id="delete_item_link" class="form-control"  value="" placeholder=" " readonly>
					<label class="moving-label focus" for="delete_item_link">ссылка</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn active" data-dismiss="modal">Отмена</button>
				<button type="submit" class="btn">Удалить</button>
			</div>
			<?=form_close()?>
		</div>
	</div>
</div>