<?php
require_once "../includes/rb.php";
if (isset($_POST['submit'])) {

    if (isset($_POST['search']) ? $_POST['search'] : 0) {
        $search = explode(" ", $_POST['search']);


        $count = count($search);
        $array = array();
        $i = 0;
        foreach ($search as $key) {
            $i++;
            if ($i < $count) {
                $array[] = R::exec("CONCAT (`name`,`id`,`articyl`, `id_kat`) LIKE '%" . $key . "%' OR");
//                = "CONCAT (`name`,`id`,`articyl`, `id_kat`) LIKE '%" . $key . "%' OR";
            } else {
                $array[] = R::exec("CONCAT(`name`,`id`,`articyl`, `id_kat`) LIKE '%" . $key . "%'");
            }
//                $array[] = R::exec(CONCAT(`name`,`id`,`articyl`, `id_kat`) LIKE '%" . $key . "%'");
//                $array[] = "CONCAT(`name`,`id`,`articyl`, `id_kat`) LIKE '%" . $key . "%'";

        }
        if (!isset($_COOKIE['sort'])) {
            $Tovars = mysqli_query($conn, "SELECT * FROM `tovar` WHERE " . implode("", $array) . "ORDER BY `name` ");
        }elseif ($_COOKIE['sort'] == 'a_z') {
            $Tovars = mysqli_query($conn, "SELECT * FROM `tovar` WHERE " . implode("", $array) . "ORDER BY `name` ");

        }elseif ($_COOKIE['sort'] == 'z_a') {
            $Tovars = mysqli_query($conn, "SELECT * FROM `tovar` WHERE " . implode("", $array) . "ORDER BY `name` DESC ");
        }elseif ($_COOKIE['sort'] == 'priceMax') {
            $Tovars = mysqli_query($conn, "SELECT * FROM `tovar` WHERE " . implode("", $array) . "ORDER BY `price` ");
        }
        elseif ($_COOKIE['sort'] == 'priceMin') {
            $Tovars = mysqli_query($conn, "SELECT * FROM `tovar` WHERE " . implode("", $array) . "ORDER BY `price` DESC  ");
        }



    }
}
