<?
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h2>Настройки для сайта <?=$this->session->site?></h2>
<? if ($this->session->flashdata('msg_main')) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata('msg_main') ?> </h2>
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
			<?=form_open('dashboard/admin')?>
			<div class="modal-body">
				<input name="id" id="edit_item_id" value="" hidden>
				<input name="cmd" value="main" hidden>
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

<h2 class="mt-5">Логин и пароль для сайта <?=$this->session->site?></h2>
<? if ($this->session->flashdata('msg_admin')) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata('msg_admin') ?> </h2>
<? endif ?>
<?=form_open('dashboard/admin')?>
<input name="cmd" value="admin" hidden>
<div class="form-group">
	<input type="text" name="login" id="login" class="form-control"  value="<?=$admin->login?>" placeholder=" " required>
	<label class="moving-label focus" for="login">Логин*</label>
	<div class="invalid-feedback">Поле является обязательным</div>
</div>							
<div class="form-group">
	<input type="text" name="password" id="password" class="form-control"  placeholder=" " required>
	<label class="moving-label" for="password">Пароль*</label>
	<div class="invalid-feedback">Поле является обязательным</div>
</div>							
<button class="btn btn-block btn-inactive" type="submit">Изменить</button>
<?=form_close(); ?>