<?php  

$data = $_POST; 
if (isset($data['login'])) {
	$errors = array();
	$user = R::findOne('users','email = ?',array($data['email']));
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
 	<title><?php 
 	if (!isset($_SESSION['log_in']->email)) {
 		echo($name_page['login']);
 	}
      echo($_SESSION['log_in']->email) ?>
 	</title>

 	<?php include($__ROOT__."includes/head.php") ?>
 </head>
 <body>
 	<div class="container">
 		<?php include($__ROOT__."includes/header.php") ?>

 		<main>
 			 
 			 	 	<?php if(!isset($_SESSION['log_in'])){
?>
<div class="name-page-div"><span><?php echo($name_page['login']) ?></span></div>
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
	<button class="tovar-buy-button button" name="login" type="submit"><span><?php echo($name_page['login']) ?></span></button>
	<span><a href="/registration/">Нет аккаунта?</a></span>


</div>



 			
 		
 			 	

 		

 			 	</form>
 			 	 </div>
<?php
 			 	 	}else{
 			 	 		 ?>
 			 	 		 <div class="name-page-div"><span class="name-page"><?php echo($_SESSION['log_in']->email) ?></span></div>
 			 	 <div class="registration-div">
<p>Имя:<?php echo($_SESSION['log_in']->name) ?></p>
<p>Фамилия:<?php echo($_SESSION['log_in']->sur_name) ?></p>

<div style="display: flex; flex-direction: column; align-self: center;">
		<span>История заказов</span>
        <span>gecn</span>
	<?php 
   $orders = R::find('test','id_user = ?',array($_SESSION['log_in']->id)); 
   if (!$orders) {
        echo "нет"; 
       }    
   foreach ($orders as $order) {
   	?>
   	<div class="page-tovar-description order-div"  style="margin: 10px; width: 100%;
   	 <?php 
   	 if ($order['ready'] == 1) {
   		echo 'border-bottom: 2px solid dodgerblue';
   	}elseif ($order['ready'] == 2) {
   		echo 'border-bottom: 2px solid green';
   	}else{
   		echo 'border-bottom: 2px solid red';
   	}
   	 ?>"> 
   		<table class="order-table" id="<?php echo $order['id']?>">
   			<tr>
   				<td>
   					<span >№ заказа <?php echo $order['id'].' ';  ?> </span>
   				</td>
   				<td>
   					<span>  <?php  echo ' '.$order['time'].' '; ?> </span>
   				</td>
   				<td>
   					<span> Сумма заказа <?php  echo $order['price'].' '; ?> </span>
   				</td>

   			</tr>
   		</table>
   		<div id="<?php echo $order['id']?>.1" class="hidden">
           <p>Товары</p>
            <table>
   		<tr>
   			<td>Название</td>
   			<td>Цена</td>
   			<td>Кол-во</td>
   		</tr>
   			<?php 
   			$products = json_decode($order['products'],true);
   			foreach ($products as $key => $value) {
   				$prod = R::find('tovar','id = ?',array($key));
   				echo '<tr>';
                
   				foreach ($prod as $key) {
   					?>
   					<td>
   						<span>
   							<a href="/product/&<?php echo($key['id']) ?>"><?php echo substr($key['name'], 0,71).'...' ?> </a>
   						</span>
   					      				
   				    </td>
   				    <td>
   				    	<span>
   				    		<?php echo $key['price'].'грн'; ?>
   				    	</span>
   				    	
   				    </td> 
   				<td>
   					<span>
   						<?php echo $value; ?>
   					</span>
   					
                </td>

                <?php 
   				}
                echo '</tr>';
   			}
   			 ?>
   			 <tr >
   			 	<?php 
   	 if ($order['ready'] == 1) {
   		echo '<span>Обработка заказа</span>';
   	}elseif ($order['ready'] == 2) {
   		echo '<span>Заказ подтверждён</span>';
   	}else{
   		echo '<span>Заказ отменён</span>';
   	}
   	 ?>
   			 </tr>
   			 </table>
   		</div>
  
	
   	</div>
  
   	<?php 
   }
	 ?>
	 <form method="post" >
	<button name="logout" class="tovar-buy-button button"><span>Выйти</span></button>
</form>
</div>
</div>
 			 	 		 <?php
 			 	 	} ?>
 			 	
 			 	

 			

 		</main>

 			<?php include($__ROOT__."includes/footer.php") ?>
 		
 	</div>
 
 </body>
 </html>