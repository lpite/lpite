<?php
$name_page = [
    '1' => 'Масло',
    '2' => 'Инструменты',
    '3' => 'Запчасти',
    '4' => 'Аксесуары',
    'login' => 'Войти',
    'singup' => 'Регистрация',
    
];

$phones =
 [
  '0965496450',
  '5566456560',
  '4264756450'
 ] ;

 $emails = 
 [
  'ejrfj@gmail.com',
  '55664565345@gmail.com',
  '4264756450@gmail.com'
 ] ;

 $routes = 
 [
'' => 'pages/main.php',
'/' => 'pages/main.php',
'search/' => 'pages/search-test.php',
'instrument/' => 'pages/products.php',
'maslo/' => 'pages/products.php',
'parts/' => 'pages/products.php',
'cart/' => 'pages/cart.php',
'cart/checkout/' => 'pages/cart.php',
'cart/payment/' => 'pages/cart.php',
'cart/delivery/' => 'pages/cart.php',
'cart/lastcheck/' => 'pages/cart.php',
'login/' => 'pages/login.php',
'registration/' => 'pages/registration.php',
'contacts/' => 'pages/contacts.php',
'sto/' =>'pages/STO.php',
'product/' => 'pages/product.php',
'admin/' => 'admin/admin.php'
 ];

 $delivery = ['доставка 1','доставка 2' ,'доставка 3', 'доставка 4'];
 
 $payment = ['Оплата 1','Оплата 2' ,'Оплата 3', 'Оплата 4'];

 $name = (!$_SESSION['log_in']) ? substr($_SESSION['log_in']->email, 0, 10) . "..." : "Войти" ;
 $navigation = [

  [
    'link'=>'/',
    'name'=>'Главная',
    'class'=>'show'
  ]
  ,
 [
    'link'=>'/about/',
    'name'=>'О нас',
     'class'=>'show'
  ]
  ,
  [
    'link'=>'/paydelivery/',
    'name'=>'Оплата и доставка',
    'class'=>'toggle-nav'
  ]
  ,
  [
    'link'=>'/contacts/',
    'name'=>'Контакты',
     'class'=>''
  ]
  ,
  [
    'link'=>'/waranty/',
    'name'=>'Гарантии',
    'class'=>'show'
  ]
  ,
  [
    'link'=>'/login/',
    'name'=>"$name",
    'class'=>'white'
  ]
  ,
    [
    'link'=>'&logout',
    'name'=>'Выйти',
    'class'=>'white'
    ]

  
  
  
]
 ?>