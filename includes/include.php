<?php
require_once 'rb.php';
require_once '../config/config.php';
require_once 'all_function.php';
R::setup('mysql:host=127.0.0.1;dbname=two', 'root', '');
//R::freeze(false);
if (!R::testConnection()) {
  exit("net podkl");
}
session_start();
$products_on_page_cookie = (int)$_COOKIE['pdonpg'];
if ($products_on_page_cookie == 15 or 30 or 50) {
  $products_on_page = $products_on_page_cookie;
}

if (!isset($_GET['category'])) {
  $category = 1;
} else {
  $category = (int)$_GET['category'];
}

if (!isset($_GET['id'])) {
  $id_page = 1;
} else {
  $id_page = (int)$_GET['id'];
}
if ($products_on_page == 0) {
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

$m = $_SERVER['REQUEST_URI'];
if ('/' === $m) {
	header('Location:pages/index.php');
} 
