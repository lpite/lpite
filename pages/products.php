<?php
$a = 1;
require '../includes/include.php';
require_once '../includes/rb.php';




$T = ($id_page * $products_on_page) - $products_on_page;

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
    <?php include "../includes/head.php" ?>
</head>

<body>
    <div class="container">
        <?php

        include "../includes/header.php";
        ?>
        <main>
            <div class="name-page-div"><span class="name-page"><?php echo $name_page[$category] ?> </span></div>
            <div class="sort-div">

                <?php sort_div(); ?>
            </div>
            <?php

            buttons();
            if (empty($products)) {
                echo "ничего не найдено";
            }
            foreach ($products as  $product) {

                include "../includes/product-div.php";
            }

            buttons();
            ?>
        </main>
        <footer>
            <?php include "../includes/footer.php" ?>
            <script type="text/javascript">
                set_sort();
                set_pdonpg();
        </script>
        </footer>
      
    </div>

</body>

</html>