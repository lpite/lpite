<?php
$route = $_GET['route'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    <?php include($__ROOT__."includes/head.php")?>
</head>
<body>

<div class="container">
    <?php

   include($__ROOT__."includes/header.php");
    ?>

    <main>

        <div class="name-page-div"><span class="name-page">Корзина </span></div>
   
    <div class="main-cart">
    <?php
    $cart = $_COOKIE['cart'];
$cart = json_decode($cart,true);
if (!empty($cart)) {
if($route === 'cart/'){
  


foreach ($cart as $key => $value) {
$products = R::find('tovar','id = ?',array($key));
foreach ($products as $product ) {
   cart_div();
   $full_price += $product['price'] * $value;


}
   
}

?>
 <div> <span>Итого </span><span class="full-price"></span> грн
  

  <form action="/cart/checkout/" method="post">
    <button class="tovar-buy-button button" name="next" value="<?php echo($full_price) ?>"><span>Оплатить</span></button>
  </form>
  </div>
<?php

}elseif ($route === 'cart/checkout/') {

 if (!isset($_SESSION['log_in'])) {
            
         
         ?>

        <div>
          <form name="email-phone-form" action="/cart/payment/"  method="post">
            <input type="text" required class="registration-input" name="email_phone" placeholder="Введите почту или телефон">
            <p>Коментарий</p>
            <textarea name="comment" class="cart-comment"></textarea>
            <div class="cart-button-div">
              <button name="check" class="tovar-buy-button button">Далее</button>
            </div>
          </form>
        </div>

        <?php
         }else{
          ?>
        <div>
          <form name="email-phone-form" action="/cart/payment/"  method="post">
            <p>Коментарий</p>
            <textarea name="comment" class="cart-comment"></textarea>
            <div class="cart-button-div">
              <button name="check" value="12" class="tovar-buy-button button"><span>Далее</span></button>
            </div>
          </form>
        </div>
        <?php
         }

}elseif ($route === 'cart/payment/') {
  ?>
                        <div>
                            <form method="post" action="/cart/delivery/">
                              <?php 
foreach ($payment as $key => $value) {
  ?>
                                <div class="payment-radio-div" id="<?php echo($key) ?>">
                                    <input value="<?php echo($key) ?>" type="radio" id="<?php echo($key) ?>.1" class="payment-radio" name="payment" />
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    <label for="<?php echo($key) ?>"><?php echo $value; ?></label>
                                </div>
   <?php 
}
                               ?>
                                <button name="pay" class="tovar-buy-button button" >Далее</button>

                            </form>




                        </div>
                </div>
         
            <?php
}elseif ($route === 'cart/delivery/') {

    ?>
                        <div>



                            <form method="post" action="/cart/lastcheck/">

                              <?php 

foreach ($delivery as $key => $value) {
  ?>
                                <div class="payment-radio-div" id="<?php echo($key) ?>">
                                    <input value="<?php echo($key) ?>" type="radio" id="<?php echo($key) ?>.1" class="payment-radio" name="payment" />
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    <label for="<?php echo($key) ?>"><?php echo $value; ?></label>
                                </div>
   <?php 
}
                               ?>
                               
                               <!--  <div class="payment-radio-div" id="0">

                                    <input value="0" type="radio" id="0.1" class="payment-radio" name="delivery" />
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    <label for="0">1</label>
                                </div>
                                <div class="payment-radio-div" id="1">

                                    <input value="1" type="radio" id="1.1" class="payment-radio" name="delivery" />
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    <label for="1">2</label>
                                </div>
                                <div class="payment-radio-div" id="2">
                                    <input value="2" type="radio" id="2.1" class="payment-radio" name="delivery" />
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    <label for="2">3</label>
                                </div>
                                <div class="payment-radio-div" id="3">

                                    <input value="3" required type="radio" id="3.1" class="payment-radio" name="delivery" />
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    <label for="3">4</label>
                                </div> -->
                                <button name="delivery-btn" class="tovar-buy-button button"><span>Далее</span></button>

                            </form>




                        </div>
                </div>

            <?php
}elseif ($route === 'cart/lastcheck/') {
 if (!empty($test)) {
                        $products = json_decode($test['tovar']);
                     echo '<h2>Товары</h2>';
                     
                      foreach ($products as $key => $value) {
                         $product_q = R::find('tovar','id= ?',array($key));
                      
 
                      foreach ($product_q as $product) {
                          ?>
                          <div>
                              <a href="/product/&<?php echo $product['id'] ?>">
                                  <?php 
                                    echo $product['name'].' кол-во:';
                                    echo $key.'    ';
                                    echo $product['price'].'грн';
                                   ?>
                              </a>
                          </div>
                          <?php } 
                          } ?>
                          
                         <div>
                            <h2>Оплата</h2>
                              <?php echo  $payment[$test['payment']]; ?>
                         </div>
                         <div>
                            <h2>Доставка</h2>
                             <?php echo  $delivery[$test['delivery']]; ?>
                             </div>
                         </div>
                         <h2>
                           Сумма
                         </h2>
                         <span><?php echo $test['price'];?> грн</span>
                         
                          <form method="post">

                          <button class="button tovar-buy-button" name="last"><span>Оплатить</span></button>
<a href="/cart/">Редактировать</a>
                      </form>
                           <?php 
                      }
                      else{
                        echo 'заказ оплачен';
                      }

}
}

?>
  
     </div>
    </main>
    <footer>
        <?php include($__ROOT__."includes/footer.php")?>
    </footer>
</div>

</body>
</html>
