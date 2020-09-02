<?php
require '../includes/include.php';
require_once '../includes/rb.php';
?> 

<!DOCTYPE html>
    <head>
           <title>Главная</title>
      <?php include "../includes/head.php"?>
    </head>
    <body>
   <?php include "../includes/header.php" ?>

        <main>

            <div class="container">
              <?php  
                if (mysqli_num_rows($pageTovar) <= 0) {
                ?>

               

              <div class="name-page-div"><span class="name-page">ничего не найдено</span></div>
               

                <?php
            } else{
               ?>
                 <div class="name-page-div"><span class="name-page"><?php echo $tov['name']; ?></span></div>
                  <div class="page-tovar-img-div" id="page-tovar-img-div" ><img  class="page-tovar-img" src="../img/<?php echo $tov['picture']; ?>"></div>
     <div class="page-tovar-button-price-div">
       <div class="page-tovar-price-div"><span class="page-tovar-price">Цена: <?php echo $tov['price']; ?>грн</span>


     
        <div class="page-tovar-buy-button-div"> <input data-id="<?php echo $tov['id']; ?>" type="submit" name="" class="page-tovar-buy-button" value="Купить"></div>
       
       </div>
       <div>          <select class="page-tovar-select" id="<?php echo $tov['id']?>" >
            <option>1</option>    
  <option>2</option>
    <option>3</option>  
      <option>4</option>
        <option>5</option>
          <option>10</option>        
        </select></div>

     </div>
     <div class="page-tovar-description-div">
       <h2>Описание</h2>
       <p><?php echo $tov['opisanie']; ?></p>


     </div> 
                <?php
            }
            ?>
    

                



            </div>
        </main>
        <footer>
<?php include "../includes/footer.php" ?>
        </footer>
        <script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("search-div");
var sticky = navbar.offsetTop;
var img = document.getElementById("main-img");


function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
    
  } else {
    navbar.classList.remove("sticky");
    
  }
}
</script>


    </body>
</html>