<div class="container mt-5" id="request">
	<div class="bg-parallax"></div>
	<div class="container">
		<div id="request_form" class="row justify-content-center">
			<form id="form_l" method="POST" action="#" class="needs-validation col-12 col-lg-11" novalidate>
				<input id="site_id" name="site_id" value="<?=$site_id?>" hidden>
				<div class="form-group">
					<input type="text" name="name" id="name" class="form-control"  placeholder=" " required>
					<label class="moving-label" for="name"><?=$letter_name?>*</label>
					<div class="invalid-feedback"><?=$letter_err?></div>
				</div>							
				<div class="form-group">
					<input type="text" name="fio" id="fio" class="form-control"  placeholder=" " required>
					<label class="moving-label" for="fio"><?=$letter_fio?>*</label>
					<div class="invalid-feedback"><?=$letter_err?></div>
				</div>							
				<div class="form-group">
					<input type="text" name="destination" id="destination" class="form-control"  placeholder=" ">
					<label class="moving-label" for="destination"><?=$letter_dest?></label>
					<div><?=$letter_dest2?></div>
				</div>
				<? if (count($investigations)) : ?>
				<div class="form-group">
					<select name="investigation" id="investigation" class="form-control" required>
						<option></option>
						<? foreach ($investigations as $investigation) : ?>
						<option value="<?=$investigation['text']?>"><?=$investigation['text']?></option>
						<? endforeach ?>
					</select>
					<label class="moving-label" for="investigation"><?=$letter_inv?>*</label>
					<div class="invalid-feedback"><?=$letter_err?></div>
				</div>
				<? endif ?>
				<div class="form-group">
					<input type="text" name="email" id="email" class="form-control" placeholder=" " required>
					<label class="moving-label" for="email"><?=$req_email?>*</label>
					<div class="invalid-feedback"><?=$req_email_err?></div>
				</div>							
				<div class="form-group">
					<input type="text" name="phone" id="phone" class="form-control"  placeholder=" ">
					<label class="moving-label" for="phone"><?=$req_phone?></label>
				</div>								
				<div class="form-group custom-control custom-checkbox ml-4">
					<input type="checkbox" class="custom-control-input" id="nonstandard" name="nonstandard">
					<label class="custom-control-label" for="nonstandard"><?=$letter_nons?></label>
				</div>							
				<div class="form-group custom-control custom-checkbox ml-4">
					<input type="checkbox" class="custom-control-input good-value" id="gdpr" name="gdpr" checked="checked" required>
					<label id="gdpr_label" class="custom-control-label" for="gdpr"><?=$req_agree?></label>
					<div class="invalid-feedback"><?=$req_agree_err?></div>
				</div>						
				<button class="btn btn-block btn-inactive" type="submit"><?=$letter_send?></button>
			</form>
		</div>
		<div id="thanks" class="text-center d-none">
			<h4 class="mb-5 text-center"><?=$req_send_ok?></h4>
		</div>
	</div>
</div>
