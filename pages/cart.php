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

      <div class="name-page-div"><span class="name-page"><?php echo($name_page)  ?></span></div>
   
    <div class="main-cart">
    <?php
    $cart = $_COOKIE['cart'];
$cart = json_decode($cart,true);
if (!empty($cart)) {
if($route === 'cart/'){
  


foreach ($cart as $key => $value) {
$products = R::find('tovar','id = ?',array($key));
foreach ($products as $product ) {
 
   prod_cart('cart');
   $full_price += $product['price'] * $value;


}
   
}

?>
 <div> <span>Итого </span><span class="full-price"></span> грн
  

  <form action="/cart/checkout/" method="post">
    <button class="tovar-buy-button button" name="next" value="<?php echo($full_price) ?>"><span>Заказать</span></button>
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
                              <?php   foreach ($payment as $key => $value) { 
                               
                              ?>

    
  
  
                      
                                <div class="payment-radio-div">
                                    <input required value="<?php  echo($key); ?>" type="radio" id="<?php  echo($key); ?>" class="payment-radio" name="payment" />
                                    <label for="<?php  echo($key); ?>">
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    wefwef</label>
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



                            <form method="post" name="delivery" action="/cart/lastcheck/">

                              <?php 

foreach ($delivery as $key => $value) {
  ?>
                                <div class="payment-radio-div" id="<?php echo($key) ?>">
                                    <input required 
                                    value="<?php echo($key) ?>" 
                                    type="radio" 
                                    id="<?php echo($key) ?>.1" 
                                    class="payment-radio" 
                                    name="delivery" 
                                    />
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    <label for="<?php echo($key) ?>"><?php echo $value; ?></label>
                                </div>
   <?php 
}
                               ?>                        
    
                                <button name="delivery-btn" class="tovar-buy-button button">
                                  <span>Далее</span>
                                </button>

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
                       foreach ($product_q as $prod) {
                        ?>
                        <div class="order-div">
                          <div class="order">
                                   <table>
                                          <tbody> 
                                            <tr>
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
                       
                         
                           ?>
                          
                         <div>
                            <h2>Оплата</h2>
                              <?php echo  $payment[$test['payment']]; ?>
                         </div>
                         <div>
                            <h2>Доставка</h2>
                             <?php echo  $delivery[$test['delivery']];

                              ?>
                             </div>
                         </div>
                         <h2>
                           Сумма
                         </h2>
                         <span><?php echo $test['price'];?> грн</span>
                         
                          <form method="post">

                          <button class="button tovar-buy-button" name="last"><span>Оформить</span></button>
<a href="/cart/">Редактировать</a>
                      </form>
                           <?php 
                      }
                      else{
                        echo 'Заказ оформлен ';
                        echo('№ ');
                        echo($info_order['id']);
                        echo(' Сумма ');
                        echo($info_order['price']);
                      }



}
}
?>
  
     </div>
    </main>
  
        <?php include($__ROOT__."includes/footer.php")?>
    
</div>

</body>
</html>
