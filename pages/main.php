
<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
 <?php include "includes/head.php"?>
</head>
<body>

<div class="container">
    <?php
    include "includes/header.php";
    ?>

    <main >

        <div class="name-page-div"><span class="name-page">Главная </span></div>

            <a href="/instrument/">
                <div class="category-div">
                    <img alt="Инструменты" src="../img/phone.svg">
                    <div class="category-margin">
                    </div>
                    <span>Инструменты</span>
                </div>
            </a>
            <a href="/maslo/">
                <div class="category-div">
                    <img alt="Масло" src="../img/oil-cat.webp">
                    <div class="category-margin">
                    </div>
                    <span>Масло</span>
                </div>
            </a>
            <a href="/parts/">
                <div class="category-div">
                    <img alt="Масло" src="../img/phone.svg">
                    <div class="category-margin">
                    </div>
                    <span>Запчасти</span>
                </div>
            </a>


    </main>
    <footer>
        <?php include "includes/footer.php"?>
    </footer>
</div>

</body>
</html>
