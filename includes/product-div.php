<div class="tovar-div" id="tovar-div">
  <div class="tovar-text">
    <div class="tovar-img-div">
      <a href="product.php?id=<?php echo $product['id']  ?>">
        <img alt="
<?php echo $product['name'] ?>
" class="tovar-img" src="../img/<?php

                                if (empty($product['picture'])) {
                                  echo ('test.jpg');
                                }
                                echo $product['picture'] ?>">
      </a>
    </div>
    <a href="product.php?id=<?php echo $product['id']  ?>">
      <span class="tovar-name"><?php echo  $product['name']; ?></span></a><br>

    <div class="category-margin"></div>
    <span>Арктикул: <?php echo $product['articyl'] ?></span><br>

    <span>Номер для поиска: <?php echo $product['id'] ?></span><br>

    <span>Номер в каталоге: <?php echo $product['id_kat'] ?></span><br>

  </div>

  <div class="tovar-button-price">
    <span class="tovar-price"><?php echo $product['price'] ?>грн</span>
    <div class="category-margin"></div>

    <div class="category-margin"></div>
    <?php

    if ($product['dostupnost'] == 1) {
    ?>
      <span class="green">Есть в наличии</span>
      <div class="category-margin"></div>
      <button class="tovar-buy-button buy-btn" data-id="<?php echo $product['id'] ?>">Купить</button>
      <div class="category-margin"></div>
      <select id="<?php echo $product['id'] ?>" class="tovar-select">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value='...'>...</option>
      </select>
      <input type="number" class="tovar-input hidden" id="<?php echo $product['id'] ?>.1">
    <?php
    } else {
    ?>
      <span class="red">Нет в наличии</span>
    <?php
    }
    ?>
  </div>

</div>