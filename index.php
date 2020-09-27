<?
include "includes/include.php";


if (isset($_GET['route'])) {
	$m = $_GET['route'];
}

if (!isset($_GET['id'])) {
  $id_page = 1;
} else {
	if ($_GET['id'] == 0) {
		$id_page = 1;
	}else{
		 $id_page = (int)$_GET['id'];
	}
 
}


foreach ($routes as $name_route => $value) {
	if ($m == $name_route) {
		$name_page = $name_page_arr["$name_route"];

		require_once "$value";
	}

	}
	if (!array_key_exists($m, $routes)) {
		require_once 'pages/404.php';
	}
	
	