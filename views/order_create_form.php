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
            <div class="col-sm-7" id="rel">
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
                    <div class="form-group">
                        <label class="before-form-checkbox">Выберите товар:</label>
                        <?php foreach ($products as $product) {
                            echo '<label class="form-checkbox-label">'.$product->title.'</label><input type="checkbox" class="form-checkbox" name="product_id[]" value="'.$product->id.'" data-price="'.$product->price.'">';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="InputTotal">Сумма заказа:</label>
                        <input type="text" class="form-control" id="InputTotal" name="total">
                    </div>
                    <button type="submit" class="btn btn-block gold">Создать заказ</button>
                </form>
            </div>
        </div>
    </div>

  

<?php require_once '../templates/footer_admin.php' ?>