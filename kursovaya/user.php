<?php

// Генерация рандомных чисел для капчи, только если их еще нет в сессии
if (!isset($_SESSION['num1']) || !isset($_SESSION['num2']) || !isset($_SESSION['captchaResult'])) {
$_SESSION['num1'] = rand(1, 10);
$_SESSION['num2'] = rand(1, 10);
$_SESSION['captchaResult'] = $_SESSION['num1'] + $_SESSION['num2'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Проверка капчи
if (!empty($_POST['captcha']) && intval($_POST['captcha']) === $_SESSION['captchaResult']) {
// Правильный ответ на капчу
// Ваша логика для успешной обработки формы
echo "Форма успешно отправлена!";
} else {
// Неправильный ответ на капчу
echo "Пожалуйста, введите правильный ответ на капчу.";
}

// Генерация новых рандомных чисел для капчи после отправки формы
$_SESSION['num1'] = rand(1, 10);
$_SESSION['num2'] = rand(1, 10);
$_SESSION['captchaResult'] = $_SESSION['num1'] + $_SESSION['num2'];
}


?>
<body>
<?php include "headet.php";
?>
<!-- Форма с капчей -->

<div class="container form-container d-flex align-items-center justify-content-center">
    <form class="form" method="post" action="login.php" onsubmit="return validateForm() "style="
    width: inherit;
    width: 50%;
">
        <h1 class="text-center mb-6">Авторизация <span class="badge bg-secondary"></span></h1>
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>

        <label for="password" class="form-label mt-3">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>

        <!-- Простое математическое уравнение в качестве капчи -->
        <label for="captcha" class="form-label mt-3">Сколько будет <?= $_SESSION['num1'] ?> + <?= $_SESSION['num2'] ?>?</label>
        <input type="text" class="form-control" id="captcha" name="captcha" required>

        <button type="submit" class="btn btn-primary d-grid gap-2 col-3 mx-auto mt-3">Авторизация</button>

        <p class="text-center mt-3">
            <a class="icon-link-hover" href="index.php" style="color: #fff;">Зарегистрироваться</a>
        </p>
    </form>
</div>

<script>
    function validateForm() {
        // Простая проверка на заполненность полей
        var inputs = document.querySelectorAll('input[required]');
        for (var i = 0; i < inputs.length; i++) {
            if (!inputs[i].value) {
                alert("Пожалуйста, заполните все обязательные поля.");
                return false;
            }
        }

        // Дополнительная проверка на правильный ответ на капчу
        var captchaInput = document.getElementById('captcha');
        if (isNaN(captchaInput.value) || parseInt(captchaInput.value) !== <?= $_SESSION['captchaResult'] ?>) {
            alert("Пожалуйста, введите правильный ответ на капчу.");
            return false;
        }

        return true;
    }
</script>
</body>