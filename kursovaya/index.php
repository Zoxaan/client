<?php include "headet.php";
?>

<div class="container d-flex align-items-center min-vh-100">
    <form class="row g-3" method="post" action="reg.php" enctype="multipart/form-data" style="margin: 5%;" onsubmit="return validateForm()">

    <div class="col-md-12 text-center">
        <h1 class="display-4">Регистрация</h1>
    </div>

    <div class="col-md-6">
        <label for="fio" class="form-label">Фамилия Имя Отчество</label>
        <input type="text" class="form-control" id="fio" name="fio" required>
    </div>

    <div class="col-md-6">
        <label for="date" class="form-label">Дата рождения</label>
        <input type="date" class="form-control" id="date" name="date" required>
    </div>

    <div class="col-md-6">
        <label for="sex" class="form-label">Пол</label>
        <input type="text" class="form-control" id="sex" name="sex" required>
    </div>

    <div class="col-md-6">
        <label for="adres" class="form-label">Адрес проживания</label>
        <input type="text" class="form-control" id="adres" name="adres" required>
    </div>

    <div class="col-md-6">
        <label for="telephone" class="form-label">Номер телефона</label>
        <input type="text" class="form-control" id="telephone" name="telephone" pattern="[0-9]{10}" title="Введите 10 цифр" required>
    </div>

    <div class="col-md-12">
        <label for="username" class="form-label">Логин</label>
        <input type="text" class="form-control" id="username" name="username" required style="
    width: 50%;
">
    </div>

    <div class="col-md-12">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" required style="
    width: 50%;
">
    </div>

    <div class="col-md-12">
        <label for="avatars" class="form-label">Изображение</label>
        <input class="form-control" type="file" id="avatars" name="avatars" required>
    </div>

    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Зарегистрироваться</button>
    </div>
</form>
</div>


<script>
    function validateForm() {
        var inputs = document.querySelectorAll('input[required]');
        for (var i = 0; i < inputs.length; i++) {
            if (!inputs[i].value) {
                alert("Пожалуйста, заполните все обязательные поля.");
                return false;
            }
        }
        return true;
    }
</script>


