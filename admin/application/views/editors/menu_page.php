<?
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h2><?=isset($parent->name) ? $parent->name : 'Общие страницы'?>&emsp;<i class="fas fa-angle-double-right"></i>&emsp;<u><?=($page->name) ? $page->name : 'Новая страница'?></u><br>для сайта <?=$this->session->site?></h2>
<?=form_open("dashboard/menu_page/$parent_id/$id")?>
<div class="form-group">
	<input type="text" name="name" id="edit_item_name" class="form-control"  value="<?=$page->name?>" placeholder=" " required>
	<label class="moving-label focus" for="edit_item_name">Пункт меню*</label>
	<div class="invalid-feedback">Поле является обязательным</div>
</div>
<div class="form-group">
	<input type="text" name="link" id="edit_item_link" class="form-control"  value="<?=$page->link?>" placeholder=" " required>
	<label class="moving-label focus" for="edit_item_link">Ссылка*</label>
	<div class="invalid-feedback">Поле является обязательным</div>
</div>
<div class="form-group">
	<input type="text" name="prior" id="edit_item_prior" class="form-control"  value="<?=$page->prior?>" placeholder=" " required>
	<label class="moving-label focus" for="edit_item_prior">Приоритет*</label>
	<div class="invalid-feedback">Поле является обязательным</div>
</div>
<div class="form-group">
	<input type="text" name="title" id="edit_item_name" class="form-control"  value="<?=$page->title?>" placeholder=" " required>
	<label class="moving-label focus" for="edit_item_name">Заголовок*</label>
	<div class="invalid-feedback">Поле является обязательным</div>
</div>
<div class="form-group editor_wrap">
	<textarea name="text" id="edit_item_text" class="form-control" placeholder=" "><?=$page->text?></textarea>
</div>
<div class="modal-footer">
	<a class="a-nounderline" href="sdsa"><button type="button" class="btn active">Отмена</button></a>
	<button type="submit" class="btn">Сохранить</button>
</div>
<?=form_close()?>