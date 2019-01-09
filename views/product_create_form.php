
<?php require_once '../templates/header_admin.php' ?>

<link rel="stylesheet" href="../css/admin_order.css">

<nav aria-label="breadcrumb" >
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="#">Начало</a></li>
    <li class="breadcrumb-item active" aria-current="page">Создание товаров</li>
  </ol>
</nav>
<div class="form_delete">
    <form method="POST" action="product_create.php">
        <h4>Название</h4> <input class="form-control" type="text" name="title">
        <h4>Цена </h4><input class="form-control" type="number" name="price">
        <h4>Категория </h4>
        <select class="form-control" name="category_id">
            <?php foreach ($categories as $category) {
                echo '<option value="'.$category->id.'">'.$category->title.'</option>';
            } ?>
        </select>
        <h4>Коллекция <input class="form-control" type="number" name="collection_id"></h4>
        <button type="submit" class="btn btn-primary">Создать товар</button>
    </form>
    <a href="product_delete_form.php" class="btn btn-outline-danger btn-sm">Удалить товар</a>
    <a href="product_delete_form.php" class="btn btn-outline-success btn-sm">Изменить товар</a>
</div>
<?php require_once '../templates/footer_admin.php' ?>