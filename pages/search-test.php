<?php

$a = 2;

$T = ($id_page * $products_on_page) - $products_on_page;

if (isset($_POST['submit'])) {

    if (isset($_POST['search']) ? $_POST['search'] : 0) {

        global $search;
        $search = $_POST['search'];
        $search = trim($search, " \t");
        $search = '%'.$search.'%';
        $_SESSION['search'] = $search;
        
        $search_s = $_SESSION['search'];
        $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY id  LIMIT ?,? ", array($search_s,$search_s,$search_s,$search_s, $T, $products_on_page));
    }
} else {
    $search_s = $_SESSION['search'];
    $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY id  LIMIT ?,? ",  array($search_s,$search_s,$search_s,$search_s, $T, $products_on_page));
}


if (!isset($count_pages)) {
    $count_pages = R::count("tovar", "`id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ?", array($search_s,$search_s,$search_s,$search_s));
}


$count_pages = ceil($count_pages / $products_on_page);
if ($id_page > $count_pages) {
    $id_page = 1;
}




if (isset($_POST['select']) ? $_POST['select'] : 0) {
    if ($_POST['select']) {
        $select = $_POST['select'];
        switch ($select) {
            case "a_z":
                $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY name  LIMIT ?,?", array($search_s,$search_s,$search_s,$search_s, $T, $products_on_page));
                break;
            case "z_a":
                $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY name DESC LIMIT ?,? ", array($search_s,$search_s,$search_s,$search_s, $T, $products_on_page));
                break;
            case "priceMax":
                $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY price LIMIT ?,? ",array($search_s,$search_s,$search_s,$search_s, $T, $products_on_page));
                break;
            case "priceMin":
                $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY price DESC LIMIT ?,? ", array($search_s,$search_s,$search_s,$search_s, $T, $products_on_page));
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Поиск</title>
    <?php include "includes/head.php" ?>
</head>

<body>
    <div class="container">
        <?php
        include "includes/header.php";
        ?>
        <main>

            <div class="name-page-div"><span class="name-page">Поиск</span></div>
            <div class="sort-div">
                <?php 
                if (!empty($products)) {
                    sort_div();
                } ?>
  
            </div>
            <?php

            
            if (empty($products)) {
                echo "Ничего не найдено";
            } else {
                buttons();  
                foreach ($products as  $product) {

                    include "includes/product-div.php";
                }


            buttons();
            }


            ?>
        </main>
        <footer>
            <?php include "includes/footer.php" ?>
            <script type="text/javascript">
                set_sort();
                set_pdonpg();
        </script>
    </div>
  

</body>

</html>