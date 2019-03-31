<?
	include '../config.php';
	
	$error = '';
	$login = '';
	
	if (isset($_POST['login']) and isset($_POST['password'])) {
		$login = $db->getOne('SELECT `login` FROM `admin` WHERE `login` = ?s AND `password`=?s', $_POST['login'], md5($_POST['password']));
		if ($login) {
			$_SESSION['login'] = $login;
			} else {
			$error = 'Неверный логин или пароль!';
		}
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">		
		<link rel="stylesheet" href="../assets/css/peritus.css?<?=time()?>">		
		<title>Управление контентом сайта PERITUS</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
					<div class="card card-signin my-5">
						<div class="p-5">
							<h2>Управление контентом сайта PERITUS</h2>
							<form method="POST" action="#" class="needs-validation" novalidate>
								<div class="form-group">
									<input type="text" name="login" id="login" class="form-control" required autofocus>
									<label for="login">Логин*</label>
									<div class="invalid-feedback">
										Поле "Логин" не может быть пустым.
									</div>
								</div>							
								<div class="form-group pb-2">
									<input type="password" name="password" class="form-control" required>
									<label for="password">Пароль*</label>
									<div class="invalid-feedback">
										Поле "Пароль" не может быть пустым.
									</div>
								</div>								
								<button class="btn btn-block" type="submit">Войти</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<script>
			'use strict';
			
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
		</script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		
	</body>
</html>