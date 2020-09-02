     <header>

       <nav id="nav" class="nav">
         <ul class="nav-ul">
           <li><a href="index.php">Главная</a></li>
           <li><a href="">Магазин</a></li>
           <li><a href="">СТО</a></li>
           <li><a href="">Контакты</a></li>
           <li><a href="">О нас</a></li>
           <li>
             <a href="login.php">
               <span>
                 <?php
                  if (!isset($_SESSION['log_in'])) {
                    echo ($name_page['login']);
                  } else {
                    echo (substr($_SESSION['log_in']->email, 0, 10)) . "...";
                  }

                  ?>
               </span>
             </a>
           </li>
           <li class="cart-header"><a href="cart.php">
               <div style="float: left;"><span>Корзина</span></div>
               <div class="mini-cart"></div>
             </a></li>
         </ul>
         <div class="menu" onclick="openNav()">
           <div onclick="openNav()" class="burger-menu white"></div>
           <div onclick="openNav()" class="burger-menu white"></div>
           <div onclick="openNav()" class="burger-menu white"></div>
         </div>



       </nav>


       <div>
         <div id="main-img" class="main-img-div">
           <a href="index.php">
             <img class="main-img" alt="На главную" src="../img/phone.svg">
           </a>
         </div>

         <div class="search-div" id="search-div">
           <form method="post" action="search-test.php?id=1">
             <input required minlength="2" results="5" autosave=some_unique_value id="search-input" class="search-input" type="search" name="search">

             <button name="submit" type="submit" value="search" class="search-button">
               <img class="search-img" alt="Поиск" src="../img/loupe.png">
             </button>
           </form>
           <!-- <div class="last-search">
            <span>Последний запрос: </span>
             <span class="last-search-span"></span>
           </div> -->
         </div>
        
         <div class="phone-div">
           <div style="display: flex ; justify-content: space-around; align-items: center;">
             <img class="phone-img" alt="Телефон" src="../img/phone.svg">
             <span><?php echo $phones[1] ?></span></div>

           <div class="phone">
             <div> <img class="phone-img" alt="Телефон" src="../img/phone.svg">
               <span><?php echo $phones[2] ?></span></div>
             <div> <img class="phone-img" alt="Телефон" src="../img/phone.svg">
               <span><?php echo $phones[3] ?></span></div>
           </div>

         </div>

       </div>
     </header>
     <div class="header-popup hidden" id="header-popup">

       <div class="menu" onclick="openNav()">
         <div onclick="openNav()" class="burger-menu blue"></div>
         <div onclick="openNav()" class="burger-menu blue"></div>
         <div onclick="openNav()" class="burger-menu blue"></div>
       </div>
       <div class="header-popup-img-div">
         <a href="index.php">
           <img class="main-img" src="../img/phone.svg">
         </a>
       </div>
       <div class="search-div" id="search-div">
         <form method="post" action="search-page.php?id=1" >
           <input required minlength="2" results="5" autosave=some_unique_value id="search-input1" class="search-input" type="search" name="search">

           <button name="submit" type="submit" value="search" class="search-button">
             <img class="search-img" src="../img/loupe.png">
           </button>
         </form>
       </div>
       <div class="phone-div">
         <div style="display: flex ; justify-content: space-around; align-items: center;">
           <img class="phone-img" src="../img/phone.svg">
           <span><?php echo $phones[1] ?></span></div>

         <div class="phone">
           <div> <img class="phone-img" src="../img/phone.svg">
             <span><?php echo $phones[2] ?></span></div>
           <div> <img class="phone-img" src="../img/phone.svg">
             <span><?php echo $phones[3] ?></span></div>
         </div>

       </div>

     </div>
     <div id="mobile__menu" class="overlay">
       <a class="close" onclick="closeNav()"></a>
       <div class="overlay__content">
         <a href="index.php">Главная</a>
         <a href="">Магазин</a>
         <a href="">СТО</a>
         <a href="">Контакты</a>
         <a href="">О нас</a>
         <a href="login.php"><span>
             <?php
              if (!isset($_SESSION['log_in'])) {
                echo ($name_page['login']);
              } else {
                echo (substr($_SESSION['log_in']->email, 0, 10)) . "...";
              }

              ?>
              </span></a>
         <a href="cart.php"><span>Корзина</span></a>

       </div>


     </div>