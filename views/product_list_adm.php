<?php require_once '../templates/header_admin.php' ?>

<link rel="stylesheet" href="../css/admin_order.css">
<link rel="stylesheet" href="../css/product_list.css">

<nav aria-label="breadcrumb" >
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="#">Начало</a></li>
    <li class="breadcrumb-item active" aria-current="page">Список заказов</li>
  </ol>
</nav>
<hr>
<div class="container">
  <h2>Список товаров</h2>
    <!-- Форма поиска заказов. По умолчанию выводит последний месяц.  -->
    <form method="POST" class="form-inline  mt-4 mb-4" action="/sort_date.php">
      <label for="dateFrom" class="mr-sm-2">Отобразить заказы с: </label>
      <input type="date" class="form-control mr-sm-2" id="dateFrom">
      <label for="dateTo" class="mr-sm-2">по: </label>
      <input type="date" class="form-control mr-sm-2" id="dateTo">
      <button type="submit" class="btn btn-primary">Показать</button>
  </form>
  
  <?php foreach ($products as $product) {
    echo '<div class="table-responsive-md table-striped product-block">
            <div class="row">
            <div class="col-sm-2">
                <button type="button" class="btn btn-info">Info</button>
                14.11.2018
            </div>
            <div class="col-sm-2 product-id-block">Номер товара: <span id="product-id">'.$product->id.'</span></div>
            <div class="col-sm-3 product-title-block">Название товара: <span id="product-title">'.$product->title.'</span></div>
            <div class="col-sm-3 product-price-block  font-weight-bold">Цена: <span id="product-price">'.$product->price.'</span> руб.</div>
            <button class="btn-prod btn btn-outline-success btn-sm btn-change" data-toggle="modal" data-target="#changeProd">Изменить</button>
            <button type="button" class="btn-prod btn btn-danger btn-delete" data-toggle="modal" data-target="#deleteProd">Удалить</button>
        </div>
    </div>
  <div class="cutting_line mb-5 pt-2"></div>';
}
?>
    <a href="product_create_form.php"class="btn btn-primary">Создать новый товар</a><br>

  <div class="mt-3 pb-3">
    <!-- Форма поиска заказов по номеру.  -->
    <form method="POST" class="form-inline  mt-4 mb-4" action="#">
      <label for="orderId" class="mr-sm-2">Не нашли свой заказ, но знаете номер?</label>
      <input type="text" class="form-control mr-sm-2" placeholder="введите номер" id="orderId">
      <button type="submit" class="btn btn-primary">Найти заказ</button>
    </form>
  </div> 
</div>
<form id="product-delete-form" method="POST" action="product_delete.php">
    <div class="modal fade" id="deleteProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Подтвердите действие</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Соглашаясь, вы удалите все заказы с данным продуктов и размеры для данного продукта.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                    <button type="submit" class="btn btn-outline-danger" id="product-delete-btn">Да, удалить</button>
                </div>
            </div>
        </div>
    </div>
    <input class="product_number_delete" type="hidden" name="product_id" value="0">
</form>

<form id="product-update-form" method="POST" action="product_update.php">
    <div class="modal fade" id="changeProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменение товара</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Название</h6> <input class="form-control product-title" type="text" name="title" value=""><br>
                    <h6>Цена </h6><input class="form-control product-price" type="number" name="price" value=""><br>
                    <h6>Категория </h6>
                    <select class="form-control product-category" name="category_id">
                        <?php foreach ($categories as $category) {
                        echo '<option '.($product->category_id == $category->id ? 'selected' : '').' value="'.$category->id.'">'.$category->title.'</option>';
                            } ?>
                    </select><br>
                    <h6>Коллекция</h6>
                    <input class="form-control" type="number" name="collection_id" value="<?php echo $product->collection_id ?>"><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-outline-success" id="product-change-btn">Изменить</button>
                </div>
            </div>
        </div>
    </div>
    <input class="product_number_change" type="hidden" name="product_id" value="0">
</form>

<script src="../lib/jquery-3.3.1.min.js"></script>
<script src="../js/product_list.js"></script>

<?php require_once '../templates/footer_admin.php' ?>