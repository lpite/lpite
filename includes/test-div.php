<?php  
function prod_cart($type){
	global $product,$full_price,$value;
?>
<div class="tovar-div" id="<?php echo $product['id'].'.1' ?>" data-available="<?php echo($product['dostupnost']) ?>" data-price="<?php echo $product['price']?>">
  <div style="min-width: 300px">
    <div class="tovar-img-div">
      <a href="/product/&id=<?php echo $product['id']  ?>">
        <?php  $image = ($product['picture']) ? $product['picture'] : 'no-pic.jpg' ;  ?>
        <img class="tovar-img" src="/img/products/<?php echo($image) ?>" alt="<?php echo $product['name']  ?>"> 
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
    	if ($type === 'product') {
    ?>
      <span class="green">Есть в наличии</span>
      <div class="category-margin"></div>
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
      <input type="number" max="9999" min="1" required class="tovar-input hidden" id="<?php echo $product['id'] ?>.2">
    <?php
    } else {
    	?>
    	 <span class="green">Есть в наличии</span>
    <div class="category-margin"></div>
   
      <input type="number" class="cart-input tovar-input" 
      data-id='<?php echo($product['id']) ?>' 
      id="<?php echo($product['id']) ?>" 
      min="1" max="1000" 
      class="" 
      value="<?php echo($value);?>" name="">
      <div class="category-margin"></div>
       <button class="cart-delete button" data-id="<?php echo($product['id']);?>" >x</button>
    <?php
    }
}else{
 ?>
      <span class="red">Нет в наличии</span>
    <?php
}
    ?>
  </div>

</div>
<?php  
}
?>