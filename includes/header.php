     <header>

       <nav id="nav" class="nav">
         <ul class="nav-ul">
          <?php foreach ($navigation as $arr) {
            if ($arr['class'] !== 'toggle-nav') {
            ?>
          <li>
            <a href="<?php echo($arr['link']) ?>">
              <span class="<?php echo($arr['class']) ?>">
                 <?php echo($arr['name']);?>
              </span>
              </a>
            </li>
           <?php
           }
          } ?>
           
         </ul>
         <div class="menu" onclick="openNav()">
           <div onclick="openNav()" class="burger-menu white-bg"></div>
           <div onclick="openNav()" class="burger-menu white-bg"></div>
           <div onclick="openNav()" class="burger-menu white-bg"></div>
         </div>
       </nav>


       <div style="display: flex; align-items: center; width: 100%; ">
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
 <div class="cart-div" title="Корзина">
  <a href="/cart/">
  <img alt="Корзина" src="/img/cart-dash.svg">
  </a>
  <div class="mini-cart"></div>
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
       <div class="cart-div" title="Корзина">
  <a href="/cart/">
  <img alt="Корзина" src="/img/cart-dash.svg">
  </a>
  <div class="mini-cart mini-cart1"></div>
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