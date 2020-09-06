<?php


?>

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

    <main>
        <div class="name-page-div"><span class="name-page">Контакты</span></div>
    <div    class="registration-div">
        <p>Телефоны</p>
        
        <?php foreach ($phones as $phone) {
            ?>
            <p style="text-align: center;"><img src="/img/phone.svg"><?php echo $phone;  ?></p>
            <!-- <div class="contacts-div">
                <img src="/img/phone.svg">
                <?php echo $phone;  ?>
                </div> -->
                        <?php
        }

?>

<p>Почты</p> 
        <?php
         foreach ($emails as $email) {
?> 
<div class="contacts-div">
                <img src="../img/phone.svg">
                <?php echo $email;  ?>
                </div>
<?php
         }

        ?>

    </div>
       


    </main>
    
        <?php include "includes/footer.php"?>
    
</div>

</body>
</html>
