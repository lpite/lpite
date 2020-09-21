<div class="tovar-div" id="tovar-div">
  <div style="min-width: 300px">
    <div class="tovar-img-div">
      <a href="/product/&id=<?php echo $product['id']  ?>">
        <picture>
          <source srcset="/img/products/<?php 
          $image = ($product['picture']) ? $product['picture'] : 'no-pic.jpg' ;
            echo($image);?>"type="image/webp">
            <source srcset="/img/products/no-pic.jpg" type="image/jpg">
              <img alt="<?php echo $product['name'] ?>" class="tovar-img"
               src="/img/products/<?php echo($image) ?>">
        </picture>
     
      </a>
    </div>
    <a href="/product/&id=<?php echo $product['id']  ?>">
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

    if ($product['dostupnost'] >= 1) {
    ?>
      <span class="green">Есть в наличии</span>
      <div class="category-margin"></div>
            <!-- <a class="tovar-buy-button button buy-btn" data-id="<?php echo $product['id'] ?>"><span>Купить</span></a> -->
      <button class="tovar-buy-button button buy-btn" data-id="<?php echo $product['id'] ?>"><span>Купить</span></button>
      <div class="category-margin"></div>
      <select id="<?php echo $product['id'] ?>" class="tovar-select select">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value='...'>...</option>
      </select>
      <input type="number" max="9999" min="1" required class="tovar-input hidden" id="<?php echo $product['id'] ?>.1">
    <?php
    } else {
    ?>
      <span class="red">Нет в наличии</span>
    <?php
    }
    ?>
  </div>

</div>