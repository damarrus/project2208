<?php require_once '../templates/header_admin.php' ?>

<link rel="stylesheet" href="../css/admin_order.css">

<nav aria-label="breadcrumb" >
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="#">Начало</a></li>
    <li class="breadcrumb-item active" aria-current="page">Удаление товаров</li>
  </ol>
</nav>
<form method="POST" action="product_delete.php">
    <h2>Список продуктов</h2> 
    <select name="product_id" class="form-control">
        <?php foreach ($products as $product) {
            echo '<option value="'.$product->id.'">'.$product->title. '</option>';
        } ?>
    </select>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Подтвердите действие</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Вы уверены?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                    <button type="submit" class="btn  btn-outline-danger">Да, удалить</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Удалить товар</button>

</form>

<?php require_once '../templates/footer_admin.php' ?>