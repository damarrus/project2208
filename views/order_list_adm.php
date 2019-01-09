<?php require_once '../templates/header_admin.php' ?>

<link rel="stylesheet" href="../css/admin_order.css">

<nav aria-label="breadcrumb" >
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="#">Начало</a></li>
    <li class="breadcrumb-item active" aria-current="page">Список заказов</li>
  </ol>
</nav>
<hr>
<div class="container">
  <h2>Список заказов</h2>
    <!-- Форма поиска заказов. По умолчанию выводит последний месяц.  -->
    <form method="POST" class="form-inline  mt-4 mb-4" action="/sort_date.php">
      <label for="dateFrom" class="mr-sm-2">Отобразить заказы с: </label>
      <input type="date" class="form-control mr-sm-2" id="dateFrom">
      <label for="dateTo" class="mr-sm-2">по: </label>
      <input type="date" class="form-control mr-sm-2" id="dateTo">
      <button type="submit" class="btn btn-primary">Показать</button>
  </form>
  <?php foreach ($orders as $order) {
    echo '<div class="table-responsive-md table-striped">
      <div class="row">
      <div class="col-sm-2">
        <button type="button" class="btn btn-info">Info</button>
        14.11.2018
      </div>
      <div class="col-sm-2" id="order-block">Заказ: <span class="order-id">'.$order->id.'</div>';
      if ($order->status == 0) {
        echo '<button data-status="'.$order->status.'" type="button" class="btn-status btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Оформлен</button>';

      } else if ($order->status == 1) {
        echo '<button data-status="'.$order->status.'" type="button" class="btn-status btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Оплачен</button>'; 
      }
      else if ($order->status == 2) {
        echo '<button data-status="'.$order->status.'" type="button" class="btn-status btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Доставлен</button>'; 
      }
        else {
          echo '<button data-status="'.$order->status.'" type="button" class="btn-status btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Отменен</button>';
      }
      echo '<div class="col-sm-3">Адрес доставки: '.$order->address.'</div>';
      echo '<div class="col-sm-3  font-weight-bold">Общая сумма: '.$order->total.' руб.</div>';
      echo ' </div>
        
      </div>
  <div class="cutting_line mb-5 pt-2"></div>';
}
?> <!--конец контейнера с таблицей -->

  <!-- 
  <div class="table-responsive-md table-striped">
  <div class="row">
  <div class="col-sm-2">13.11.2018</div>
  <div class="col-sm-2">Заказ: 005620</div>
  <div class="col-sm-2 font-weight-bold text-danger">Отменен</div>
  <div class="col-sm-3">метод доставки: Курьером</div>
  <div class="col-sm-3  font-weight-bold">Общая стоимость: 25600 руб.</div>
</div>
    <table class="table">
      <thead>
        <tr>
          <th>Артикул</th>
          <th>Фото</th>
          <th>Описание товара</th>
          <th>Размер</th>          
          <th>Кол-во</th>
          <th>Цена</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>24371</td>
          <td>Картинка</td>
          <td>Куртка кожанная мужская</td>
          <td>48</td>         
          <td>1</td>
          <td>12800 руб.</td>
        </tr>
        <tr>
          <td>00815</td>
          <td>Картинка</td>
          <td>Кеды серые</td>
          <td>41</td>
          <td>1</td>
          <td>2900 руб.</td>
        </tr>
        <tr>
          <td>00025</td>
          <td>Картинка</td>
          <td>Джинсы GAS</td>
          <td>32</td>
          <td>2</td>
          <td>9600 руб.</td> 
        </tr>
        <tr>
          <td>00125</td>
          <td>Картинка</td>
          <td>Услуга: "Доставка курьером"</td>
          <td>__</td>
          <td>1</td>
          <td>300 руб.</td>
        </tr>
      </tbody>
    </table>
  </div>  
  <div class="cutting_line mb-3 pt-2"></div>-->
  <div class="mt-3 pb-3">
    <!-- Форма поиска заказов по номеру.  -->
    <form method="POST" class="form-inline  mt-4 mb-4" action="#">
      <label for="orderId" class="mr-sm-2">Не нашли свой заказ, но знаете номер?</label>
      <input type="text" class="form-control mr-sm-2" placeholder="введите номер" id="orderId">
      <button type="submit" class="btn btn-primary">Найти заказ</button>
    </form>
  </div> 
</div>

<form method="POST" action="order_status_update.php">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Изменить статус заказа</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- <?php echo '<select name="product_id"  class="form-control">';
                foreach ($orders as $order) {
                    echo '<option value="'.$order->id.'">'.$order->status. '</option>';
                }
                echo '</select>';
          ?> -->
          <select id="status_list" name="status_list" class="form-control">
            <option id="status_0" value="0">Оформлен</option>
            <option id="status_1" value="1">Оплачен</option>
            <option id="status_2" value="2">Доставлен</option>
            <option id="status_3" value="3">Отменен</option>
          </select>
          <input id="status_order_id" type="hidden" name="order_id" value="0">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button id="status_order_btn" type="submit" class="btn btn-primary">Сохранить</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script src="../lib/jquery-3.3.1.min.js"></script>
<script src="../js/order_status.js"></script>

<?php require_once '../templates/footer_admin.php' ?>