<?
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2>"Виды проводимых исследований" для сайта <?=$this->session->site?></h2>
<? if ($this->session->flashdata('msg')) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata('msg') ?> </h2>
<? endif ?>
<div class="row mb-3">
	<div class="d-none item_id item_name item_name_comment item_description item_price_comment item_price item_aside item_link">
	</div>
	<div class="col-11 text-right">
		<a class="edit_services_btn" href="javascript:void(0)" data-toggle="modal" data-target="#edit_item"><i class="fas fa-plus"></i> Добавить</a>
	</div>
</div>
<div class="row border-bottom border-white pb-2 text-info">
	<div class="col-2">
		Услуга
	</div>
	<div class="col-2">
		Уточнение
	</div>
	<div class="col-2">
		Описание
	</div>
	<div class="col-1">
		Перед ценой
	</div>
	<div class="col-1">
		Цена
	</div>
	<div class="col-1">
		Не в таблице
	</div>
	<div class="col-2">
		Ссыла "Подробнее"
	</div>
</div>
<? foreach ($items as $item) : ?>
<div class="row border-bottom border-white pb-1">
	<div class="d-none item_id">
		<?=$item->id?>
	</div>
	<div class="col-2 text-strong item_name">
		<?=$item->name?>
	</div>
	<div class="col-2 item_name_comment">
		<?=$item->name_comment?>
	</div>
	<div class="col-2 text-sm item_description">
		<?=$item->description?>
	</div>
	<div class="col-1 item_price_comment">
		<?=$item->price_comment?>
	</div>
	<div class="col-1 item_price">
		<?=$item->price?>
	</div>
	<div class="col-1 item_aside">
		<?=($item->aside) ? 'ДА' :'&mdash;'?>
	</div>
	<div class="col-1 item_link">
		<?=$item->link?>
	</div>

	<div class="col-2 text-right">
		<a href="javascript:void(0)" class="a-nounderline edit_services_btn" data-toggle="modal" data-target="#edit_item"><i class="fas fa-pencil-alt"></i></a>&ensp;
		<a href="javascript:void(0)" class="a-nounderline delete_services_btn" data-toggle="modal" data-target="#delete_item"><i class="fas fa-trash-alt"></i></a>
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
			<?=form_open('dashboard/services')?>
			<div class="modal-body">
				<input name="cmd" value="edit" hidden>
				<input name="id" id="edit_item_id" value="" hidden>
				<div class="form-group">
					<input type="text" name="name" id="edit_item_name" class="form-control"  value="" placeholder=" " required>
					<label class="moving-label focus" for="edit_item_name">Заголовок*</label>
					<div class="invalid-feedback">Поле является обязательным</div>
				</div>
				<div class="form-group">
					<input type="text" name="name_comment" id="edit_item_name_comment" class="form-control"  value="" placeholder=" ">
					<label class="moving-label focus" for="edit_item_name_comment">Уточнение</label>
				</div>
				<div class="form-group">
					<label class="moving-label focus" for="edit_item_description">Описание</label>
					<div class="textarea-wrap m-0">
						<textarea name="description" id="edit_item_description" class="form-control" placeholder=" "></textarea>								
					</div>
				</div>
				<div class="row no-gutters">
					<div class="form-group">
						<input type="text" name="price_comment" id="edit_item_price_comment" class="form-control"  value="" placeholder=" ">
						<label class="moving-label focus" for="edit_item_price_comment">Перед ценой</label>
					</div>
					<div class="col form-group">
						<input type="text" name="price" id="edit_item_price" class="form-control"  value="" placeholder=" ">
						<label class="moving-label focus" for="edit_item_price">Цена</label>
					</div>
				</div>
				<div class="form-group">
					<select name="aside" id="edit_item_aside" class="form-control">						
						<option value="0">Нет</option>
						<option value="1">Да</option>
					</select>
					<label class="moving-label focus" for="edit_item_aside">Не в таблице</label>
				</div>
				<div class="form-group">
					<input type="text" name="link" id="edit_item_link" class="form-control"  value="" placeholder=" ">
					<label class="moving-label focus" for="edit_item_link">Ссыла "Подробнее", если надо</label>
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
			<?=form_open('dashboard/services')?>
			<div class="modal-body">
				<input name="cmd" value="delete" hidden>
				<input name="id" id="delete_item_id" value="" hidden>
				<div class="form-group">
					<input type="text" name="name" id="delete_item_name" class="form-control"  value="" placeholder=" " readonly>
					<label class="moving-label focus" for="delete_item_name">Заголовок*</label>
				</div>
				<div class="form-group">
					<input type="text" name="name_comment" id="delete_item_name_comment" class="form-control"  value="" placeholder=" " readonly>
					<label class="moving-label focus" for="delete_item_name_comment">Уточнение</label>
				</div>
				<div class="form-group">
					<label class="moving-label focus" for="delete_item_description">Описание</label>
					<div class="textarea-wrap m-0">
						<textarea name="description" id="delete_item_description" class="form-control" placeholder=" " readonly></textarea>								
					</div>
				</div>
				<div class="row no-gutters">
					<div class="form-group">
						<input type="text" name="price_comment" id="delete_item_price_comment" class="form-control"  value="" placeholder=" " readonly>
						<label class="moving-label focus" for="delete_item_price_comment">Перед ценой</label>
					</div>
					<div class="col form-group">
						<input type="text" name="price" id="delete_item_price" class="form-control"  value="" placeholder=" " readonly>
						<label class="moving-label focus" for="delete_item_price">Цена</label>
					</div>
				</div>
				<div class="form-group">
					<input type="text" name="aside" id="delete_item_aside" class="form-control"  value="" placeholder=" " readonly>
					<label class="moving-label focus" for="delete_item_aside">Не в таблице</label>
				</div>
				<div class="form-group">
					<input type="text" name="link" id="delete_item_link" class="form-control"  value="" placeholder=" " readonly>
					<label class="moving-label focus" for="delete_item_link">Ссыла "Подробнее", если надо</label>
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

