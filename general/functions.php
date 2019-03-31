<?	
	include $_SERVER['DOCUMENT_ROOT']. '/config.php';
	
	$texts = $db->getIndCol('id', 'SELECT `id`, `text` FROM `texts`');
	foreach ($texts as $key => $text) {
		$texts[$key] = typo($text);
	}
	extract($texts);
	
	$main = $db->getIndCol('id', 'SELECT `id`, `text` FROM `main`');
	extract($main);
	
	if ($docs_page) {
		$menu_full = $db->getInd('id', 'SELECT `id`, `name`, `link` FROM `menu`');
		
		$menu = $db->getInd('id', 'SELECT `id`, `name`, `link` FROM `menu` WHERE `parent`=0 ORDER BY `prior`');
		foreach ($menu as $id => $topmenu) {
			$submenu[$id] = $db->getAll('SELECT `id`, `name`, `link` FROM `menu` WHERE `parent`=?i ORDER BY `prior`', $id);
		}
	}
	
	$services = $db->getAll('SELECT * FROM `services` WHERE `aside`=0');
	$services_aside = $db->getAll('SELECT * FROM `services` WHERE `aside`=1');
	$services_no_price = $db->getAll('SELECT * FROM `services` WHERE `aside`=2');
	$services_aside_no_price = $db->getAll('SELECT * FROM `services` WHERE `aside`=3');
	
	$usefuls1 = $db->getAll('SELECT * FROM `usefuls` WHERE `level`=0');
	$usefuls2 = $db->getAll('SELECT * FROM `usefuls` WHERE `level`=1');
	
	$whys = $db->getAll('SELECT * FROM `whys`');
	
	$partners = $db->getInd('row_number', 'SELECT (@i:=@i+1) AS `row_number`, `partners`.* FROM `partners`, (SELECT @i:=0) AS `q` ORDER BY `prior`');
	$n_partners = count($partners);
	$p_num = ceil($n_partners / 12);
	$blocks_count = ceil($n_partners / $p_num);
	
	$investigations = $db->getAll('SELECT * FROM `investigations`');
	$investigation_steps = $db->getAll('SELECT * FROM `investigation_steps`');
	
	$n_footers = $db->getOne('SELECT COUNT(`id`) FROM `footer`');
	$footers_col = ceil($n_footers / 2);
	$footers1 = $db->getAll('SELECT `text` FROM `footer` ORDER BY `id` LIMIT ?i', $footers_col);
	$footers2 = $db->getAll('SELECT `text` FROM `footer` ORDER BY `id` LIMIT ?i OFFSET ?i', $footers_col, $footers_col);
	
	function get_client_image($image)
	{
		global $url;	
		if (($image != '') and file_exists('assets/images/clients/' . $image)) {
			return $url . 'assets/images/clients/' . $image;
		} else {
			return $url . 'assets/images/clients/default.png';
		}
	}

	function typo($str) {      
		$pattern = '/\s+(в|без|до|из|к|на|по|о|от|перед|при|через|с|со|у|и|или|нет|за|над|для|об|под|про|ул\.|и\/или)\s+/';
		$return_str = preg_replace($pattern, ' \1&nbsp;', $str);
		$pattern = '/&nbsp;(в|без|до|из|к|на|по|о|от|перед|при|через|с|со|у|и|или|нет|за|над|для|об|под|про|ул\.|и\/или)\s+/';
		$return_str = preg_replace($pattern, '&nbsp;\1&nbsp;', $return_str);
		$pattern = '/\s+(&mdash;|-|–)\s+/';
		return preg_replace($pattern, '&nbsp;\1 ', $return_str);
	}