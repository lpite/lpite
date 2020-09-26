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

function search_div(){
  ?>
       <div class="search-div" id="search-div">
           <form method="post" action="/search/">
   
             <input required minlength="2" results="5" placeholder="Поиск" class="search-input" type="search" name="search">
          
             <button name="submit" type="submit" value="search" class="search-button"  title="Поиск">
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

function name_page_div(){
echo('  <div class="name-page-div"><span class="name-page">'.$name_page.'</span></div>');
}
?>