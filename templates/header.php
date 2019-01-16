<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <menu class="head-menu-box">
                <div class="head-menu-area">
                <div class="head-menu-logo"></div>
                <div class="head-menu-text">
                    <a href="#">Женщинам</a>
                    <a href="#">Мужчинам</a>
                    <a href="#">Детям</a>
                    <a href="#">Новинки</a>
                    <a href="#">О нас</a>
                </div>
                </div>
                <div class="customer-area">
                    <div class="customer-area-box">
                        <div class="customer-area-logo"></div>
                        <div class="customer-area-button">
                            <a href="#">Войти</a>
                        </div>
                    </div>
                        <div class="customer-area-box">
                        <div class="customer-area-logo-basket"></div>
                        <div class="customer-area-basket">
                            <p><a href="cart.php" class="header-link">Корзина (<span id="total_cart">
                            <?php 
                                if (isset($_SESSION['cart'])) {
                                    $order = count($_SESSION['cart']);
                                    echo $order;
                                } else echo '0';            
                            ?>
                            </span>)</a></p>
                        </div>
                    </div>
                </div>
            </menu>
            <div class="head-hr-line"></div>
        </header>
        <main>
    