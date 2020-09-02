<?php 
require '../includes/include.php';
$data = $_POST;
if (isset($data['test'])) {
 $test = R::dispense('test');
 $test ->text = $data['text'];
 echo $test;
    
}

echo "Created date is " . date("Y-m-d h:i:s");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     <form action="" method="POST">
         <textarea name="text" id="" cols="30" rows="10"></textarea>
         <button name="test">123</button>
     </form>
 </body>
 </html>
 <form name="email-phone-form" action="cart-payment.php" method="post">
              <input type="text" required class="registration-input" name="email-phone" placeholder="Введите почту или телефон">
              <p>Коментарий</p>
              <textarea name="comment" class="cart-comment"></textarea>
              <div class="cart-button-div">
                <button name="te" class="tovar-buy-button">Далее</button>
              </div>
            </form>