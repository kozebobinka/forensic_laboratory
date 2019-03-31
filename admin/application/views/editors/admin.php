<?
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2>Логин и пароль для сайта <?=$this->session->site?></h2>
<? if ($this->session->flashdata('msg')) : ?>
    <h2 class="text-success"> <?= $this->session->flashdata('msg') ?> </h2>
<? endif ?>
<?=form_open('dashboard/admin')?>
<div class="form-group">
	<input type="text" name="login" id="login" class="form-control"  value="<?=$login?>" placeholder=" " required>
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