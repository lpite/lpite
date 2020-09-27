
<!DOCTYPE html>
<html>
<head>
    
 <?php include "includes/head.php"?>
</head>
<body>

<div class="container">
    <?php
    include "includes/header.php";
    ?>

    <main>
        <div class="name-page-div"><span class="name-page"><?php echo($name_page) ?> </span></div>

            <a href="/instrument/">
                <div class="category-div">
                    <img alt="Инструменты" src="/img/icons/phone.svg">
                    <div class="category-margin">
                    </div>
                    <span>Инструмент</span>
                </div>
            </a>
            <a href="/maslo/">
                <div class="category-div">
                    <img alt="Масло" src="/img/icons/oil-cat.webp">
                    <div class="category-margin">
                    </div>
                    <span>Жидкости и масла</span>
                </div>
            </a>
            <a href="/parts/">
                <div class="category-div">
                    <img alt="Масло" src="/img/icons/parts-cat.jpg">
                    <div class="category-margin">
                    </div>
                    <span>Запчасти</span>
                </div>
            </a>


    </main>
   
        <?php 
        include "includes/footer.php"
        ?>
   
</div>

</body>
</html>
