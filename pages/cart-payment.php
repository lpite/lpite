<?php

include "../includes/include.php";
$data = $_POST;
$test = $_SESSION['test'];

if (isset($data['pay'])) {
    if (isset($test)) {
        // print_r($test);
        $test['payment'] = $data['payment'];
        $zakaz = R::dispense('test');
        $zakaz ->name = $test['name'];
        $zakaz ->id_user = $test['id_user'];
        $zakaz ->comment = $test['comment'];
        $zakaz ->products = $test['tovar'];
        $zakaz ->payment = $test['payment'];
        $zakaz ->ip = $test['ip'];
        $zakaz ->time = date("Y-m-d h:i:s");
        R::store($zakaz);
    }
    
    
     unset($_SESSION['test']);
     unset($test);


}

   
  
     





  

if(isset($_SESSION['test'])){
    // echo '<script>alert("3")</script>';
    // echo $_SESSION['test'];
   
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Оплата</title>
    <?php include "../includes/head.php";

    ?>
</head>

<body>

    <div class="container">
        <?php

        include "../includes/header.php";
        ?>

        <main>

            <div class="name-page-div"><span class="name-page">Оплата </span></div>
            <div class="cart-div">
                <div class="main-cart">

                    <?php

                    $cart = $_COOKIE['cart'];
                    $cart = json_decode($cart, true);
                    if (!empty($cart)) {






                    ?>
                        <div>
                            <form method="post">
                                <div class="payment-radio-div" id="1">

                                    <input value="1" type="radio" id="1.1" class="payment-radio" name="payment" />
                                    <img src="../img/test.jpg" class="payment-radio-img">
                                    <label for="1">1</label>
                                </div>
                                <div class="payment-radio-div" id="2">

                                    <input value="2" type="radio" id="2.1" class="payment-radio" name="payment" />
                                    <img src="../img/test.jpg" class="payment-radio-img">
                                    <label for="2">2</label>
                                </div>
                                <div class="payment-radio-div" id="3">

                                    <input value="3" type="radio" id="3.1" class="payment-radio" name="payment" />
                                    <img src="../img/test.jpg" class="payment-radio-img">
                                    <label for="3">3</label>
                                </div>
                                <div class="payment-radio-div" id="4">

                                    <input value="4" required type="radio" id="4.1" class="payment-radio" name="payment" />
                                    <img src="../img/test.jpg" class="payment-radio-img">
                                    <label for="4">4</label>
                                </div>
                                <button name="pay" class="tovar-buy-button">Далее</button>

                            </form>




                        </div>
                </div>
                <div style="height: 90px;"></div>
            <?php

                    }

            ?>
        </main>
        <footer>
            <?php include "../includes/footer.php" ?>

        </footer>
    </div>

</body>

</html>