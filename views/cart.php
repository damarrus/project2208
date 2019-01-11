<?php require_once '../templates/header.php' ?>
<link rel="stylesheet" href="../css/cart.css">
<div class="main">
    <!-- <div class="hr"></div> -->
    <div class="main-text">
        <h1 class="main-title">Ваша корзина</h1>
        <h2 class="main-description">Товары резервируются на ограниченное время</h2>
    </div>

    <table>
        <col width="0">
        <col width="820">
        <tr>
            <td class="main-cart-column-title">Фото</th>
            <td class="main-cart-column-title">Наименование</th>
            <td class="main-cart-column-title">Размер</th>
            <td class="main-cart-column-title">Количество</th>
            <td class="main-cart-column-title">Стоимость</th>
            <td class="main-cart-column-title">Удалить</th>
        </tr>
            <?php 
                foreach ($products as $product) {
                    echo '
                    <tr>
                        <td>
                            <div class="main-cart-product-block-img"></div>
                        </td>
                        <td>
                            <div class="main-cart-product-block-name">
                                <p class="main-cart-product-block-name-title">' . $product->title . '</p>
                                <p class="main-cart-product-block-name-articul">арт. 123441</p>
                            </div>
                        </td>
                        <td class="tac"></td>
                        <td class="tac"><div class="amount">1
                            <div class="amount-btn">
                                <div class="amount-btn-plus">+</div>
                                <div class="amount-btn-minus">-</div>
                            </div>
                        </div>
                        </td>
                        <td class="tac">' . $product->price . ' руб.</td>
                        <td>
                            <div class="main-cart-product-block-delete"></div>
                        </td>
                    </tr>';
                } 
            ?>
    </table>
    <div class="main-cart-total">
        <div class="main-cart-total-text">Итого: <span class="main-cart-total-text-sum">12500 руб.</span></div>
    </div>

    <div class="orange">
        <div class="main-cart-orange">
            <div class="main-cart-orange-block"></div>
            <div class="main-cart-orange-block"></div>
            <div class="main-cart-orange-block"></div>
        </div>
    </div>

    <div class="main-cart">
        <h3 class="address-title">Адрес доставки</h3>
        <h2 class="main-description">Все поля обязательны для заполнения</h2>
        <div class="main-card-address-flex">
            <form class="main-cart-address-form">
                <p class="main-cart-address-form-text">Выберите вариант доставки</p>
                <select class="select-style" name="" id="">
                    <option value="">Курьерская служба - 500р</option>
                    <option value="">Курьерская служба - 500р</option>
                    <option value="">Курьерская служба - 500р</option>
                    <option value="">Курьерская служба - 500р</option>
                </select>
                <div class="main-cart-address-form-line">
                    <div class="main-cart-address-form-line-block">
                        <p class="main-cart-address-form-text">Имя</p>
                        <input class="input-style main-cart-address-form-line-input" type="text">
                    </div>
                    <div class="main-cart-address-form-line-block">
                        <p class="main-cart-address-form-text">Фамилия</p>
                        <input class="input-style main-cart-address-form-line-input" type="text">
                    </div>    
                </div>
                <div class="main-cart-address-form-line">
                    <div class="main-cart-address-form-line-block">
                        <p class="main-cart-address-form-text">Адрес</p>
                        <input class="input-style main-cart-address-form-line-input-long" type="text">
                    </div>
                </div>
                <div class="main-cart-address-form-line">
                    <div class="main-cart-address-form-line-block">
                        <p class="main-cart-address-form-text">Город</p>
                        <input class="input-style main-cart-address-form-line-input" type="text">
                    </div>
                    <div class="main-cart-address-form-line-block">
                        <p class="main-cart-address-form-text">Индекс</p>
                        <input class="input-style main-cart-address-form-line-input" type="text">
                    </div>    
                </div>
                <div class="main-cart-address-form-line">
                    <div class="main-cart-address-form-line-block">
                        <p class="main-cart-address-form-text">Телефон</p>
                        <input class="input-style main-cart-address-form-line-input" type="text">
                    </div>
                    <div class="main-cart-address-form-line-block">
                        <p class="main-cart-address-form-text">E-Mail</p>
                        <input class="input-style main-cart-address-form-line-input" type="text">
                    </div>    
                </div>
            </form>
        </div>
    </div>
    <div class="orange">
        <div class="main-cart-orange">
            <div class="main-cart-orange-block"></div>
            <div class="main-cart-orange-block"></div>
            <div class="main-cart-orange-block"></div>
        </div>
    </div>

    <div class="main-cart">
        <h3 class="address-title">Варианты оплаты</h3>
        <h2 class="main-description">Все поля обязательны для заполнения</h2>
        <div class="main-cart-pay">
            <div class="main-cart-pay-sum">
                <p>Стоимость: 12500 руб.</p>
                <p>Доставка: 500 руб.</p>
                <p class="main-cart-pay-sum-total">Итого: 13000 руб.</p>
            </div>
            <div class="main-card-address-flex">
            <form class="main-cart-address-form">
                <p class="main-cart-address-form-text">Выберите вариант доставки</p>
                <select class="select-style" name="" id="">
                    <option value="">Банковская карта</option>
                    <option value="">Яндекс.Деньги</option>
                    <option value="">WebMoney</option>
                </select>
                <input class="main-cart-pay-button" type="submit" value="Заказать">
            </form>
        </div>
    </div>

</div>



<?php require_once '../templates/footer.php' ?>
