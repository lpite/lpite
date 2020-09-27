<?php  

$data = $_POST; 
if (isset($data['login'])) {
	$errors = array();
	$user = R::findOne('users','email = ?',array($data['email']));
	if($user)
	{
		if(password_verify($data['password'], $user->password)){
unset($user['ip']);
unset($user['password']);
$_SESSION['log_in'] =  $user->export();


		}else{
$errors[] = "Пароль не верный";
		}


	}else{
		$errors[] = "Ползователь не найден";
	}
	
}
$login = $_SESSION['log_in'];
?>


<!DOCTYPE html>
 <html>
 <head>
 	<title><?php 
 	if (!isset($login['email'])) {
 		echo($name_page);
 	}
      echo($login['email']) ?>
 	</title>

 	<?php include($__ROOT__."includes/head.php") ?>
 </head>
 <body>
 	<div class="container">
 		<?php include($__ROOT__."includes/header.php") ?>

 		<main>

 			 
 			 	 	<?php if(!isset($_SESSION['log_in'])){
?>
<div class="name-page-div"><span><?php echo($name_page) ?></span></div>
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
	<button class="tovar-buy-button button" name="login" type="submit"><span><?php echo($name_page) ?></span></button>
	<span><a href="/registration/">Нет аккаунта?</a></span>


</div>

 			 	</form>
 			 	 </div>
<?php
 			 	 	}else{
 			 	 		 ?>
 			 	 		 <div class="name-page-div"><span class="name-page"><?php echo($_SESSION['log_in']->email) ?></span></div>
 			 	 <div class="registration-div">
<p>Имя:<?php echo($login['name']) ?></p>
<p>Фамилия:<?php echo($login['sur-name']) ?></p>

<div style="display: flex; flex-direction: column; align-self: center; ">
		<span>История заказов</span>
        
	<?php 
   $orders = R::find('test','id_user = ?',array($login['id'])); 
   if (!$orders) {
        echo "Нет заказов"; 
       }    
   foreach ($orders as $order) {
   	?>
   	<div class="order-div"  style="margin: 10px ;
   	 <?php 
   	 if ($order['ready'] == 1) {
   		echo 'border-bottom: 2px solid dodgerblue';
   	}elseif ($order['ready'] == 2) {
   		echo 'border-bottom: 2px solid green';
   	}else{
   		echo 'border-bottom: 2px solid red';
   	}
   	 ?>"> 
   		<div class="order-table" id="<?php echo $order['id']?>">
   					<span >заказ №<?php echo $order['id_zakaz'].' ';  ?> </span>
   				 
   					<span>  <?php  echo 'от '.substr($order['time'], 0,10).'г. '; ?> </span>
   				 
   					<span> Сумма заказа <?php  echo $order['price'];

                if (!strpos($order['price'], '.')) {
                 echo '.00';
                } 
                echo 'грн';

             ?> </span>
           </div>
   		
   		<div id="<?php echo $order['id']?>.1" class="hidden order">
           <p>Товары</p>
            <table>
              <tbody> 
                <tr>
   			<?php 
        
   			$products = json_decode($order['products'],true);
   			foreach ($products as $key => $value) {
   				$prods = R::find('tovar','id = ?',array($key));
   				foreach ($prods as $prod) {
            ?>
            <b><a href="/product/&id=<?php echo($prod['id']) ?>" target="self"><?php echo $prod['name']; ?></a></b><br>
            <table>
              <tbody>
                <tr>
                  <td>
                    <span>Цена</span>
                </td>
                <td>
                  <span>Кол-во</span>
                </td>
                <td>
                  <span>Сумма</span>
                </td>
              </tr>
              <tr>
                <td><?php echo $prod['price'];
                if (!strpos($prod['price'], '.')) {
                 echo '.00';
                } 
                  
                 ?></td>
                <td><?php echo $value; ?></td>
                <td><?php
                $full = $prod['price']*$value;
                echo $prod['price']*$value;
                 if (!strpos($full,'.')) {
  echo '.00';
}
                 


                 ?></td>
              </tr>
              </tbody>
            </table>

                        <?php
          }
          
          
               
   			}
   			 ?>
</tr>
   			 
         </tbody> 
   			 </table>
   		</div>
  
	
   	</div>
  
   	<?php 
   }
	 ?>
	
</div>
</div>
 			 	 		 <?php
 			 	 	} ?>
 			 	
 			 	

 			

 		</main>

 			<?php include($__ROOT__."includes/footer.php") ?>
 		
 	</div>
 
 </body>
 </html>