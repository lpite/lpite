<?php

// if (!isset($_GET['id'])) {
//     $id_page = 1;
// } else {
//     $id_page = $_GET['id'];
// }

$products = R::find('tovar', '`id`= ? ', array($id_page));
foreach ($products as  $product) {
}
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php
            if (empty($products)) {
                echo "ничего не найдено";
            } else {
                echo $product['name'];
            }
            ?></title>
    <?php include($__ROOT__."includes/head.php") ?>
</head>

<body>
    <div class="container">
        <?php
        include($__ROOT__."includes/header.php")
        ?>
        <main>

            <?php

            if (empty($products)) {
            ?>
                <div class="name-page-div"><span>ничего не найдено</span></div>
            <?php
                echo "ничего не найдено";
            } else {

            ?>

                <div class="name-page-div"><span class="name-page"><?php echo $product['name']; ?></span></div>
                <div class="page-tovar-img-div" id="page-tovar-img-div">
                    <?php  $image = ($product['picture']) ? $product['picture'] : 'no-pic.jpg' ;  ?>
               <img 
               src="/img/products/<?php echo($image) ?>" 
               alt="<?php echo $product['name']; ?>" 
               class="page-tovar-img"

               />

                  </div>
                <div class="page-tovar-button-price-div">
                    <div class="page-tovar-price-div">
                        <span class="page-tovar-price">Цена: 
                            <?php 
                            echo( calc_price($product['price']));
                     ?>грн</span>
                        <div class="page-tovar-buy-button-div">
                            <input data-id="<?php echo  $product['id']; ?>" type="submit" name="" class="page-tovar-buy-button buy-btn" value="Купить">

                            <select id="<?php echo $product['id']; ?>" class="page-tovar-select select">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>10</option>
                                <option>...</option>
                            </select>
                            <input type="number" class="hidden page-tovar-input" id="<?php echo  $product['id']; ?>.2" name="">
                        </div>
                    </div>
                   
       <div style="padding: 25px;">
                        <table>
                            <thead class="bottom-border">
                                <tr class="bottom-border"><td> <span class="bottom-border">Характеристики</span></td></tr> 
                            </thead>
                            <tbody>
                                <tr><td>Производитель</td><td><?php echo $product['proizvod']; ?></td></tr>
                                <tr><td>Артикул</td><td><?php echo $product['articyl']; ?></td></tr>       
                                <tr><td>Каталожный №</td><td><?php echo $product['id_kat']; ?></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="page-tovar-description-div">
                    <div class="page-tovar-description">
                        <h2>Описание</h2>
                        <p><?php echo $product['opisanie']; ?></p>
                    </div>

                </div>
                <div class="page-tovar-tovars">


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

</html>