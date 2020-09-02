
<!DOCTYPE html>
<html>

<head>
    <title>Доставка</title>
    <?php include "includes/head.php";

    ?>
</head>

<body>

    <div class="container">
        <?php

        include "includes/header.php";
        ?>

        <main>

            <div class="name-page-div"><span class="name-page">Доставка</span></div>
            <div class="cart-div">
                <div class="main-cart">

                    <?php

                    $cart = $_COOKIE['cart'];
                    $cart = json_decode($cart, true);
                    if (!empty($cart)) {






                    ?>
                        <div>
                            <form method="post" action="/cart/lastcheck">
                                <div class="payment-radio-div" id="1">

                                    <input value="1" type="radio" id="1.1" class="payment-radio" name="delivery" />
                                    <img src="../img/test.jpg" class="payment-radio-img">
                                    <label for="1">1</label>
                                </div>
                                <div class="payment-radio-div" id="2">

                                    <input value="2" type="radio" id="2.1" class="payment-radio" name="delivery" />
                                    <img src="../img/test.jpg" class="payment-radio-img">
                                    <label for="2">2</label>
                                </div>
                                <div class="payment-radio-div" id="3">

                                    <input value="3" type="radio" id="3.1" class="payment-radio" name="delivery" />
                                    <img src="../img/test.jpg" class="payment-radio-img">
                                    <label for="3">3</label>
                                </div>
                                <div class="payment-radio-div" id="4">

                                    <input value="4" required type="radio" id="4.1" class="payment-radio" name="delivery" />
                                    <img src="../img/test.jpg" class="payment-radio-img">
                                    <label for="4">4</label>
                                </div>
                                <button name="delivery-btn" class="tovar-buy-button button"><span>Далее</span></button>

                            </form>




                        </div>
                </div>

            <?php
 
                    }

            ?>
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