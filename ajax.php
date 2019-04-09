<?
	
	include 'config.php';
	include 'includes/PHPMailer/PHPMailer.php';
	
	if (isset($_POST['file_upload'])) {  
		$uploaddir = 'uploads/' . $_POST['file_upload'];
		if(!is_dir($uploaddir)) mkdir($uploaddir, 0777);
		
		$files      = $_FILES;
		
		foreach( $files as $file ){
			move_uploaded_file( $file['tmp_name'], "$uploaddir/{$file['name']}" );
		}
	}
	
	if (isset($_POST['send_request'])) {  
		
		$email_from = $db->getOne('SELECT `text` FROM `main` WHERE `id`="email"');
		$email_to = $db->getOne('SELECT `text` FROM `main` WHERE `id`="email_feedback"');
		$company_name = $db->getOne('SELECT `text` FROM `main` WHERE `id`="company_name"');
		
		$personalpatch = 'uploads/' . $_POST['personalpatch'];
		$files = json_decode($_POST['filenames']);
		// $files_string = implode('<br>', $files);
		$files_string = '';
		foreach ($files as $file) {
			$files_string .= '<a href="' . $url . $personalpatch . '/' . $file . '">' . $file . '</a><br>';
		}
		$files_on_disk = scandir($personalpatch);
		unset($files_on_disk[0]); // .
		unset($files_on_disk[1]); // ..
		
		$description = nl2br($_POST['description']);
		
		$body = "
			<h3>PERITUS: запрос консультации с сайта $url</h3>
			<p>
			Имя: <strong>{$_POST['name']}</strong>
			<br>
			Email: <strong>{$_POST['email']}</strong>
			<br>
			Телефон: <strong>{$_POST['phone']}</strong>
			</p>
			<br>
			<p><strong>Ситуация:</strong></p>
			<p>{$description}</p>
			<br>
			<p><strong>Прикрепленные фалы:</strong></p>
			<p>{$files_string}</p>
		";
		
		$mail = new PHPMailer(); 
		$mail->CharSet = 'utf-8';	
		$mail->isHTML(true);                                 
		
		$mail->setFrom($email_from, $company_name);
		$mail->AddAddress($email_to,  $company_name); 
		$mail->AddReplyTo($_POST['email'], $_POST['name']);
		
		$mail->Subject = 'PERITUS: запрос консультации с сайта';
		$mail->Body    = $body;
		
		// foreach($files_on_disk as $key => $file) {
			// if (in_array($file, $files) !== FALSE) {
				// $mail->addAttachment($personalpatch. '/' . $file);
			// }
		// }
		
		$mail->send();
	}
	
	if (isset($_POST['send_letter'])) {  
		
		$email_from = $db->getOne('SELECT `text` FROM `main` WHERE `id`="email"');
		$email_to = $db->getOne('SELECT `text` FROM `main` WHERE `id`="email_feedback"');
		$company_name = $db->getOne('SELECT `text` FROM `main` WHERE `id`="company_name"');
		if ($url == "https://docs.peritus.ru/") {
			$body = "
				<h3>PERITUS: заказ информационного письма с сайта $url</h3>
				<p>
				Имя: <strong>{$_POST['name']}</strong>
				<br>
				На чье имя: <strong>{$_POST['fio']}</strong>
				<br>
				Назначение: <strong>{$_POST['destination']}</strong>
				<br>
				Вид исследования: <strong>{$_POST['investigation']}</strong>
				<br>
				Нужна нестандартная форма письма: <strong>{$_POST['nonstandard']}</strong>
				<br>
				Email: <strong>{$_POST['email']}</strong>
				<br>
				Телефон: <strong>{$_POST['phone']}</strong>
				</p>
			";
		}
		if ($url == "https://build.peritus.ru/") {
			$body = "
				<h3>PERITUS: заказ информационного письма с сайта $url</h3>
				<p>
				Имя: <strong>{$_POST['name']}</strong>
				<br>
				На чье имя: <strong>{$_POST['fio']}</strong>
				<br>
				Назначение: <strong>{$_POST['destination']}</strong>
				<br>
				Нужна нестандартная форма письма: <strong>{$_POST['nonstandard']}</strong>
				<br>
				Email: <strong>{$_POST['email']}</strong>
				<br>
				Телефон: <strong>{$_POST['phone']}</strong>
				</p>
			";
		}
		$mail = new PHPMailer(); 
		$mail->CharSet = 'utf-8';	
		$mail->isHTML(true);                                 
		
		$mail->setFrom($email_from, $company_name);
		$mail->AddAddress($email_to,  $company_name); 
		$mail->AddReplyTo($_POST['email'], $_POST['name']);
		
		$mail->Subject = 'PERITUS: заказ информационного письма';
		$mail->Body    = $body;
		
		$mail->send();
	}	
	
	if (isset($_POST['send_invoice'])) {  
		
		$email_from = $db->getOne('SELECT `text` FROM `main` WHERE `id`="email"');
		$email_to = $db->getOne('SELECT `text` FROM `main` WHERE `id`="email_feedback"');
		$company_name = $db->getOne('SELECT `text` FROM `main` WHERE `id`="company_name"');
		
		if ($url == "https://docs.peritus.ru/") {
			$body = "
				<h3>PERITUS: заказ счета-договора с сайта $url</h3>
				<p>
				Имя: <strong>{$_POST['name']}</strong>
				<br>
				На чье имя: <strong>{$_POST['fio']}</strong>
				<br>
				Вид исследования: <strong>{$_POST['investigation']}</strong>
				<br>
				Этап исследования: <strong>{$_POST['investigation_s']}</strong>
				<br>
				Нужен отдельный договор: <strong>{$_POST['contract']}</strong>
				<br>
				Email: <strong>{$_POST['email']}</strong>
				<br>
				Телефон: <strong>{$_POST['phone']}</strong>
				</p>
			";
		}
		if ($url == "https://build.peritus.ru/") {
			$body = "
				<h3>PERITUS: заказ счета-договора с сайта $url</h3>
				<p>
				Имя: <strong>{$_POST['name']}</strong>
				<br>
				На чье имя: <strong>{$_POST['fio']}</strong>
				<br>
				Этап исследования: <strong>{$_POST['investigation_s']}</strong>
				<br>
				Нужен отдельный договор: <strong>{$_POST['contract']}</strong>
				<br>
				Email: <strong>{$_POST['email']}</strong>
				<br>
				Телефон: <strong>{$_POST['phone']}</strong>
				</p>
			";
		}
		
		$mail = new PHPMailer(); 
		$mail->CharSet = 'utf-8';	
		$mail->isHTML(true);                                 
		
		$mail->setFrom($email_from, $company_name);
		$mail->AddAddress($email_to,  $company_name); 
		$mail->AddReplyTo($_POST['email'], $_POST['name']);
		
		$mail->Subject = 'PERITUS: заказ счета-договора';
		$mail->Body    = $body;
		
		$mail->send();
	}	