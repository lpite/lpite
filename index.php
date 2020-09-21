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


foreach ($routes as $key => $value) {
	if ($m == $key) {
		require_once "$value";
	}

	}
	if (!array_key_exists($m, $routes)) {
		require_once 'pages/404.php';
	}
	
	



// switch ($m) {
// 	case '':
// 		require'pages/main.php';
// 		break;

// 	case '/':
// 		require'pages/main.php';
// 		break;

// 	case 'search/':
// 		require 'pages/search-test.php';
// 		break;

// 	case 'instrument/':
// 		require 'pages/products.php';
// 		break;

// 	case 'maslo/':
// 		require 'pages/products.php';
// 		break;

// 	case 'parts/':
// 		require 'pages/products.php';
// 		break;

// 	case 'cart/':
// 			require 'pages/cart.php';
// 			break;
//     case 'cart/checkout':
// 			require 'pages/cart-checkout1.php';
// 			break;

// 	case 'cart/payment':
// 			require 'pages/cart-payment.php';
// 			break;

// 	case 'cart/delivery':
// 			require 'pages/cart-deliv.php';
// 			break;	

// 	case 'login/':
// 			require 'pages/login.php';
// 			break;

// 	case 'registration/':
// 			require 'pages/registration.php';
// 			break;

// 	case 'product/':
// 			require 'pages/product.php';
// 			break;

// 	case 'contacts/':
// 			require 'pages/contacts.php';
// 			break;
// 	case 'sto/':
// 			require 'pages/STO.php';
// 			break;		
			
// 	default:
//         http_response_code(404);
//         require 'pages/404.php';
//         break;

		
		
// }




 ?>