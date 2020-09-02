<?php

include "../includes/include.php"
?>

<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <?php include "../includes/head.php"?>
</head>
<body>

<div class="container">
    <?php

    include "../includes/header.php";
    ?>

    <main>

        <div class="name-page-div"><span class="name-page">Корзина </span></div>

    <div class="main-cart">
        

   
    <?php
$cart = $_COOKIE['cart'];
$cart = json_decode($cart,true);
if (!empty($cart)) {
    foreach ($cart as $key => $value) {
$products = R::find('tovar','id = ?',array($key));
foreach ($products as $product ) {

   cart_div();

  
 
  
}
    ?>
 

    <?php
}?>
 <div> <span>Итого </span><span class="full-price"></span> грн
  

  <form action="cart-checkout1.php">
    <button class="tovar-buy-button">Оплатить</button>
  </form>
  </div>
<?php
}

?>
  
     </div>
    </main>
    <footer>
        <?php include "../includes/footer.php"?>
    </footer>
</div>

</body>
</html>
