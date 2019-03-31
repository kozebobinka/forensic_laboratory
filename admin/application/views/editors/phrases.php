<?
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2>Фразы для сайта <?=$this->session->site?></h2>
<? if ($this->session->flashdata('msg')) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata('msg') ?> </h2>
<? endif ?>
<div class="row border-bottom border-white">
</div>
<? foreach ($items as $item) : ?>
<div class="row border-bottom border-white">
	<div class="col-3 item_id">
		<?=$item->id?>
	</div>
	<div class="col-8 item_text">
		<?=$item->text?>
	</div>
	<div class="col-1">
		<a href="javascript:void(0)" class="a-nounderline edit_phrases_btn" data-toggle="modal" data-target="#edit_item"><i class="fas fa-pencil-alt"></i></a>
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
			<?=form_open('dashboard/phrases')?>
			<div class="modal-body">
				<input name="id" id="edit_item_id" value="" hidden>
				<div class="textarea-wrap">
					<textarea name="text" id="edit_item_text" class="form-control" placeholder=" "></textarea>								
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