<div class="bg-light-beige content-page">
	<div class="container">
		<div class="row">
			<div class="d-block d-md-none col-12 back-one-level">
				<a class="a-nounderline" href="<?=$url?>">
					<i class="fa fa-caret-left" aria-hidden="true"></i>&ensp;<?=$back_main?>
				</a>
			</div>
			<? if (($link[0] == 'policy') or ($link[0] == '404')) : ?>
			<? $col_right = 12; ?>
			<? else :?>
			<? $col_right = 8; ?>
			<div class="col-12 col-md-4 order-2 order-md-1">
				<h3><?=$text_page['parent_name']?></h3>
				<div class="left-links">
					<? foreach ($submenu[$text_page['parent_id']] as $smenu) :?>
					<p><a class="a-nounderline <?=($text_page['menu_id'] == $smenu['id']) ? 'a-light' : ''?>" href="/<?=$smenu['link']?>"><?=$smenu['name']?></a></p>
					<? endforeach ?>
				</div>
				<div class="back-one-level d-none d-md-block">
					<a class="a-nounderline" href="<?=$url?>">
						<i class="fa fa-caret-left" aria-hidden="true"></i>&ensp;<?=$back_main?>
					</a>
				</div>
			</div>
			<? endif ?>
			<div class="col-12 col-md-<?=$col_right?> order-1 order-md-2">
				<h2 class="mb-4"><?=$text_page['title']?></h2>

				<?=$text_page['text']?>
				
				<? if($text_page['menu_id'] == 13) : ?>
				<? include "letter_content.php"?>
				<? endif ?>
				<? if($text_page['menu_id'] == 12) : ?>
				<? include "invoice_content.php"?>
				<? endif ?>
				<? if(in_array($text_page['menu_id'],[7,8,9,10])) : ?>
				<div class="my-4">
					<p class="py-0 my-0"><?=$request1?></p>
					<p class="pb-4"><?=$request2?></p>
					<? include "request.php"; ?>
				</div>
				<? endif ?>
			</div>
		</div>
	</div>
	
</div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">              
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<img src="" class="imagepreview" style="width: 100%;" >
			</div>
		</div>
	</div>
</div>