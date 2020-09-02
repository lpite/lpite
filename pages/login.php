<?php include "../includes/include.php";

$data = $_POST; 
if (isset($data['login'])) {
	$errors = array();
	$user = R::findOne('users','email = ?',array($data['email']));
	# code...
	if($user)
	{
		if(password_verify($data['password'], $user->password)){

$_SESSION['log_in'] =  $user;
$sucessfull = "Всё ок ".$_SESSION['log_in']->email;
		}else{
$errors[] = "Пароль не верный";
		}


	}else{
		$errors[] = "Ползователь не найден";
	}
	
}

?>


<!DOCTYPE html>
 <html>
 <head>
 	<title><?php echo($name_page['login']) ?></title>
 	<?php include "../includes/head.php" ?>
 </head>
 <body>
 	<div class="container">
 		<?php include "../includes/header.php" ?>

 		<main>
 			 
 			 	 	<?php if(!isset($_SESSION['log_in'])){
?>
<div class="name-page-div"><span class="name-page"><?php echo($name_page['login']) ?></span></div>
 			 	 <div class="registration-div">
 	<form method="post" action="">



<div>
	<span>Почта</span>
</div>
	 		<div>
	 			<input required class="registration-input" type="email" placeholder="Введите почту" name="email">
	 		</div>
  <div class="category-margin"></div>
  <div>
  	<span>Пароль</span>
 
 	<div>	
 		<input required minlength="6" class="registration-input" placeholder="Введите пароль" type="password" name="password">
 	</div>
 			 	<div class="category-margin"></div>
<div>
	<div><span class="red"><?php 
	if (!empty($errors)) {
		echo array_shift($errors);
	}
	
	 ?></span>
	 <span class="green"><?php echo($sucessfull);	 ?></span></div>
	<button class="tovar-buy-button" name="login" type="submit"><?php echo($name_page['login']) ?></button>
	<span><a href="registration.php">Нет аккаунта?</a></span>


</div>



 			
 		
 			 	

 		

 			 	</form>
 			 	 </div>
<?php
 			 	 	}else{
 			 	 		 ?>
 			 	 		 <div class="name-page-div"><span class="name-page"><?php echo($_SESSION['log_in']->email) ?></span></div>
 			 	 <div class="registration-div">
<p><?php echo($_SESSION['log_in']->name) ?></p>
<p><?php echo($_SESSION['log_in']->sur_name) ?></p>
<form method="" action="../includes/logout.php">

	<button class="tovar-buy-button">Выйти</button>
</form>
</div>
 			 	 		 <?php
 			 	 	} ?>
 			 	
 			 	

 			

 		</main>
<footer>
 			<?php include "../includes/footer.php" ?>
 		</footer>
 	</div>
 
 </body>
 </html>