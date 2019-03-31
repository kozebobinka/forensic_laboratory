<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
		
<div class="parallax" id="request">
	<div class="bg-parallax"></div>
	<div class="container">
		<h2>PERITUS: редактирование <?=$site?></h2>
		<div class="row justify-content-center">
			<?=form_open('', array('class' => 'needs-validation col-12 col-sm-11 col-md-9 col-lg-7', 'novalidate'=>'1')); ?>
				<div class="form-group">
					<select name="site" id="site" class="form-control" required>
						<option value="peritus" <?=($site == 'peritus') ? 'selected' : ''?>>peritus</option>
						<option value="docs" <?=($site == 'docs') ? 'selected' : ''?>>docs.peritus</option>
						<option value="build" <?=($site == 'build') ? 'selected' : ''?>>build.peritus</option>
						<option value="audit" <?=($site == 'audit') ? 'selected' : ''?>>audit.peritus</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" name="login" id="login" class="form-control"  placeholder=" " required>
					<label class="moving-label" for="login">Логин*</label>
					<div class="invalid-feedback">Поле является обязательным</div>
				</div>							
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control"  placeholder=" " required>
					<label class="moving-label" for="password">Пароль*</label>
					<div class="invalid-feedback">Поле является обязательным</div>
				</div>							
				<button class="btn btn-block btn-inactive" type="submit">Войти</button>
			<?=form_close(); ?>
		</div>
	</div>
</div>
		
		