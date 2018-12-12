<?php require_once '../templates/header_admin.php' ?>
<link rel="stylesheet" href="../css/admin.css">

    <div class="container bg">
        <div class="row justify-content-center">
            <div class="col-sm-7" id="rel">
                <form id="log" method="POST" action="auth.php">
                    <h1>ВХОД В АДМИН-ПАНЕЛЬ</h1>
                    <div class="form-group">
                        <label for="Inputlogin">Логин:</label>
                        <input type="text" class="form-control" id="Inputlogin" name="user_login">
                    </div>
                    <div class="form-group">
                        <label for="Inputpassword">Пароль:</label>
                        <input type="password" class="form-control" id="Inputpassword" name="user_pass">
                    </div>
                    <button type="submit" class="btn btn-block gold">Войти</button>
                </form>
            </div>
        </div>
    </div>

<?php require_once '../templates/footer_admin.php' ?>

    

