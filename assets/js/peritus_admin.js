'use strict';

$( document ).ready(function(e) {
	
	// красивые селекты
	$("#site").selectmenu();
	
	
	// редактор
	if ($("textarea").is("#edit_item_text")) {
		CKEDITOR.config.height = "600";
		CKEDITOR.config.toolbarGroups = [
			{ name: 'document',       groups: [ 'mode' ] },
			'/',
			{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
			{ name: 'links' },
			{ name: 'insert' },
			{ name: 'tools' },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
			{ name: 'styles' },
			{ name: 'colors' },
		];
		CKEDITOR.config.extraPlugins = 'uploadimage';
		CKEDITOR.config.uploadUrl = '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json';
		CKEDITOR.config.filebrowserBrowseUrl = 'https://peritus.ru/includes/ckfinder/ckfinder.html';
		CKEDITOR.config.filebrowserImageBrowseUrl = 'https://peritus.ru/includes/ckfinder/ckfinder.html?type=Images';
		CKEDITOR.config.filebrowserUploadUrl = 'https://peritus.ru/includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
		CKEDITOR.config.filebrowserImageUploadUrl = 'https://peritus.ru/includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
		CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced';
		CKEDITOR.config.toolbar = '';
		CKEDITOR.config.allowedContent = true;
		CKEDITOR.config.contentsCss = "https://peritus.ru/assets/css/peritus_editor.css";
		CKEDITOR.replace('edit_item_text');
	}
	
	
	// редактирование меню
	$(".edit_menu_btn").click(function() {
		$("#edit_item_title").html($(this).parent().siblings('.item_name')[0].outerText.trim());
		$("#edit_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_name").val($(this).parent().siblings('.item_name')[0].innerHTML.trim());
		$("#edit_item_prior").val($(this).parent().siblings('.item_prior')[0].innerHTML.trim());
	})
	
	$(".delete_menu_btn").click(function() {
		$("#delete_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#delete_item_name").val($(this).parent().siblings('.item_name')[0].innerHTML.trim());
		$("#delete_item_link").val($(this).parent().siblings('.item_link')[0].innerHTML.trim());
	})

	
	// редактирование фраз
	$(".edit_phrases_btn").click(function() {
		$("#edit_item_title").html($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_text").html($(this).parent().siblings('.item_text')[0].innerHTML.trim());
	})
	
	$(".edit_phrases_btn_others").click(function() {
		$("#edit_item_table_others").val($(this).parent().siblings('.item_table')[0].outerText.trim());
		$("#edit_item_id_others").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_text_others").html($(this).parent().siblings('.item_text')[0].innerHTML.trim());
		if ($("#edit_item_table_others").val() == 'usefuls') {
			$('#edit_item_level').parent().removeClass('d-none');
			if ($(this).parent().siblings('.item_level')[0].outerText.trim() == 'Вложенный') {
				$('#edit_item_level option[value="1"]').prop('selected', true);
			}
		} else {
			$('#edit_item_level').parent().addClass('d-none');
		}
		$("#edit_item_prior_others").val($(this).parent().siblings('.item_prior')[0].innerHTML.trim());
	})
	
	$(".delete_phrases_btn").click(function() {
		$("#delete_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#delete_item_table").val($(this).parent().siblings('.item_table')[0].outerText.trim());
		$("#delete_item_text").html($(this).parent().siblings('.item_text')[0].innerHTML.trim());
		$("#delete_item_prior").val($(this).parent().siblings('.item_prior')[0].innerHTML.trim());
	})


	// редактирование "Почему мы"
	$(".edit_whys_btn").click(function() {
		$("#edit_item_title").html($(this).parent().siblings('.item_name')[0].outerText.trim());
		$("#edit_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_name").val($(this).parent().siblings('.item_name')[0].innerHTML.trim());
		$("#edit_item_description").html($(this).parent().siblings('.item_description')[0].innerHTML.trim());
		$("#edit_item_link").val($(this).parent().siblings('.item_link')[0].innerHTML.trim());
	})
	
	
	// редактирование "Нам доверяют"
	$(".edit_partners_btn").click(function() {
		$("#edit_item_title").html($(this).parent().siblings('.item_name')[0].outerText.trim());
		$("#edit_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_name").val($(this).parent().siblings('.item_name')[0].innerHTML.trim());
		$("#edit_item_link").val($(this).parent().siblings('.item_link')[0].innerHTML.trim());
		$("#edit_item_image").html($(this).parent().siblings('.item_image')[0].innerHTML.trim());
		$("#edit_item_prior").val($(this).parent().siblings('.item_prior')[0].innerHTML.trim());
	})
	
	$(".delete_partners_btn").click(function() {
		$("#delete_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#delete_item_name").val($(this).parent().siblings('.item_name')[0].innerHTML.trim());
		$("#delete_item_link").val($(this).parent().siblings('.item_link')[0].innerHTML.trim());
		$("#delete_item_image").html($(this).parent().siblings('.item_image')[0].innerHTML.trim());
		$("#delete_item_prior").val($(this).parent().siblings('.item_prior')[0].innerHTML.trim());
	})
	
	// обрабатываем добавление файлов
	$('.attach-files-partners').on('change', 'input', function(e) {
		var files = this.files;
		var data = new FormData();
		
		if (this.value) { // если value инпута не пустое
			$.each(files, function(key, value) { // все прикрепленные файлы
				data.append(key, value);
			})
			
			data.append('id', $('#edit_item_id').val());
			
			$.ajax({
				url         : 'partners_image',
				type        : 'POST',
				data        : data,
				cache       : false,
				processData : false,
				contentType : false,
				beforeSend 	: function() {
					$('.loader').removeClass('d-none');	
				},
				success		: function(img) {
					$('.loader').addClass('d-none');	
					$("#edit_item_image").html('<img class="w-50 mb-1" src="https://peritus.ru/assets/images/clients/' + img + '">');
					$("#edit_item_image_file").val(img);
				}
			});
		}
	});
	
	
	// редактирование "Виды проводимых исследований"
	$(".edit_services_btn").click(function() {
		$("#edit_item_title").html($(this).parent().siblings('.item_name')[0].outerText.trim());
		$("#edit_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_name").val($(this).parent().siblings('.item_name')[0].innerHTML.trim());
		$("#edit_item_name_comment").val($(this).parent().siblings('.item_name_comment')[0].innerHTML.trim());
		$("#edit_item_description").html($(this).parent().siblings('.item_description')[0].innerHTML.trim());
		$("#edit_item_price_comment").val($(this).parent().siblings('.item_price_comment')[0].innerHTML.trim());
		$("#edit_item_price").val($(this).parent().siblings('.item_price')[0].innerHTML.trim());
		if ($(this).parent().siblings('.item_aside')[0].outerText.trim() == 'ДА') {
			$('#edit_item_aside option[value="1"]').prop('selected', true);
		} 
		$("#edit_item_link").val($(this).parent().siblings('.item_link')[0].innerHTML.trim());
	})
	
	$(".delete_services_btn").click(function() {
		$("#delete_item_title").html($(this).parent().siblings('.item_name')[0].outerText.trim());
		$("#delete_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#delete_item_name").val($(this).parent().siblings('.item_name')[0].innerHTML.trim());
		$("#delete_item_name_comment").val($(this).parent().siblings('.item_name_comment')[0].innerHTML.trim());
		$("#delete_item_description").html($(this).parent().siblings('.item_description')[0].innerHTML.trim());
		$("#delete_item_price_comment").val($(this).parent().siblings('.item_price_comment')[0].innerHTML.trim());
		$("#delete_item_price").val($(this).parent().siblings('.item_price')[0].innerHTML.trim());
		$("#delete_item_aside").val($(this).parent().siblings('.item_aside')[0].innerHTML.trim());
		$("#delete_item_link").val($(this).parent().siblings('.item_link')[0].innerHTML.trim());
	})

})
	