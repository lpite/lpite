     <header>

       <nav id="nav" class="nav">
         <ul class="nav-ul">
         
          <li>
            <a href="/">
              <span class="">
                 Главная
              </span>
              </a>
            </li>

          <li>
            <a href="/about/">
              <span class="">
                 О нас
              </span>
              </a>
            </li>

          <li>
            <a href="/contacts/">
              <span class="">
                 Контакты
              </span>
              </a>
            </li>

          <li>
            <a href="/waranty/">
              <span class="">
                 Гарантии и доставка
              </span>
              </a>
            </li>
<?php $name = (isset($_SESSION['log_in'])) ? substr($_SESSION['log_in']->email,0,16).'...' : 'Войти' ; ?>
          <li>
            <a href="/login/">
              <span class="white">
                 <?php echo($name) ?>
              </span>
              </a>
            </li>
           <?php if ($name !== 'Войти') {
  ?>
   <li>
            <a href="&logout">
              <span class="white">
                 Выход
              </span>
              </a>
            </li>
 <?php
} 
?>
         
           
         </ul>
         <div class="menu" onclick="openNav()">
           <div onclick="openNav()" class="burger-menu white-bg"></div>
           <div onclick="openNav()" class="burger-menu white-bg"></div>
           <div onclick="openNav()" class="burger-menu white-bg"></div>
         </div>
       </nav>


       <div style="display: flex; align-items: flex-start; width: 100%; ">
         <div id="main-img" class="main-img-div">
           <a href="/">
             <img class="main-img" alt="На главную" src="/img/icons/main-img.jpg">
           </a>
         </div>

         <?php search_div(); ?>
      <div class="phone-div">
        <div class="phone phone-hover">
          <img class="phone-img" alt="Телефон" src="/img/icons/phone.svg">
          <span><?php echo $phones[0]; ?></span>
        </div>
        <div class="phone-popup">
         <div class="phone">
          <img class="phone-img" src="/img/icons/phone.svg">
          <span><?php echo $phones[1]; ?></span>
        </div>
         <div class="phone">
          <img class="phone-img" src="/img/icons/phone.svg">
          <span><?php echo $phones[2]; ?></span>
        </div>
         <div class="phone"> 
          <img class="phone-img" src="/img/icons/phone.svg">
            <span><?php echo $phones[0]; ?></span>
        </div>

        </div>
        
      </div>
 <div class="cart-div" title="Корзина">
  <a href="/cart/">
  <img alt="Корзина" src="/img/icons/cart-dash.svg">
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
           <img class="main-img" alt="Главная" src="/img/icons/main-img.jpg">
         </a>
       </div>
        <?php search_div(); ?>

    <div class="phone-div">
        <div class="phone phone-hover">
          <img class="phone-img" alt="Телефон" src="/img/icons/phone.svg">
          <span><?php echo $phones[0]; ?></span>
        </div>
        <div class="phone-popup">
         <div class="phone">
          <img class="phone-img" src="/img/icons/phone.svg">
          <span><?php echo $phones[1]; ?></span>
        </div>
         <div class="phone">
          <img class="phone-img" src="/img/icons/phone.svg">
          <span><?php echo $phones[2]; ?></span>
        </div>
         <div class="phone"> 
          <img class="phone-img" src="/img/icons/phone.svg">
            <span><?php echo $phones[0]; ?></span>
        </div>

        </div>
        
      </div>
       <div class="cart-div" title="Корзина">
  <a href="/cart/">
  <img alt="Корзина" src="/img/icons/cart-dash.svg">
  </a>
  <div class="mini-cart mini-cart1"></div>
 </div>

     </div>
     <div id="mobile__menu" class="overlay">
       <a class="close" id="overlay-content" onclick="closeNav()"></a>
       <div class="overlay__content">
         <a href="/">Главная</a>
         <a href="/about/">О нас</a>
         <a href="/contacts/">Контакты</a>
         <a href="/waranty/">Гарантии и доставка</a>
         <a href="/cart/"><span>Корзина</span></a>
         <a href="/login/"><span class="white"><?php echo($name) ?></span></a>
             <?php 
                 if ($name !== 'Войти') {
         ?> 
         <a href="&logout"><span class="white">Выйти</span></a>
        <?php 
}  
              
        ?>     
             
         

       </div>


     </div>