<?php require_once '../templates/header_admin.php' ?>

<link rel="stylesheet" href="../css/admin.css">

<nav aria-label="breadcrumb" >
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="#">Начало</a></li>
    <li class="breadcrumb-item active" aria-current="page">Создание заказа</li>
  </ol>
</nav>
<hr>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8" id="rel">
                <div class="receiver"></div>
                <form id="create" method="POST" action="order_create.php">
                    <h1>ФОРМА ДЛЯ СОЗДАНИЯ ЗАКАЗА</h1>
                    <div class="form-group">
                        <label for="InputStatus">Статус:</label>
                        <input type="number" class="form-control" id="InputStatus" name="status">
                    </div>
                    <div class="form-group">
                        <label for="InputAdress">Адрес:</label>
                        <input type="text" class="form-control" id="InputAdress" name="adress">
                    </div>
                    <div class="form-group">
                        <label for="InputUserId">ID пользователя:</label>
                        <input type="number" class="form-control" id="InputUserId" name="user_id">
                    </div>
                    <div class="form-group product-price">
                        <label class="before-form-select">Товар:</label>
                        <select class="form-select form-control" name="product_id">
                            <option value="0" data-price="0"></option>
                        <?php foreach ($products as $product) {
                            echo '<option value="'.$product->id.'" data-price="'.$product->price.'">'.$product->title.'</option>';
                        } ?>
                        </select>
                        <label class="before-form-size">Размер:</label>
                        <select class="form-size form-control" name="size_id">
                            <option value="0" class="size-option-zero"></option>
                        </select>
                        <label class="before-form-price">Цена:</label>
                        <input type="number" class="form-control form-price" name="price">
                        <label class="before-form-count">Шт:</label>
                        <input type="number" class="form-control form-count" name="count" value="1">
                    </div>
                    <input type="button" class="form-group btn btn-block" id="AddProduct" value="Добавить товар в заказ">
                    <div class="form-group">
                        <label for="InputTotal">Сумма заказа:</label>
                        <label id="InputTotal"></label>
                    </div>
                    <button type="submit" class="btn btn-block gold">Создать заказ</button>
                </form>
            </div>
        </div>
    </div>

  

<?php require_once '../templates/footer_admin.php' ?>