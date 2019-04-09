<?
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<? foreach ($others as $table => $items) : ?>
<hr>
<h2 class="mt-5"><?=$others_header[$table]?> для сайта <?=$this->session->site?></h2>
<? if ($this->session->flashdata("msg_$table")) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata("msg_$table") ?> </h2>
<? endif ?>
<div class="row mb-3">
	<div class="d-none item_id item_text item_prior">
	</div>
	<div class="d-none item_table">
		<?=$table?>
	</div>
	<div class="col-11 text-right">
		<a class="edit_phrases_btn_others" href="javascript:void(0)" data-toggle="modal" data-target="#edit_item_others"><i class="fas fa-plus"></i> Добавить</a>
	</div>
</div>
<div class="row border-bottom border-white pb-2 text-info">
	<div class="col-8">
		Текст
	</div>
	<? if ($table == 'usefuls') : ?>
	<div class="col-2 item_text">
		Уровень
	</div>
	<?endif?>
	<div class="col-2">
		Приоритет
	</div>
</div>
<? foreach ($items as $item) : ?>
<div class="row border-bottom border-white">
	<div class="d-none item_id">
		<?=$item->id?>
	</div>
	<div class="d-none item_table">
		<?=$table?>
	</div>
	<div class="col-8 item_text">
		<?=$item->text?>
	</div>
	<? if ($table == 'usefuls') : ?>
	<div class="col-2 item_level">
		<?=($item->level) ? 'Вложенный' : 'Верхний'?>
	</div>
	<? endif ?>
	<div class="col-<?=($table == 'usefuls') ? 1 : 3?> item_prior">
		<?=$item->prior?>
	</div>
	<div class="col-1">
		<a href="javascript:void(0)" class="a-nounderline edit_phrases_btn_others" data-toggle="modal" data-target="#edit_item_others"><i class="fas fa-pencil-alt"></i></a>&nbsp;
		<a href="javascript:void(0)" class="a-nounderline delete_phrases_btn" data-toggle="modal" data-target="#delete_item"><i class="fas fa-trash-alt"></i></a>
	</div>	
</div>
<? endforeach ?>

<? endforeach ?>


<div class="modal fade" id="edit_item_others" tabindex="-1" role="dialog" aria-labelledby="edit_item_title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="edit_item_title_others"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?=form_open('dashboard/phrases')?>
			<div class="modal-body">
				<input name="cmd" value="edit" hidden>
				<input name="table" id="edit_item_table_others" value="" hidden>
				<input name="id" id="edit_item_id_others" value="" hidden>
				<div class="form-group">
					<label class="moving-label focus" for="edit_item_text_others">Текст*</label>
					<div class="textarea-wrap m-0">
						<textarea name="text" id="edit_item_text_others" class="form-control" placeholder=" " required></textarea>								
					</div>
					<div class="invalid-feedback">Поле является обязательным</div>
				</div>
				<div class="form-group d-none">
					<select name="level" id="edit_item_level" class="form-control">						
						<option value="0">Верхний</option>
						<option value="1">Вложенный</option>
					</select>
					<label class="moving-label focus" for="edit_item_aside">Уровень</label>
				</div>
				<div class="form-group">
					<input type="text" name="prior" id="edit_item_prior_others" class="form-control"  value="" placeholder=" " required>
					<label class="moving-label focus" for="edit_item_prior_others">Приоритет*</label>
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
			<?=form_open('dashboard/phrases')?>
			<div class="modal-body">
				<input name="cmd" value="delete" hidden>
				<input name="table" id="delete_item_table" value="" hidden>
				<input name="id" id="delete_item_id" value="" hidden>
				<div class="form-group">
					<label class="moving-label focus" for="delete_item_prior">Текст*</label>
					<div class="textarea-wrap m-0">
						<textarea name="text" id="delete_item_text" class="form-control" placeholder=" " readonly></textarea>								
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
