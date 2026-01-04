<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời trang W/n Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <?php
            include("admincp/config/config.php");
            include("pages/header.php");
        ?>
            <div class="banner-slider">
                <img src="images/banner.jpg" style="width: 100%; height: auto; display: block;">
            </div>
        <?php
            include("pages/main.php");
            include("pages/footer.php");
        ?>  
    </div>
</body>
</html>