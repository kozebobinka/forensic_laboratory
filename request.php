<div id="request">
	<div id="request_form" class="row">
		<form id="form_r" method="POST" action="#request" class="needs-validation col-12 col-lg-11" novalidate>
			<input id="personalpatch" name="personalpatch" value="<?=time()?>" hidden>
			<input id="site_id" name="site_id" value="<?=$site_id?>" hidden>
			<div class="form-group">
				<input type="text" name="name" id="name" class="form-control"  placeholder=" " required>
				<label class="moving-label" for="name"><?=$req_name?>*</label>
				<div class="invalid-feedback"><?=$req_name_err?></div>
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
			<div class="form-group mb-3">
				<div class="textarea-wrap m-0">
					<textarea type="description" name="description" id="description" class="form-control"  placeholder=" "></textarea>								
					<label class="moving-label" for="description"><?=$req_describe?></label>
				</div>
			</div>
			<div class="form-group ml-4 attach-files">
				<a href="javascript:void(0)" onclick="$(this).siblings('input').last().click();"><?=$req_files?></a>
				<input type="file" multiple="multiple" name="request_files[]" />
				<div class="p-1"></div>
				<div class="loader d-none"></div>
				<div class="text-white"></div>
			</div>		
			<div class="form-group custom-control custom-checkbox ml-4">
				<input type="checkbox" class="custom-control-input good-value" id="gdpr" name="gdpr" checked="checked" required>
				<label id="gdpr_label" class="custom-control-label" for="gdpr"><?=$req_agree?></label>
				<div class="invalid-feedback"><?=$req_agree_err?></div>
			</div>						
			<button class="btn btn-block btn-inactive" type="submit"><?=$req_send?></button>
		</form>
	</div>
	<div class="pb-3">
		<h4 id="thanks" class="d-none text-center"><?=$req_send_ok?></h4>
	</div>
</div>
