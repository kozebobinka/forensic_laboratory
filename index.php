<?
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	include 'general/functions.php';
	
	if (isset($_GET['link'])) {
		$link = explode('/', $_GET['link']); 
	}
	
	$menu_class = '';
	$text_page['parent_id'] = 0;
	$text_page['menu_id'] = 0;
	
	if 		(isset($_GET['order_letter'])) {
		$content = 'letter.php';
		$menu_class = 'not_shown';
	}
	elseif	(isset($_GET['order_invoice'])) {
		$content = 'invoice.php';
		$menu_class = 'not_shown';
	}
	elseif	(!isset($link[0]) or ($link[0] == ''))	$content = 'main.php';
	else	{
		$text_page = $db->getRow('
			SELECT `menu`.`title`, `menu`.`text`, `menu`.`name` AS `menu_name`, `parent_menu`.`name` AS `parent_name`, 
				`menu`.`id` AS `menu_id`, `parent_menu`.`id` AS `parent_id`
				FROM `menu`
				LEFT JOIN `menu` AS `parent_menu` ON `menu`.`parent` = `parent_menu`.`id`
				WHERE `menu`.`link`=?s', 
			$link[0]
		);
		
		if (!$text_page) {
			header('Location: https://peritus.ru/404');
			exit;
		}
		if ($link[0] == '404') {
			header("HTTP/1.0 404 Not Found");
		} 
		$content = 'content_page.php';
	}
	
	include 'general/header.php';
	
	if ($menu)	include 'general/menu_full.php';
	else		include 'general/menu.php';
	
	include $content;
	
	include 'general/footer.php'; 