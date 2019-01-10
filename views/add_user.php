<?php require_once '../templates/header_admin.php' ?>

<link rel="stylesheet" href="../css/admin.css">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-3" > </div>
            <div class="col-sm-6" >

                <form  method="POST" action="../controllers/add_user.php"> <!-- это наш хандлер -->
                    <h1>Регистрация нового пользователя</h1>
                    <div class="form-group">
                        <label for="Newname">Ваше Имя:</label>
                        <input type="text" class="form-control"  name="new_name">
                    </div>
                    <div class="form-group">
                        <label for="Newlogin">Введите Логин (используйте Ваш e-mail):</label>
                        <input type="text" class="form-control" id="Newlogin" name="new_login">
                    </div>
                    <div class="form-group">
                        <label for="Newpassword">Пароль:</label>
                        <input type="password" class="form-control" id="Newpassword" name="new_pass1">
                    </div>
                    <div class="form-group">
                        <label for="Passwordagain">Пароль еще раз:</label>
                        <input type="password" class="form-control" id="Passwordagain" name="new_pass2">
                    </div>
                    <button type="submit" class="btn btn-block gold">Регистрация</button>
                </form>
                <p>Уже регистрировались. <a href="../views/admin.php">Войти в Личный кабинет</a></p>
            </div>
            <div class="col-sm-3">
                <p>СОВЕТЫ ДЛЯ РЕГИСТРАЦИИ</p>
                <p>Укажите в качестве логина ваш e-mail. Это удобно</p>
                <p>Используйте уникальный пароль не менее 8-ми символов </p> 
            </div>
        </div>
    </div>
    </div>

<?php require_once '../templates/footer_admin.php' ?>