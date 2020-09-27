<?php
$data = $_POST;



if (isset($data['signup'])) {
	if (trim($data['name']) == '') {
		$errors[] = 'Введите Имя';
	}
	if (trim($data['sur-name']) == '') {
		$errors[] = 'Введите Фамилию';
	}
	if (trim($data['email']) == '') {
		$errors[] = 'Введите почту';
	}
	if ($data['password'] == '') {
		$errors[] = 'Введите пароль';
	}
	if (R::count('users', 'email = ?', array($data['email']))) {
		$errors[] =  'Пользователь с таким email уже существует';
	}
	if ($data['password2'] != $data['password']) {
		$errors[] = 'Пароли не сходяться';
	}
	if (empty($errors)) {
		$user = R::dispense('users');
		$user->name = $data['name'];
		$user->sur_name = $data['sur-name'];
		$user->email = $data['email'];
		$user->ip = getUserIpAddr();
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		$user->level = 0;
		R::store($user);
		$suc = 'Вы успешно зарегестрировались';
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title><?php echo ($name_page['singup']) ?></title>
	<?php include "includes/head.php" ?>
</head>

<body>
	<div class="container">
		<?php include "includes/header.php" ?>

		<main>
			<div class="name-page-div"><span class="name-page"><?php echo ($name_page) ?></span></div>
			<div class="registration-div">
				<form method="post">

					<!-- регистрация -->

					<div><span>Фамилия Имя</span></div>
					<div>
						<input required minlength="2" placeholder="Фамилия" class="registration-input" type="text" value="<?php echo @$data['name'] ?>" name="name">
					</div>
					<div class="category-margin"></div>
					<div>
						<input minlength="2" required placeholder="Имя" class="registration-input" type="text" value="<?php echo @$data['sur-name'] ?>" name="sur-name">
					</div>
					<div class="category-margin"></div>
					<div>
						<span>Електронная почта</span>

					</div>
					<div>
						<input required class="registration-input" type="email" placeholder="Введите почту" value="<?php echo @$data['email'] ?>" name="email">
					</div>
					<div class="category-margin"></div>
					<div><span>Пароль</span></div>
					<div>
						<input required minlength="6" class="registration-input" placeholder="Введите пароль" type="password" name="password">
					</div>
					<div class="category-margin"></div>
					<div><span>Повторите пароль</span></div>
					<div>
						<input required minlength="6" class="registration-input" placeholder="Введите пароль" type="password" name="password2">
					</div>
					<div class="category-margin"></div>
					<div>
						<div>
							<span class="red" style="font-size: 14.5px;">
								<?php if (!empty($errors)) {

									echo array_shift($errors);
								?>
							</span>
						<?php

								} else {
						?>
							<span class="green" style="font-size: 14.5px;">
								<?php
									echo ($suc);
								?>
							</span>
						<?php
								}
						?>
						<div class="category-margin"></div>

						</div>
						<button class="tovar-buy-button button" name="signup" type="submit"><?php echo ($name_page) ?></button>
						<span><a href="/login/">Уже есть аккаунт?</a></span>
					</div>

					<div class="category-margin"></div>









				</form>


			</div>

		</main>
	
			<?php include "includes/footer.php" ?>
		

	</div>

</body>

</html>