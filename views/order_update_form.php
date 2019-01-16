<?php require_once '../templates/header_admin.php' ?>

<link rel="stylesheet" href="../css/admin.css">

<nav aria-label="breadcrumb" >
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="#">Начало</a></li>
    <li class="breadcrumb-item active" aria-current="page">Изменение заказа</li>
  </ol>
</nav>
<hr>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9" id="rel">
                <div class="receiver"></div>
                <form id="update" method="POST" action="order_update.php">
                    <h1>ФОРМА ДЛЯ ИЗМЕНЕНИЯ ЗАКАЗА НОМЕР <?php echo $_GET['order_id']; ?></h1>
                    <div class="form-group">
                        <label for="InputStatus">Статус:</label>
                        <select class="form-select form-control" id="InputStatus" name="status">
                            <option value=""></option>
                            <option value="0" <?php if ($order->status == 0 ) echo 'selected';?>>Оформлен</option>
                            <option value="1" <?php if ($order->status == 1 ) echo 'selected';?>>Оплачен</option>
                            <option value="2" <?php if ($order->status == 2 ) echo 'selected';?>>Доставлен</option>
                            <option value="3" <?php if ($order->status == 3 ) echo 'selected';?>>Отменён</option>';
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="InputAdress">Адрес:</label>
                        <input type="text" class="form-control" id="InputAdress" name="adress" <?php echo 'value="'.$order->address.'"' ?>>
                    </div>
                    <div class="form-group">
                        <label for="InputUserId">ID пользователя:</label>
                        <select class="form-select form-control" id="InputUserId" name="user_id">
                            <option value="0"></option>
                        <?php foreach ($users as $user) {
                            echo '<option value="'.$user->id.'"'; if ($user->id = $order->user_id) echo 'selected'; echo '>'.$user->name.'</option>';
                        } ?>
                        </select>
                    </div>
                    <?php 
                        $i = 0;
                        $k = count($list) - 1;
                        while($i <= $k) {
                            echo '<div class="form-group product-price">
                                <label class="before-product-select">Товар:</label>
                                <select class="product-select form-control" name="product_id">
                                <option value="0" data-price="0"></option>';
                            foreach ($products as $product) {
                                echo '<option value="'.$product->id.'" data-price="'.$product->price.'"'; 
                                if ($product->id == $list[$i]['product_id']) echo 'selected'; echo'>'.$product->title.'</option>';
                            }
                            echo '</select>
                                <label class="before-form-size">Размер:</label>
                                <select class="form-size form-control" name="size_id">
                                <option value="0" class="size-option-zero"></option>';
                            $sizes = $arr[$i];
                            foreach ($sizes as $size) {
                                echo '<option value="'.$size->id.'" class="size-option"';
                                if ($size->id == $list[$i]['size_id']) echo 'selected'; echo'>'.$size->value.'</option>';
                            }
                            echo '</select>
                                <label class="before-form-price">Цена:</label>
                                <input type="number" class="form-control form-price" name="price" value="'.$list[$i]['price'].'">
                                <label class="before-form-count">Шт:</label>
                                <input type="number" class="form-control form-count" name="count" value="'.$list[$i]['count'].'">
                                <input type="button" class="form-control btn DeleteProduct" value="Удалить">
                            </div>';
                            $i++;
                        }
                    ?>
                    <input type="button" class="form-group btn btn-block" id="AddProduct" value="Добавить товар в заказ">
                    <div class="form-group">
                        <label for="InputTotal">Сумма заказа:</label>
                        <label id="InputTotal"><?php echo "$order->total руб" ?></label>
                    </div>
                    <button type="submit" class="btn btn-block gold">Изменить заказ</button>
                    <input type="hidden" id="OrderId" name="order_id" value="<?php echo $order->id ?>">
                </form>
            </div>
        </div>
    </div>

  

<?php require_once '../templates/footer_admin.php' ?>