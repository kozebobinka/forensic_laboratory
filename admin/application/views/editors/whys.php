<?
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2>"Почему мы" для сайта <?=$this->session->site?></h2>
<? if ($this->session->flashdata('msg')) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata('msg') ?> </h2>
<? endif ?>
<div class="row border-bottom border-white pb-2 text-info">
	<div class="col-3">
		Заголовок
	</div>
	<div class="col-5 item_description">
		Описание
	</div>
	<div class="col-3 item_link">
		Ссылка, если надо
	</div>

</div>
<? foreach ($items as $item) : ?>
<div class="row border-bottom border-white">
	<div class="d-none item_id">
		<?=$item->id?>
	</div>
	<div class="col-3 item_name">
		<?=$item->name?>
	</div>
	<div class="col-5 item_description">
		<?=$item->description?>
	</div>
	<div class="col-3 item_link">
		<?=$item->link?>
	</div>
	<div class="col-1">
		<a href="javascript:void(0)" class="a-nounderline edit_whys_btn" data-toggle="modal" data-target="#edit_item"><i class="fas fa-pencil-alt"></i></a>
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
			<?=form_open('dashboard/whys')?>
			<div class="modal-body">
				<input name="id" id="edit_item_id" value="" hidden>
				<div class="form-group">
					<input type="text" name="name" id="edit_item_name" class="form-control"  value="" placeholder=" " required>
					<label class="moving-label focus" for="edit_item_name">Заголовок*</label>
					<div class="invalid-feedback">Поле является обязательным</div>
				</div>
				<div class="form-group">
					<div class="textarea-wrap m-0">
						<textarea name="description" id="edit_item_description" class="form-control" placeholder=" "></textarea>								
						<label class="moving-label focus" for="edit_item_description">Описание*</label>
					</div>
				</div>
				<div class="form-group">
					<input type="text" name="link" id="edit_item_link" class="form-control"  value="" placeholder=" ">
					<label class="moving-label focus" for="login">Ссылка, если надо</label>
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