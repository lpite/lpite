<?php

function buttons(){

    global $id_page, $count_pages,$category,$buttons,$a;
?>
    <div class="buttons-footer">
    <?php
if ( $id_page <= 1) {

}else{

?>
<div class="button-footer"><a href="<?php echo $buttons[$a]?> ?id=<?php echo 1?>&category=<?php echo $category ?>"><span>&laquo</span></a></div>
<div class="button-footer"><a href="<?php echo $buttons[$a]?>?id=<?php echo $id_page-1?>&category=<?php echo $category ?>">Предыдущая</a></div>
<?php

}
if ( $count_pages != $id_page) {
?>
<div class="button-footer"><a href="<?php echo $buttons[$a]?>?id=<?php echo $id_page+1?>&category=<?php echo $category ?>">Следующая</a></div>
<div class="button-footer"><a href="<?php echo $buttons[$a]?>?id=<?php echo $count_pages?>&category=<?php echo $category ?>">&raquo</a></div>
<?php

}
?>

</div>
<?php
}

function cart_div(){
    global $product,$value;
    ?>
    <div class="tovar-div" id="<?php echo $product['id'].'.1' ?>">
  <div class="tovar-text">
    <div class="tovar-img-div" >
        <a href="product.php?id=<?php echo $product['id']  ?>">
      <img  alt='<?php echo $product["name"] ?>' class="tovar-img" src="../img/<?php

if (empty($product['picture'])) {
  echo ('test.jpg');
}
echo $product['picture'] ?>">
    </a>
  </div>
 <a href="product.php?id=<?php echo $product['id']  ?>">
     <span class="tovar-name"><?php echo  $product['name'];?></span></a><br>
   
   <div class="category-margin"></div>
<span>Арктикул: <?php echo $product['articyl'] ?></span><br>

<span>Номер для поиска: <?php echo $product['id'] ?></span><br>

<span>Номер в каталоге: <?php echo $product['id_kat'] ?></span><br>

  </div>
  <div class="tovar-button-price"> 
    <span class="tovar-price" id="<?php echo $product['id']  ?>.2" data-available="<?php echo($product['dostupnost']) ?>" data-price="<?php echo $product['price'] ?>"><?php echo $product['price'] ?>грн</span>
    <div class="category-margin"></div>

   <div class="category-margin"></div>
   <?php 

if ($product['dostupnost'] >=1 ) {
  ?>
   <span class="green">Есть в наличии</span>
    <div class="category-margin"></div>
   
      <input type="number" class="cart-input" 
      data-id='<?php echo($product['id']) ?>' 
      id="<?php echo($product['id']) ?>" 
      min="1" max="1000" 
      class="" 
      value="<?php echo($value);?>" name="">
      <div class="category-margin"></div>
       <button class="cart-delete" data-id="<?php echo($product['id']);?>" >x</button>
      
       
 
  <?php
   
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
function search_div(){
  ?>
       <div class="search-div" id="search-div">
       <div class="search-input-button">
  <form method="post" action="search-page.php?id=1">
    
    <input required minlength="2" results="5" autosave=some_unique_value id="search-input" class="search-input" type="search" name="search"/>
  <button name="submit" type="submit" value="search" class="search-button">
        <img class="search-img" src="../img/loupe.png">
      </button>
    
  </form>
  </div>  
</div>
<?php
}
function sort_div(){
  ?>
 <form action='' method='post' name="select" data-settings='{"wrapperClass":"metro"}' id="select1" >
            <select class="Sort" name="select"  id="select">
                <option value='a_z'>по названию А-Я</option>
                <option value='z_a'>по названию Я-А</option>
                <option  value='priceMax'>по убыванию цены</option>
                <option value='priceMin'>по возрастанию цены</option>
            </select>
           
            <input class="hidden" type='submit' id="btn" name='submitSort' >
        </form>
    <form action="" name="" method="post"> 
    <select id="products-on-page" class="products-on-page" name="products-on-page">
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
            <button id="products-on-page-button" class="hidden"></button>
     </form>

  <?php
}


?>