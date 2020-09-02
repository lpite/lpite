


<!DOCTYPE html>
<html>

<head>
    <title>Проверка</title>
    <?php include "includes/head.php";

    ?>
</head>

<body>

    <div class="container">
        <?php

        include "includes/header.php";
        ?>

        <main>

            <div class="name-page-div"><span class="name-page">Проверка</span></div>
            <div class="cart-div">
                 <div>
                    
                     <?php 
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
                                    echo $product['name'].' ';
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
                         <h2></h2>
                         
                          <form method="post">

                          <button class="button tovar-buy-button" name="last"><span>Оплатить</span></button>
<a href="/cart/">Редактировать</a>
                      </form>
                           <?php 
                      }

                      ?>
                     

                      <span class="green"><?php echo $succ; ?></span>   
                 </div>               
 
            </div>      
        </main>
        <footer>
            <?php include "includes/footer.php" ?>

        </footer>
    </div>

</body>
<script type="text/javascript">
  change_cart_input();
</script>

</html>