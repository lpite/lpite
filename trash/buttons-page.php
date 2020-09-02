
<?php if ($a == 1) {
 

 ?>
  <div class="buttons-footer">
                  <?php
if ( $id_page <= 1) {
  ?>


  <?php
  
}else{
 

  ?>
   <div class="button-footer"><a href="products.php?id=<?php echo 1?>&category=<?php echo $category ?>"><span>&laquo</span></a></div>
    <div class="button-footer"><a href="products.php?id=<?php echo $id_page-1?>&category=<?php echo $category ?>">Предыдущая</a></div>
<?php

}
if ( $count_pages != $id_page) {
  ?>
  <div class="button-footer"><a href="products.php?id=<?php echo $id_page+1?>&category=<?php echo $category ?>">Следующая</a></div>
  <div class="button-footer"><a href="products.php?id=<?php echo $count_pages?>&category=<?php echo $category ?>">&raquo</a></div>
  <?php
  
}
   ?>

</div>
<?php

}elseif ($a == 2) {
   ?>



  <div class="buttons-footer">
                  <?php
if ( $id_page <= 1) {
  ?>


  <?php
  
}else{
 

  ?>
   <div class="button-footer"><a href="search-page.php?id=<?php echo 1?>"><span>&laquo</span></a></div>
    <div class="button-footer"><a href="search-page.php?id=<?php echo $id_page-1?>">Предыдущая</a></div>
<?php

}
if ( $count_pages != $id_page) {
  ?>
  <div class="button-footer"><a href="search-page.php?id=<?php echo $id_page+1?>">Следующая</a></div>
  <div class="button-footer"><a href="search-page.php?id=<?php echo $count_pages?>">&raquo</a></div>
  <?php
  
}
   ?>

</div>
<?php 
} ?>

