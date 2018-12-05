<?php require_once '../templates/header.php' ?>
<link rel="stylesheet" href="../css/cart.css">
<div class="main">
    <div class="hr"></div>
    <div class="main-text">
        <h1 class="main-title">Ваша корзина</h1>
        <h2 class="main-description">Товары резервируются на ограниченное время</h2>
    </div>
    
    <table class="main-cart">
        <tr class="main-cart-column">
            <th class="main-cart-column-title">Фото</th>
            <th class="main-cart-column-title">Наименование</th>
            <th class="main-cart-column-title">Размер</th>
            <th class="main-cart-column-title">Количество</th>
            <th class="main-cart-column-title">Стоимость</th>
            <th class="main-cart-column-title">Удалить</th>
        </tr>
        <tr>
            <div class="hr"></div>
        </tr>
        <tr>
            <td class="main-cart-pruduct">
                <div class="main-cart-pruduct-block">
                    <div class="main-cart-product-block-img"></div>
                </div>
            </td>

            <td>
                <div class="main-cart-product-block-name">
                    <p>Куртка синяя</p>
                    <p>арт. 123441</p>
                </div>
            </td>
            <td>
                <div class="main-cart-product-block-name">
                    <p>Куртка синяя</p>
                </div>
            </td>
            <td>
                <div class="main-cart-product-block-name">
                    <p>Куртка синяя</p>
                </div>
            </td>
            <td>
                <div class="main-cart-product-block-name">
                    <p>Куртка синяя</p>
                </div>
            </td>
            <td>
                <div class="main-cart-product-block-name">
                    <p>Куртка синяя</p>
                </div>
            </td>
            
        </tr>
    </table>
</div>



<?php require_once '../templates/footer.php' ?>
