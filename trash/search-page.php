<?php
require '../includes/include.php';

$a = 2;

$T = ($id_page * $products_on_page) - $products_on_page;

if (isset($_POST['submit'])) {


    if (isset($_POST['search']) ? $_POST['search'] : 0) {

        global $search;
        $search = $_POST['search'];
        $search = trim($search, " \t");
        $_SESSION['search'] = $search;
        $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY id  LIMIT ?,? ", array('%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', $T, $products_on_page));
    }
} else {
    $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY id  LIMIT ?,? ", array('%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', $T, $products_on_page));
}


if (!isset($count_pages)) {
    $count_pages = R::count("tovar", "`id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ?", array('%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%'));
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
                $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY name ", array('%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%'));
                break;
            case "z_a":
                $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY name DESC LIMIT ?,? ", array('%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', $T, $products_on_page));
                break;
            case "priceMax":
                $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY price LIMIT ?,? ", array('%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', $T, $products_on_page));
                break;
            case "priceMin":
                $products = R::getAll("SELECT * FROM `tovar` WHERE `id` LIKE ? OR `name` LIKE ? OR `articyl` LIKE ? OR `id_kat` LIKE ? ORDER BY price DESC LIMIT ?,? ", array('%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', '%' . $_SESSION['search'] . '%', $T, $products_on_page));
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<?php?>

<head>
    <title>Поиск</title>
    <?php include "../includes/head.php" ?>
</head>

<body>
    <div class="container">
        <?php
        include "../includes/header.php";
        ?>
        <main>

            <div class="name-page-div"><span class="name-page">Поиск</span></div>
            <div class="sort-div">
                <?php 
 if (!empty($products)) {
                sort_div();
            }
                 ?>

            </div>
            <?php

             if (!empty($products)) {
                echo "ничего не найдено";
            }else{
            buttons();
            foreach ($products as  $product) {

                include "includes/product-div.php";
            }

            buttons();
        }
            ?>
        </main>
        <footer>
            <?php include "../includes/footer.php" ?>
        </footer>
    </div>
    <script type="text/javascript">
           
                set_sort();
                set_pdonpg();


          
        </script>

</body>

</html>