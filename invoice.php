<div class="parallax parallax-forms" id="request">
	<div class="bg-parallax"></div>
	<div class="container">
		<a href="<?=$url?>"><div class="back-home"></div></a>
		<h2 class="text-white"><?=$invoice1?></h2>
		<div class="text-center text-white"><?=$invoice2?></div>
		<div class="text-center text-white pb-4"><?=$invoice3?></div>
		<div id="request_form" class="row justify-content-center">
			<form id="form_i" method="POST" action="#request" class="needs-validation col-12 col-sm-11 col-md-9 col-lg-7" novalidate>
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
					<select name="investigation_step" id="investigation_step" class="form-control" required>
						<option></option>
						<? foreach ($investigation_steps as $investigation_step) : ?>
						<option value="<?=$investigation_step['text']?>"><?=$investigation_step['text']?></option>
						<? endforeach ?>
					</select>
					<label class="moving-label" for="investigation_step"><?=$invoice_sort?>*</label>
					<div class="invalid-feedback"><?=$letter_err?></div>
				</div>								
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
					<input type="checkbox" class="custom-control-input" id="contract" name="contract">
					<label class="custom-control-label text-white" for="contract"><?=$invoice_contr?></label>
				</div>							
				<div class="form-group custom-control custom-checkbox ml-4">
					<input type="checkbox" class="custom-control-input good-value" id="gdpr" name="gdpr" checked="checked" required>
					<label id="gdpr_label" class="custom-control-label text-white" for="gdpr"><?=$req_agree?></label>
					<div class="invalid-feedback"><?=$req_agree_err?></div>
				</div>							
				<button class="btn btn-block btn-inactive" type="submit"><?=$letter_send?></button>
			</form>
		</div>
		<div  id="thanks" class="text-center d-none">
			<h5 class="mb-5"><?=$req_send_ok?></h5>
			<a href="<?=$url?>">
				<button class="btn"><?=$to_main?></button> 
			</a>
		</div>
	</div>
</div>

<div class="bg-dark-green">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2241.593426200689!2d37.65389185179789!3d55.81765849435972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b535daf49e2c9d%3A0x817d041ad8679d1c!2z0KDQsNC60LXRgtC90YvQuSDQsS3RgCwgMTYsINCc0L7RgdC60LLQsCwg0KDQvtGB0YHQuNGPLCAxMjk2MjY!5e0!3m2!1sru!2sua!4v1541157417078" width="0" height="0" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>	