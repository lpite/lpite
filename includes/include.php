<?php
require_once($__ROOT__.'rb.php') ;
require_once($__ROOT__."config/config.php");
require_once 'all_function.php';
require_once 'connDB.php';
session_start();
$products_on_page_cookie = (int)$_COOKIE['pdonpg'];

if ($products_on_page_cookie === 15 or $products_on_page_cookie === 30  or $products_on_page_cookie === 50) {
  $products_on_page = $products_on_page_cookie;
}else{
  $products_on_page = 15;
}

function dump($what)
{
  echo print_r($what) . '<br>';
}
function getUserIpAddr()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		//ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		//ip pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
date_default_timezone_set('Europe/Kyiv');



if (isset($_COOKIE['cart'])) {
  $cart = $_COOKIE['cart'];
  $cart_decode = json_decode($cart ,true);
  
  foreach ($cart_decode as $key => $value) {
    // echo $value;
  }

}
$data = $_POST;

if(isset($data['next'])){
$test = [
  'price' => "$data[next]"
] ;
$_SESSION['test'] = $test;
// echo $data['next'];
}
//кнопка проверки
if (isset($data['check'])){
  $test = $_SESSION['test'];
	 if (!isset($_SESSION['log_in'])) {
    $test['name'] = $data['email_phone'];
    $test['id_user'] = '';
    $test['comment'] = $data['comment'] ;
    }else{    
      $name = $_SESSION['log_in']->email;
      $id  = $_SESSION['log_in']->id;
       $test['name'] = $name;
    $test['id_user'] = $id;
    $test['comment'] = $data['comment'] ;
  }
  $test['ip'] = getUserIpAddr();
  $test['tovar'] = $cart;
  
	$_SESSION['test'] = $test;

     }
    //обрабока кнопки оплаты
     if (isset($data['pay'])) {
     	$test = $_SESSION['test'];
     	$test['payment'] = $data['payment'];
     	$_SESSION['test'] = $test;
     }

     //обработак кнопки доставки
         if (isset($data['delivery-btn'])) {
     	$test = $_SESSION['test'];
     	$test['delivery'] = $data['delivery'];
        $_SESSION['test'] = $test;
     }
     if (isset($data['last'])){
     $test = $_SESSION['test']; 
      if (!empty($test)) {
         $zakaz = R::dispense('test');
       $zakaz ->name = $test['name'];
       $zakaz ->id_user = $test['id_user'];
       $zakaz ->comment = $test['comment'];
       $zakaz ->products = $test['tovar'];
        $zakaz ->payment = $test['payment'];
        $zakaz ->delivery = $test['delivery'];
        $zakaz ->price = $test['price'];
        $zakaz ->ip = $test['ip'];
        $zakaz ->time = date("Y-m-d h:i");
        $zakaz ->ready = 1;
        R::store($zakaz);
        $succ = "Заказ успешно опалачен";
        unset($test);
        unset($_SESSION['test']);
      }
        
     }


if (isset($_GET['logout'])) {
  unset($_SESSION['log_in']);
}
 //выход из аккаунта
     if (isset($data['logout'])) {
      unset($_SESSION['log_in']);

     }
    