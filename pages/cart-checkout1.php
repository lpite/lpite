<?php

include "../includes/include.php";
$data = $_POST;
if (isset($_COOKIE['cart'])) {
  $cart = $_COOKIE['cart'];

}


if (isset($data['next'])) {
   
    
   
  }
  if (isset($data['next'])){
    if (!isset($_SESSION['log_in'])) {
      $test = [
        'name' => "$data[email_phone]",
        'id_user' => '',
        'comment' => "$data[comment]"
      ];
    }else{

    
    $name = $_SESSION['log_in']->email;
    $id  = $_SESSION['log_in']->id;
    $test = [
      'name' => "$name",
      'id_user' => "$id",
      'comment' => "$data[comment]"
    ];
   
  }
  $test['ip'] = getUserIpAddr();
  $test['tovar'] = $cart;
  header("Location:cart-payment.php");
  $_SESSION['test'] = $test;
  }
  

  



print_r($test);


?>


<!DOCTYPE html>
<html>

<head>
  <title>Главная</title>
  <?php include "../includes/head.php" ?>
</head>

<body>

  <div class="container">
    <?php

    include "../includes/header.php";
    ?>

    <main>

      <div class="name-page-div"><span class="name-page">Корзина </span></div>
      <div class="cart-div">


        <?php

       
        if (!empty($cart)) {
          if (!isset($_SESSION['log_in'])) {
            
         
         ?>

        <div>
          <form name="email-phone-form"  method="post">
            <input type="text" required class="registration-input" name="email_phone" placeholder="Введите почту или телефон">
            <p>Коментарий</p>
            <textarea name="comment" class="cart-comment"></textarea>
            <div class="cart-button-div">
              <button name="next" class="tovar-buy-button">Далее</button>
            </div>
          </form>
        </div>

        <?php
         }else{
          ?>
        <div>
          <form name="email-phone-form"  method="post">
            <p>Коментарий</p>
            <textarea name="comment" class="cart-comment"></textarea>
            <div class="cart-button-div">
              <button name="next" class="tovar-buy-button">Далее</button>
            </div>
          </form>
        </div>
        <?php
         }
        }

        ?>

      </div>
      <div style="height: 90px;"></div>

    </main>
    <footer>
      <?php include "../includes/footer.php" ?>

    </footer>
  </div>

</body>

</html>