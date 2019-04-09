<?
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2>"Нам доверяют" для сайта <?=$this->session->site?></h2>
<? if ($this->session->flashdata('msg')) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata('msg') ?> </h2>
<? endif ?>
<div class="row mb-3">
	<div class="d-none item_id item_name item_link item_image item_prior">
	</div>
	<div class="col-11 text-right">
		<a class="edit_partners_btn" href="javascript:void(0)" data-toggle="modal" data-target="#edit_item"><i class="fas fa-user-plus"></i> Добавить</a>
	</div>
</div>
<div class="row border-bottom border-white pb-2 text-info">
	<div class="col-5">
		Заголовок
	</div>
	<div class="col-3">
		Ссылка
	</div>
	<div class="col-1">
		Лого
	</div>
	<div class="col-2">
		Приоритет
	</div>
</div>
<? foreach ($items as $item) : ?>
<div class="row border-bottom border-white">
	<div class="d-none item_id">
		<?=$item->id?>
	</div>
	<div class="col-5 item_name">
		<?=$item->name?>
	</div>
	<div class="col-3 item_link">
		<?=$item->link?>
	</div>
	<div class="col-1 item_image">
		<img class="w-100 mb-1" src="https://peritus.ru/assets/images/clients/<?=$item->image?>">
	</div>
	<div class="col-1 text-center item_prior">
		<?=$item->prior?>
	</div>
	<div class="col-2 text-right">
		<a href="javascript:void(0)" class="a-nounderline edit_partners_btn" data-toggle="modal" data-target="#edit_item"><i class="fas fa-pencil-alt"></i></a>&ensp;
		<a href="javascript:void(0)" class="a-nounderline delete_partners_btn" data-toggle="modal" data-target="#delete_item"><i class="fas fa-trash-alt"></i></a>
	</div>	
</div>
<? endforeach ?>

<div class="modal fade" id="edit_item" tabindex="-1" role="dialog" aria-labelledby="edit_item_title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="edit_item_title"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?=form_open('dashboard/partners')?>
			<div class="modal-body">
				<input name="cmd" value="edit" hidden>
				<input name="id" id="edit_item_id" value="" hidden>
				<input name="image" id="edit_item_image_file" value="" hidden>
				<div class="form-group">
					<input type="text" name="name" id="edit_item_name" class="form-control"  value="" placeholder=" " required>
					<label class="moving-label focus" for="edit_item_name">Заголовок*</label>
					<div class="invalid-feedback">Поле является обязательным</div>
				</div>
				<div class="form-group">
					<input type="text" name="link" id="edit_item_link" class="form-control"  value="" placeholder=" " required>
					<label class="moving-label focus" for="edit_item_link">Ссылка*</label>
					<div class="invalid-feedback">Поле является обязательным</div>
				</div>
				<div class="form-group ml-4 attach-files-partners">
					<div class="row">
						<div id="edit_item_image" class="col-6 m-0">
							<img class="w-50 mb-1" src="https://peritus.ru/assets/images/clients/default.png">
						</div>
						<div class="col-5 m-0 pt-5">
							<a href="javascript:void(0)" onclick="$(this).siblings('input').last().click();" class="ml-3">Заменить лого</a>
							<input type="file" accept="image/jpeg,image/png,image/gif">
							<div class="p-1"></div>
							<div class="loader d-none"></div>
						</div>	
					</div>	
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

<div class="modal fade" id="delete_item" tabindex="-1" role="dialog" aria-labelledby="delete_item_title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="delete_item_title">Вы уверены?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?=form_open('dashboard/partners')?>
			<div class="modal-body">
				<input name="cmd" value="delete" hidden>
				<input name="id" id="delete_item_id" value="" hidden>
				<div class="form-group">
					<input type="text" name="name" id="delete_item_name" class="form-control"  value="" placeholder=" " readonly>
					<label class="moving-label focus" for="delete_item_name">Заголовок*</label>
				</div>
				<div class="form-group">
					<input type="text" name="link" id="delete_item_link" class="form-control"  value="" placeholder=" " readonly>
					<label class="moving-label focus" for="delete_item_link">Ссылка*</label>
				</div>
				<div class="form-group ml-4 attach-files-partners">
					<div class="row">
						<div id="delete_item_image" class="col-6 m-0">
							<img class="w-50 mb-1" src="https://peritus.ru/assets/images/clients/default.png">
						</div>
					</div>	
				</div>	
				<div class="form-group">
					<input type="text" name="prior" id="delete_item_prior" class="form-control"  value="" placeholder=" " readonly>
					<label class="moving-label focus" for="delete_item_prior">Приоритет*</label>
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