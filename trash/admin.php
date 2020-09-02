<?php 
include '../includes/include.php';
$zak = R::find('test');

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <?php include"../includes/head.php" ?>
 </head>
 <body>

 <?php

 foreach ($zak as $za) {
	$tova = $za['products'];
	$tova = json_decode($tova , true);
?>
<div class="tovar-div">
<div class="tovar-text">
	<span class="tovar-name">почта/телефон: <?php echo $za['name']; ?></span><br>
	<span>номер заказа: <?php echo $za['id']; ?></span><br>
	<span>номер пользователя: <?php echo $za['id_user']; ?></span><br>
	<span> комментраий: <?php echo $za['comment']; ?></span><br>
	<!-- <span>товары :<?php 
	// echo $za['products'];
	 ?></span><br> -->
	 <span>
	 <select name="" id="">
	 <optgroup>
		 <?php
	
	  foreach ($tova as $key => $value) {
		$tov = R::find('tovar','id = ?',array($key));
		foreach ($tov as $to) {
			?>
			
				<option value=""><?php echo $to['name'];?></option>
			
			
		
		
			<?php
			
	
		}
}

	  ?>
	  </optgroup>
	</select>  
	</span>
</div>

</div>
<?php
 

	
	
	
 }?>
 </body>
 </html>
