<header class="header <?=$bg_class?> d-flex align-items-center">
	<div class="container text-center">
		<div class="brand-big"></div>
		<div class="brand-text first-string"><?=$main1?></div>
		<div class="brand-text second-string"><?=$main2?></div>
		<div class="brand-text"><?=$main3?></div>	
		<? if (isset($main4) and ($main4 != '')) : ?>
		<div class="brand-text"><?=$main4?></div>
		<? endif ?>
		<a class="smooth-scroll" href="#helpful"><div class="scroll-down"></div></a>
	</div>			
</header>

<div class="parallax" id="helpful">
	<div class="bg-parallax"></div>
	<div class="container">
		<h2><?=$title_b2?></h2>
		<div class="list-useful list-useful">
			<ul>
				<? foreach ($usefuls1 as $useful) : ?>
				<li><span><?=typo($useful['text'])?></span></li>
				<? endforeach ?>
			</ul>
		</div>
		<div class="list-useful list-useful-thin">
			<ul>
				<? foreach ($usefuls2 as $useful) : ?>
				<li><span><?=typo($useful['text'])?></span></li>
				<? endforeach ?>
			</ul>
		</div>
		<div class="text-center">
			<button class="btn" onclick="$('#a-request').click();"><?=$send_req?></button>
			<a class="d-none smooth-scroll" href="#request" id="a-request"></a>
		</div>
	</div>
</div>

<? if ( (count($services) > 0) or (count($services_no_price) > 0)) : ?>
<div class="bg-dark-beige" id="services">
	<div class="container">
		<h2><?=$title_b3?></h2>
		<? if (count($services) > 0) : ?>
		<div class="table-services">
			<? foreach ($services as $service) : ?>
			<div class="row">
				<div class="col-12 col-md-3 pr-md-2 text-center text-md-left"><h4><?=typo($service['name'])?></h4> <?=typo($service['name_comment'])?></div>
				<div class="col-12 col-md-<?=($service['price']) ? '7' : '9'?>">
					<p class="<?=($service['price']) ? 'contact-text' : ''?> m-0">
						<?=typo($service['description'])?>
						<? if ($service['link']) : ?>
						<a class="a-classic" href="<?=$service['link']?>"><?=$read_more?></a>
						<? endif ?>
					</p>
				</div>
				<? if ($service['price']) : ?>
				<div class="col-12 col-md-2 text-center text-md-right service-price"><?=typo($service['price_comment'])?>&ensp;<span class="price-from"><?=number_format($service['price'], 0, ',', ' ')?> &#8381;</span></div>
				<? endif ?>
			</div>
			<? endforeach ?>		
		</div>
		<? endif ?>
		<? if (count($services_no_price) > 0) : ?>
		<div class="table-services table-services_no_prices">
			<? foreach ($services_no_price as $service) : ?>
			<div class="row">
				<div class="col-12 text-left"><h4><?=typo($service['name'])?></h4> <?=typo($service['name_comment'])?></div>
			</div>
			<? endforeach ?>		
		</div>
		<? endif ?>
		<? if (count($services_aside) > 0) : ?>
		<div class="row">
			<? foreach ($services_aside as $service) : ?>
			<div class="col-12 col-md-6 col-lg-4 text-center text-md-left pb-2 pb-md-0"><h4><?=typo($service['name'])?></h4> <?=typo($service['name_comment'])?></div>
			<div class="col-12 col-md-6 col-lg-8 text-center text-md-left service-price"><?=typo($service['price_comment'])?>&ensp;<span><?=number_format($service['price'], 0, ',', ' ')?> &#8381;</span></div>
			<? endforeach ?>
		</div>
		<? endif ?>
		<? if (count($services_aside_no_price) > 0) : ?>
		<div class="row">
			<? foreach ($services_aside_no_price as $service) : ?>
			<div class="col-12 text-left pb-2 pb-md-0"><h4><?=typo($service['name'])?></h4></div>
			<? endforeach ?>
		</div>
		<? endif ?>
		<? if (isset($prices_by_agr) and ($prices_by_agr != '')) : ?>
		<div class="row">
			<div class="col-12 text-left pt-5 pb-2 pb-md-0"><h4><?=typo($prices_by_agr)?></h4></div>
		</div>
		<? endif ?>
	</div>
</div>
<? endif ?>

<div class="bg-light-beige d-flex justify-content-center">
	<div class="container">
		<h2><?=$title_b4?></h2>
		<div class="row text-center justify-content-center justify-content-sm-between">
			<? foreach ($whys as $why) : ?>
			<?=($why['id'] == 7) ? '<div class="d-none d-sm-block col-sm-3 col-md-4 why-blocks"></div>' : '' ?>
			<div class="col-12 col-sm-6 col-md-4 why-blocks">
				<div class="why-icon why-<?=typo($why['id'])?>"></div>
				<h4 class="why-h4">
					<? if ($why['link']) : ?>
					<a class="a-whys" href="<?=$why['link']?>"><?=typo($why['name'])?></a>
					<? else : ?>
					<?=typo($why['name'])?>
					<? endif ?>
				</h4>
				<div class="why-description"><?=typo($why['description'])?></div>
			</div>
			<?=($why['id'] == 7) ? '<div class="d-none d-sm-block col-sm-3 col-md-4 why-blocks"></div>' : '' ?>
			<? endforeach ?>
		</div>
	</div>
</div>

<div class="bg-dark-beige">
	<div class="container">
		<h2><?=$title_b5?></h2>
		<div id="partners-carousel-md" class="carousel slide d-none d-sm-block" data-ride="carousel">
			<div class="carousel-inner">
				<? $j_start = 1; ?>
				<? $j_stop = $blocks_count; ?>
				<? for ($i = 0; $i < $p_num; $i++ ) : ?>
				<div class="carousel-item <?=($i == 0) ? 'active' : ''?>">
					<div class="row m-0">
						<? for ($j = $j_start; $j <= $j_stop; $j++ ) : ?>
						<? if (isset($partners[$j])) : ?>
						<div class="col-6 col-md-4 col-lg-3 p-0">
							<div class="partner-card d-flex align-items-center">										
								<img class="mx-auto" src="<?=get_client_image($partners[$j]['image'])?>" alt="<?=$partners[$j]['name']?>">
								<? if (!$partners[$j]['image']) : ?>
								<div class="partner-card-overlay text-left partner-card-main">
									<h4><?=$partners[$j]['name']?></h4>
									<a href="<?=$partners[$j]['link']?>"><?=$partners[$j]['link']?></a>
								</div>
								<? endif ?>
								<div class="partner-card-overlay text-left partner-card-info align-self-start">
									<h4><?=$partners[$j]['name']?></h4>
									<a href="<?=$partners[$j]['link']?>"><?=$partners[$j]['link']?></a>
								</div>
							</div>
						</div>
						<? endif ?>
						<? endfor ?>
					</div>
				</div>
				<? $j_start += $blocks_count; ?>
				<? $j_stop += $blocks_count; ?>
				<? endfor ?>
			</div>
			<? if ($p_num > 1) : ?>
			<ol class="carousel-indicators">
				<? for ($i = 0; $i < $p_num; $i++ ) : ?>
				<li data-target="#partners-carousel-md" data-slide-to="<?=$i?>" <?=($i == 0) ? 'class="active"' : ''?>></li>
				<? endfor ?>
			</ol>
			<? endif ?>
		</div>
		<div id="partners-carousel" class="carousel slide d-block d-sm-none" data-ride="carousel">
			<div class="carousel-inner">
				<? for ($j = 1; $j <= $n_partners; $j++ ) : ?>
				<div class="carousel-item <?=($j == 1) ? 'active' : ''?>">
					<div class="row m-0">
						<div class="col-12 p-0">
							<div class="partner-card d-flex align-items-center">										
								<img class="mx-auto" src="<?=get_client_image($partners[$j]['image'])?>" alt="<?=$partners[$j]['name']?>">
								<? if (!$partners[$j]['image']) : ?>
								<div class="partner-card-overlay text-left partner-card-main">
									<h4><?=$partners[$j]['name']?></h4>
									<a href="<?=$partners[$j]['link']?>"><?=$partners[$j]['link']?></a>
								</div>
								<? endif ?>
								<div class="partner-card-overlay text-left partner-card-info align-self-start">
									<h4><?=$partners[$j]['name']?></h4>
									<a href="<?=$partners[$j]['link']?>"><?=$partners[$j]['link']?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<? endfor ?>
			</div>
			<? if ($n_partners > 1) : ?>
			<ol class="carousel-indicators">
				<? for ($i = 0; $i < $n_partners; $i++ ) : ?>
				<li data-target="#partners-carousel" data-slide-to="<?=$i?>" <?=($i == 0) ? 'class="active"' : ''?>></li>
				<? endfor ?>
			</ol>
			<? endif ?>
		</div>
	</div>
</div>

<div class="parallax" id="request">
	<div class="bg-parallax"></div>
	<div class="container">
		<h2><?=$title_b6?></h2>
		<div class="text-center text-white"><?=$request1?></div>
		<div class="text-center text-white pb-4"><?=$request2?></div>
		<div id="request_form" class="row justify-content-center">
			<form id="form_r" method="POST" action="#request" class="needs-validation col-12 col-sm-11 col-md-9 col-lg-7" novalidate>
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
					<a class="a-white" href="javascript:void(0)" onclick="$(this).siblings('input').last().click();"><?=$req_files?></a>
					<input type="file" multiple="multiple" name="request_files[]" />
					<div class="p-1"></div>
					<div class="loader d-none"></div>
					<div class="text-white"></div>
				</div>		
				<div class="form-group custom-control custom-checkbox ml-4">
					<input type="checkbox" class="custom-control-input good-value" id="gdpr" name="gdpr" checked="checked" required>
					<label id="gdpr_label" class="custom-control-label text-white" for="gdpr"><?=$req_agree?></label>
					<div class="invalid-feedback"><?=$req_agree_err?></div>
				</div>						
				<button class="btn btn-block btn-inactive" type="submit"><?=$req_send?></button>
			</form>
		</div>
		<div>
			<h5 id="thanks" class="d-none"><?=$req_send_ok?></h5>
		</div>
	</div>
</div>

<div class="bg-dark-beige" id="contacts">
	<div class="container">
		<h2><?=$title_b7?></h2>
		<div class="row row-contacts mx-3 mx-sm-2">
			<div class="col-12 col-md-9 offset-md-3 p-0">
				<div class="contact-text">	
					<p><?=$contacts1?></p>
					<h4><?=$contacts2?></h4>
					<table>
						<tr>
							<td class="contact-abbr"><?=$contacts3?></td>
							<td class="contact-number"><?=$ogrn?></td>
						</tr>
						<tr>
							<td class="contact-abbr"><?=$contacts4?></td>
							<td class="contact-number"><?=$inn_kpp?></td>
						</tr>
					</table>
					<p><?=$contacts5?></p>
				</div>
			</div>
		</div>
		<div class="row mx-3 mx-sm-2">
			<div class="col-12 col-md-3 text-center text-md-left">
				<p class="d-none d-md-block"><?=$contacts6?></p>
				<p class="d-none d-md-block"><?=$contacts7?></p>
				<p class="d-block d-md-none"><?=$contacts6?> <?=mb_strtolower($contacts7)?></p>
				<p><a class="a-nounderline" href="mailto:<?=$email?>"><?=$email?></a></p>
				<a class="contact-phone" href="tel:<?=$phone?>"><?=$phone?></a>
				<p class="mt-5 d-none d-md-block"><a href="<?=$url?>docs/Peritus_shema-proezda.jpg" download><?=$contacts8?></a></p>
				<div class="d-block d-md-none text-center py-4">
					<a href="<?=$url?>docs/Peritus_shema-proezda.jpg" download>
						<button class="btn"><?=$contacts8?></button> 
					</a>
				</div>
			</div>
			<div class="col-12 col-md-9 p-0">
				<div class="contact-text">				
					<h3 class="text-center text-md-left"><?=$howtoget1?></h3>
					<h4 class="text-center text-md-left"><?=$howtoget2?></h4>
					<?=$howtoget3?>
					<h4 class="text-center text-md-left mt-36px"><?=$howtoget4?></h4>
					<?=$howtoget5?>
				</div>
			</div>
		</div>			
	</div>
</div>

<? include "general/map.php"?>