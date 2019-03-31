'use strict';

$( document ).ready(function(e) {

	// фон-параллакс
	function parallax(){
		$('.parallax').each(function(e) {
			var scrolled = $(window).scrollTop() - $(this).offset().top;
			$(this).children('.bg-parallax').css('top', -(scrolled * 0.5 - 30) + 'px');
		});
	}
	
	// кнопка "наверх"
	$('.to-top').click(function() {
		$('body,html').animate({scrollTop:0},800); 
	});
	
	if ( $(window).scrollTop() > 1000 ) {
		$('.to-top').fadeIn();
	}
	if($(this).scrollTop() > 500) {
		$('.navbar-menu-button button').addClass('d-md-inline-block');
		$('.navbar-second').removeClass('d-md-flex');
	} else {
		$('.navbar-second:not(.not_shown)').addClass('d-md-flex');
		$('.navbar-menu-button button:not(.not_shown)').removeClass('d-md-inline-block');
	}
	$(window).scroll(function(e){
		parallax();
		if ($(this).scrollTop() > 1000) {
			$('.to-top').fadeIn();
		} else {
			$('.to-top').fadeOut();
		}
		if ($(this).scrollTop() > 500) {
			$('.navbar-menu-button button').addClass('d-md-inline-block');
			if (!$('.navbar-menu-button').hasClass('active')) {
				$('.navbar-second').removeClass('d-md-flex');
				$('.navbar-submenu').height(0);
				$('.navbar-second .dropdown, .navbar-second .dropdown-menu').removeClass('show');
			}
		} else {
			$('.navbar-submenu').height(0);
			$('.navbar-menu-button').removeClass('active');
			$('.navbar-menu-button button:not(.not_shown)').removeClass('d-md-inline-block');
			$('.navbar-second:not(.not_shown)').addClass('d-md-flex');
		}
	});
	
	// плашки в сабменю
	$('.dropdown-toggle').click(function() {
		if ( $(this).siblings(".dropdown-menu.show").length === 0 ) {
			$('.navbar-submenu').height($(this).siblings(".dropdown-menu").height()+20);
		} else {
			$('.navbar-submenu').height(0);
		}
	});
	$(document).mouseup(function (e) { 
		var div = $(".nav-link .nav-item");
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && (e.which == 1)  // ЛКМ
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
			$('.navbar-submenu').height(0);
		}
	});
	$('.navbar-menu-button button').click(function() {
		$('.navbar-menu-button').toggleClass('active');
		if ($('.navbar-menu-button').hasClass('active')) {
			$('.navbar-second').addClass('d-md-flex');
		} else {
			$('.navbar-second').removeClass('d-md-flex');
			$('.navbar-submenu').height(0);
		}
	});	
		
	// перехват проверки формы
	(function() {
		window.addEventListener('load', function() {
			var forms = document.getElementsByClassName('needs-validation');
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
	
	// плавная прокрутка при нажатии на якорную ссылку
	$(".smooth-scroll").on("click", function(event) {
		event.preventDefault();
		var id = $(this).attr('href'),
			body_top = $(id).offset().top - 72;
		$('body,html').animate({scrollTop: body_top}, 1000);
	});
	
	// обрабатываем добавление файлов
	$('.attach-files').on('change', 'input', function(e) {
		var files = this.files;
		var data = new FormData();
		
		if (this.value) { // если value инпута не пустое
			$.each(files, function(key, value) { // все прикрепленные файлы
				data.append(key, value);
			})
			
			data.append('file_upload', $('#personalpatch').val());
			
			$.ajax({
				url         : 'ajax.php',
				type        : 'POST',
				data        : data,
				cache       : false,
				processData : false,
				contentType : false,
				beforeSend 	: function() {
					$('.loader').removeClass('d-none');	
				},
				success		: function() {
					$('.loader').addClass('d-none');	
					$.each(files, function(key, value) { // все прикрепленные файлы
						$('.attach-files .text-white').last().html('<span>' + value.name + '</span>&ensp;<a href="javascript:void(0)" onclick="$(this).parent().remove()">удалить</a>');
						$('<div class="text-white"></div>').insertAfter($('.attach-files .text-white').last());
					})		
				}
			});
		}
	});
	
	// украшаем текстареа
	$('textarea').focus(function() {
		$(this).parent().addClass('textarea-wrap-onfocus');
	});
	$('textarea').blur(function() {
		$(this).parent().removeClass('textarea-wrap-onfocus');
	});
	
	// красивые селекты
	$("#investigation").selectmenu();
	$("#investigation_step").selectmenu();
	
	// проверяем чекбокс
	$('#gdpr_label').click(function() {
		setTimeout(function() {
			if ($('#gdpr').is(':checked')) {
				$('#gdpr').addClass('good-value');
				if ($('input:required, select:required').length == $('input:required.good-value, select:required.good-value').length) {
					$('button:submit').removeClass('btn-inactive');
				}					
			} else {
				$('#gdpr').removeClass('good-value');
				$('button:submit').addClass('btn-inactive');
			}
		}, 100);
	});

	// проверяем обязательные поля
	$('input:required, select:required').change(function() {
		if ($(this).attr('id') != 'gdpr') {
			if ((($(this).attr('id') != 'email') && ($(this).val() != '')) || (($(this).attr('id') == 'email') && $(this).val().match(/.+?\@.+/g))) {
				$(this).addClass('good-value');	
				if ($('input:required, select:required').length == $('input:required.good-value, select:required.good-value').length) {
					$('button:submit').removeClass('btn-inactive');
				}
			} else {
				$(this).removeClass('good-value');
				$('button:submit').addClass('btn-inactive');
			}
		}
	});
	
	$('select').on('selectmenuchange', function() {
		$(this).addClass('good-value');	
		if ($('input:required, select:required').length == $('input:required.good-value, select:required.good-value').length) {
			$('button:submit').removeClass('btn-inactive');
		}
		$(this).siblings('.moving-label').addClass('focus');
	});
	
	// проверяем необязательные поля
	$('input:not(:required)').blur(function() {
		$(this).addClass('good-value');
	});
	
	// из-за edge, чиним глюк с фокусом
	$("input, textarea").focus(function (e) {
		$(this).siblings('.moving-label').addClass('focus');
	})
	$("input, textarea, select").blur(function (e) {
		if($(this).val() == '') {
			$(this).siblings('.moving-label').removeClass('focus');
		}
	})
	
	// ускоряем карусель
	$('.carousel').carousel({
		interval: 2000,
	})
	
	// перехват отправки формы запроса с главной
	$("#form_r").submit(function (e) {
		
		e.preventDefault();
		
		if ($(':input[required]').length == $(':input[required].good-value').length) {
			
			var filenames = [];
			$('.attach-files .text-white span').each(function() {
				filenames.push($(this).text());
			});
			console.log(filenames)
			var data = {
				send_request	: 1,
				filenames		: JSON.stringify(filenames),
				personalpatch	: $('#personalpatch').val(),
				name			: $('#name').val(),
				email			: $('#email').val(),
				phone			: $('#phone').val(),
				description		: $('#description').val(),
			}
			
			$.ajax({	
				type: "POST",
				url: 'ajax.php',
				data: data,
				success: function() {
					// Цели Google и Яндекс	
					ga('send','event','form_main','submit',$('#site_id').val());
					ym(51707684, 'reachGoal', 'form_main-submit-'+$('#site_id').val());
					
					$('#request_form').addClass('d-none');
					$('#thanks').removeClass('d-none');
					var block_top = $('#request').offset().top - 72;
					$('body,html').animate({scrollTop: block_top}, 1000);
				}
			});
		}
	});

	// перехват отправки формы запроса с письмом
	$("#form_l").submit(function (e) {
		
		e.preventDefault();
		
		if ($('input:required, select:required').length == $('input:required.good-value, select:required.good-value').length) {
			
			var data = {
				send_letter		: 1,
				name			: $('#name').val(),
				fio				: $('#fio').val(),
				destination		: $('#destination').val(),
				investigation	: $('#investigation').val(),
				email			: $('#email').val(),
				phone			: $('#phone').val(),
				nonstandard		: ($('#nonstandard').is(':checked') ? 'да' : 'нет'),
			}
			
			$.ajax({	
				type: "POST",
				url: 'ajax.php',
				data: data,
				success: function() {
					// Цели Google и Яндекс	
					ga('send','event','form_letter','submit',$('#site_id').val());
					ym(51707684, 'reachGoal', 'form_letter-submit-'+$('#site_id').val());
					
					$('#request_form').addClass('d-none');
					$('#thanks').removeClass('d-none');
					var block_top = $('#request').offset().top;
					$('body,html').animate({scrollTop: block_top}, 1000);
				}
			});
		}
	});

	// перехват отправки формы запроса со счетом-договором
	$("#form_i").submit(function (e) {
		
		e.preventDefault();
		
		if ($('input:required, select:required').length == $('input:required.good-value, select:required.good-value').length) {
			
			var data = {
				send_invoice	: 1,
				name			: $('#name').val(),
				fio				: $('#fio').val(),
				investigation	: $('#investigation').val(),
				investigation_s	: $('#investigation_step').val(),
				email			: $('#email').val(),
				phone			: $('#phone').val(),
				contract		: ($('#contract').is(':checked') ? 'да' : 'нет'),
			}
			
			$.ajax({	
				type: "POST",
				url: 'ajax.php',
				data: data,
				success: function() {
					// Цели Google и Яндекс	
					ga('send','event','form_invoice','submit',$('#site_id').val());
					ym(51707684, 'reachGoal', 'form_invoice-submit-'+$('#site_id').val());
					
					$('#request_form').addClass('d-none');
					$('#thanks').removeClass('d-none');
					var block_top = $('#request').offset().top;
					$('body,html').animate({scrollTop: block_top}, 1000);
				}
			});
		}
	});

	// галерея
	
    $(function() {
        $('.img-thumbnail').on('click', function() {
            $('.imagepreview').attr('src', $(this).attr('src'));
            $('#imagemodal').modal('show');   
        });     
	});
	
	// Цели Google и Яндекс
	$("#a-tel-main").click(function (e) {
		ga('send','event','links','click','tel_main');
		ym(51707684, 'reachGoal', 'links-click-tel_main');
	})
	$("#a-tel-docs").click(function (e) {
		ga('send','event','links','click','tel_docs');
		ym(51707684, 'reachGoal', 'links-click-tel_docs');
	})
	$("#a-tel-audit").click(function (e) {
		ga('send','event','links','click','tel_audit');
		ym(51707684, 'reachGoal', 'links-click-tel_audit');
	})
	$("#a-tel-build").click(function (e) {
		ga('send','event','links','click','tel_build');
		ym(51707684, 'reachGoal', 'links-click-tel_build');
	})
	$("#a-docs").click(function (e) {
		ga('send','event','links','click','docs');
		ym(51707684, 'reachGoal', 'links-click-docs');
	})
	$("#a-build").click(function (e) {
		ga('send','event','links','click','build');
		ym(51707684, 'reachGoal', 'links-click-build');
	})
	$("#a-audit").click(function (e) {
		ga('send','event','links','click','audit');
		ym(51707684, 'reachGoal', 'links-click-audit');
	})
});