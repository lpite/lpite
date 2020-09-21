<?php

function buttons(){

    global $id_page, $count_pages,$category,$buttons;
?>
    <div class="buttons-footer">
    <?php
if ( $id_page <= 1) {

}else{

?>
<div class="button-footer"><a href="&id=1"><span>&laquo</span></a></div>
<div class="button-footer"><a href="&id=<?php echo $id_page-1?>">Предыдущая</a></div>
<?php

}
$i = 0;

  while ($count_pages != $i) {
  $i++;
  echo '<div class="button-footer"><a href="&id='.$i.'">'.$i.'</a></div>';
}


if ( $count_pages != $id_page) {
?>
<div class="button-footer"><a href="&id=<?php echo $id_page+1?>">Следующая</a></div>
<div class="button-footer"><a href="&id=<?php echo $count_pages?>">&raquo</a></div>
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
        <a href="/product/&id=<?php echo $product['id']  ?>">
             <picture   >
          <source srcset="/img/products/<?php

                                if (empty($product['picture'])) {
                                  echo ('no-pic.jpg');
                                }
                                echo $product['picture'] 
                                ?>
                                "type="image/webp">
                               <img alt='<?php echo $product['name'] ?>'class="tovar-img" src="/img/<?php

                                if (empty($product['picture'])) {
                                  echo ('no-pic.jpg');
                                }
                                echo $product['picture'] ?>">
        </picture>
    </a>
  </div>
 <a href="/product/&id=<?php echo $product['id']  ?>">
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
   
      <input type="number" class="cart-input tovar-input" 
      data-id='<?php echo($product['id']) ?>' 
      id="<?php echo($product['id']) ?>" 
      min="1" max="1000" 
      class="" 
      value="<?php echo($value);?>" name="">
      <div class="category-margin"></div>
       <button class="cart-delete button" data-id="<?php echo($product['id']);?>" >x</button>
      
       
 
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
           <form method="post" action="/search/">
   
             <input required minlength="2" results="5" placeholder="Поиск" class="search-input" type="search" name="search">
          
             <button name="submit" type="submit" value="search" class="search-button">
               <img class="search-img" alt="Поиск" src="/img/icons/loupe.svg">
             </button>
             
           </form>
         </div>
<?php
}












function sort_div(){
  ?>
 <form action='' method='post' name="select" id="select1" >
            <select class="Sort sort-input" name="select"  id="select">
                <option value='a_z'>по названию А-Я</option>
                <option value='z_a'>по названию Я-А</option>
                <option  value='priceMin'>по убыванию цены</option>
                <option value='priceMax'>по возрастанию цены</option>
            </select>
           
            <input class="hidden" type='submit' id="btn" name='submitSort' >
        </form>
    <form action="" name="" method="post"> 
    <select id="products-on-page" class="products-on-page sort-input " name="products-on-page">
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
            <button id="products-on-page-button" class="hidden"></button>
     </form>

  <?php
}


?>