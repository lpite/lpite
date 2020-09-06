<?php
$a = 1;

$T = ($id_page * $products_on_page) - $products_on_page;

$m = $_GET['route'];
switch ($m) {
    case 'instrument/':
       $category = 2;
        break;
    case 'maslo/':
       $category = 1;
        break;
    case 'parts/':
        $category = 3;
        break;
    default:
        # code...
        break;
}

if (!isset($_COOKIE['sort'])) {
    $products = R::find('tovar', '`category`= ? ORDER BY `name` LIMIT ?,?', array($category, $T, $products_on_page));
} else {
    if ($_COOKIE['sort'] == 'a_z') {
        $products = R::find('tovar', '`category`= ? ORDER BY `name` LIMIT ?,?', array($category, $T, $products_on_page));
    } elseif ($_COOKIE['sort'] == 'z_a') {
        $products = R::find('tovar', '`category`= ? ORDER BY `name` DESC LIMIT ?,?', array($category, $T, $products_on_page));
    } elseif ($_COOKIE['sort'] == 'priceMax') {
        $products = R::find('tovar', '`category`= ? ORDER BY `price` LIMIT ?,?', array($category, $T, $products_on_page));
    } elseif ($_COOKIE['sort'] == 'priceMin') {
        $products = R::find('tovar', '`category`= ? ORDER BY `price` DESC LIMIT ?,?', array($category, $T, $products_on_page));
    } elseif ($_COOKIE['sort'] == '') {
        $products = R::find('tovar', '`category`= ? ORDER BY `name` LIMIT ?,?', array($category, $T, $products_on_page));
    }
}
$count_pages = R::count('tovar', "WHERE `category` = ?", array($category));
$count_pages = ceil($count_pages / $products_on_page);



if ($id_page > $count_pages) {
    $id_page = 1;
}


if (isset($_POST['select']) ? $_POST['select'] : 0) {
    if ($_POST['select']) {
        $select = $_POST['select'];
        switch ($select) {
            case "a_z":
                $products = R::find('tovar', '`category`= ? ORDER BY `name` LIMIT ?,?', array($category, $T, $products_on_page));
                break;
            case "z_a":
                $products = R::find('tovar', '`category`= ? ORDER BY `name` DESC LIMIT ?,?', array($category, $T, $products_on_page));
                break;
            case "priceMax":
                $products = R::find('tovar', '`category`= ? ORDER BY `price` LIMIT ?,?', array($category, $T, $products_on_page));
                break;
            case "priceMin":
                $products = R::find('tovar', '`category`= ? ORDER BY `price` DESC LIMIT ?,?', array($category, $T, $products_on_page));
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $name_page[$category] ?></title>
    <?php include($__ROOT__."includes/head.php") ?>
</head>

<body>
    <div class="container">
        <?php

        include($__ROOT__."includes/header.php")
        ?>
        <main>
            <div class="name-page-div"><span><?php echo $name_page[$category] ?> </span></div>
            <div class="sort-div">

                <?php sort_div(); ?>
            </div>
            <?php
 if (empty($products)) {
                echo "ничего не найдено";
            }else{




            buttons();
           
            foreach ($products as  $product) {

                include($__ROOT__."includes/product-div.php");
            }

            buttons();
        }
            ?>
        </main>
        
            <?php   include($__ROOT__."includes/footer.php") ?>
            <script type="text/javascript">
                set_sort();
                set_pdonpg();
        </script>
        
      
    </div>

</body>

</html>