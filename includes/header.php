     <header>

       <nav id="nav" class="nav">
         <ul class="nav-ul">
           <li><a href="/">Главная</a></li>
           <li><a href="">Магазин</a></li>
           <li><a href="/sto/">СТО</a></li>
           <li><a href="/contacts/">Контакты</a></li>
           <li><a href="">О нас</a></li>
           <li>
             <a href="/login/">
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
           <li class="cart-header"><a href="/cart/">
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


       <div style="display: flex; align-items: flex-start;">
         <div id="main-img" class="main-img-div">
           <a href="/">
             <img class="main-img" alt="На главную" src="/img/main-img.jpg">
           </a>
         </div>

         <?php search_div(); ?>
      <div class="phone-div">
        <div class="phone phone-hover">
          <img class="phone-img" src="/img/phone.svg">
          <span><?php echo $phones[0]; ?></span>
        </div>
        <div class="phone-popup">
         <div class="phone">
          <img class="phone-img" src="/img/phone.svg">
          <span><?php echo $phones[1]; ?></span>
        </div>
         <div class="phone">
          <img class="phone-img" src="/img/phone.svg">
          <span><?php echo $phones[2]; ?></span>
        </div>
         <div class="phone"> 
          <img class="phone-img" src="/img/phone.svg">
            <span><?php echo $phones[0]; ?></span>
        </div>

        </div>
        
      </div>

     </div>    
     </header>
     <div class="header-popup hidden-opacity" id="header-popup">

       <div class="menu" onclick="openNav()">
         <div onclick="openNav()" class="burger-menu blue"></div>
         <div onclick="openNav()" class="burger-menu blue"></div>
         <div onclick="openNav()" class="burger-menu blue"></div>
       </div>
       <div class="header-popup-img-div">
         <a href="/">
           <img class="main-img" alt="Главная" src="/img/main-img.jpg">
         </a>
       </div>
        <?php search_div(); ?>
   <div class="phone-div">
        <div class="phone phone-hover">
          <img class="phone-img" src="/img/phone.svg">
          <span><?php echo $phones[0]; ?></span>
        </div>
        <div class="phone-popup">
         <div class="phone">
          <img class="phone-img" src="/img/phone.svg">
          <span><?php echo $phones[1]; ?></span>
        </div>
         <div class="phone">
          <img class="phone-img" src="/img/phone.svg">
          <span><?php echo $phones[2]; ?></span>
        </div>
         <div class="phone"> 
          <img class="phone-img" src="/img/phone.svg">
            <span><?php echo $phones[0]; ?></span>
        </div>

        </div>
        
      </div>

     </div>
     <div id="mobile__menu" class="overlay">
       <a class="close" id="overlay-content" onclick="closeNav()"></a>
       <div class="overlay__content">
         <a href="/">Главная</a>
         <a href="">Магазин</a>
         <a href="/sto/">СТО</a>
         <a href="/contacts/">Контакты</a>
         <a href="">О нас</a>
         <a href="/login/"><span>
             <?php
              if (!isset($_SESSION['log_in'])) {
                echo ($name_page['login']);
              } else {
                echo (substr($_SESSION['log_in']->email, 0, 10)) . "...";
              }

              ?>
              </span></a>
         <a href="/cart/"><span>Корзина</span></a>

       </div>


     </div>