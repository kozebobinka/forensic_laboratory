'use strict';

$( document ).ready(function(e) {
	
	// красивые селекты
	$("#site").selectmenu();
	
	// редактирование фраз
	$(".edit_phrases_btn").click(function() {
		$("#edit_item_title").html($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_text").html($(this).parent().siblings('.item_text')[0].innerHTML.trim());
	})

	// редактирование "Почему мы"
	$(".edit_whys_btn").click(function() {
		$("#edit_item_title").html($(this).parent().siblings('.item_name')[0].outerText.trim());
		$("#edit_item_id").val($(this).parent().siblings('.item_id')[0].outerText.trim());
		$("#edit_item_name").val($(this).parent().siblings('.item_name')[0].innerHTML.trim());
		$("#edit_item_description").html($(this).parent().siblings('.item_description')[0].innerHTML.trim());
		$("#edit_item_link").val($(this).parent().siblings('.item_link')[0].innerHTML.trim());
	})

})
	