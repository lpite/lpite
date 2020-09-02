
<!DOCTYPE html>
<html>

<head>
  <title>Главная</title>
  <?php include "includes/head.php" ?>
</head>

<body>

  <div class="container">
    <?php

    include "includes/header.php";
    ?>

    <main>

      <div class="name-page-div"><span class="name-page">Корзина </span></div>
     <div class="registration-div">


        <?php

       
        if (!empty($cart)) {
          if (!isset($_SESSION['log_in'])) {
            
         
         ?>

        <div>
          <form name="email-phone-form" action="/cart/payment"  method="post">
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
          <form name="email-phone-form" action="/cart/payment"  method="post">
            <p>Коментарий</p>
            <textarea name="comment" class="cart-comment"></textarea>
            <div class="cart-button-div">
              <button name="check" value="12" class="tovar-buy-button button"><span>Далее</span></button>
            </div>
          </form>
        </div>
        <?php
         }
        }

        ?>

    </div>
    </main>
    <footer>
      <?php include "includes/footer.php" ?>

    </footer>
  </div>

</body>

</html>