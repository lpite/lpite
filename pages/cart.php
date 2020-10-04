<?php
$route = $_GET['route'];
if(isset($data['next'])){
$test = [
  'price' => "$data[next]"
] ;
$_SESSION['test'] = $test;

if (isset($_SESSION['log_in'])) {
 header('Location: /cart/checkout/');
}else{
  $error = ' '.'<a class="red" href="/login/"> Войдите в аккаунт </a>';
}


}

?>

<!DOCTYPE html>
<html>
<head>
  
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
   $full_price +=  calc_price($product['price']) * $value;


}
   
}

?>
 <div 
 style="
 display: flex; 
 justify-content: flex-start;
align-items: center;
padding: 5px;
"
  >
  <form action="" method="post" style="margin: 2px;">
    <button 
    class="tovar-buy-button button cart-btn " 
    name="next" 
    value=""
    >
    <span>Заказать</span>
  </button>
  </form>
   <span> Итого <span class="full-price"></span>0 грн <?php echo($error) ?></span>
  


  

  </div>
<?php

}elseif ($route === 'cart/checkout/') {


         if (isset($_SESSION['log_in'])) {
           # code...
         
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
        
}else{
  
}

}elseif ($route === 'cart/payment/') {
if (isset($_SESSION['log_in'])) {
  # code...

?>
    <div>
                            <form method="post" action="/cart/delivery/">
                              <?php   foreach ($payment as $key => $value) { 
                               
                              ?>

    
  
  
                      
                                <div class="payment-radio-div">
                                  <label for="<?php  echo($key); ?>">
                                    <input required 
                                    value="<?php  echo($key); ?>" 
                                    type="radio" 
                                    id="<?php  echo($key); ?>" 
                                    class="payment-radio" 
                                    name="payment" />
                                    
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    wefwef</label>
                                </div>
                              
   <?php 
}
                               ?>
                                  <button name="pay" class="tovar-buy-button button" >Далее</button>

                            </form>




                        </div>
                
         
            <?php
            }
}elseif ($route === 'cart/delivery/') {

    ?>
                        <div>



                            <form method="post" name="delivery" action="/cart/lastcheck/">

                              <?php 

foreach ($delivery as $key => $value) {
  ?>
                               
                                <div class="payment-radio-div">
                                  <label for="<?php  echo($key); ?>">
                                    <input required 
                                    value="<?php  echo($key); ?>" 
                                    type="radio" 
                                    id="<?php  echo($key); ?>" 
                                    class="payment-radio" 
                                    name="delivery" />
                                    
                                    <img src="/img/test.jpg" class="payment-radio-img">
                                    wefwef</label>
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
                <td>
                  <?php 
                 echo calc_price($prod['price'])
                 ?>
                   
                 </td>
                <td><?php echo $value; ?></td>
                <td><?php          
                echo calc_price($prod['price'])*$value.'0'; 
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
                         
                          <h2>
                           Коментарий
                         </h2>
                         <span>
                          <?php 
                          echo $test['comment']; 
                            ?> 
                          </span>
                         <h2>
                           Сумма
                         </h2>
                         <span>
                          <?php 
                          echo $test['price'].'0'; 
                            ?> грн
                          </span>
                           
                         
                          <form method="post" style="display: flex; justify-content: flex-start;align-items: center;">

                          <button class="button tovar-buy-button" name="last"><span>Оформить</span></button>
                          <div class="category-margin"></div>
<a href="/cart/">Редактировать</a>
                      </form>
                           <?php 
                      }
                      else{
                        echo 'Заказ оформлен ';
                        echo('№ ');
                        echo($info_order['id']);
                        echo(' Сумма ');
                        echo($info_order['price'].'грн');
                      }
}
}
?>

  </div>
     </div>
     </div>
    </main>
  
        <?php include($__ROOT__."includes/footer.php")?>
    <script type="text/javascript">
    fullprice();

  </script>
</div>

</body>
</html>
