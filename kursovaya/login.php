<?php
session_start(); // Начинаем сессию

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Подключение к базе данных
    $link = new PDO('mysql:host=localhost;dbname=zoxan', 'root', '');

    // Получаем данные из формы
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Поиск пользователя в базе данных по имени пользователя
    $q = $link->prepare("SELECT * FROM users WHERE username = :username");
    $q->execute(["username" => $username]);
    $user = $q->fetch(PDO::FETCH_ASSOC);

    // Проверка пароля
    if ($user && password_verify($password, $user['password'])) {
        // Пароль верен, устанавливаем сессию
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['idrolle'] = $user['idrolle'];
        $_SESSION['avatars'] = $user['avatars'];

        // Перенаправляем пользователя на защищенную страницу
        header('Location: glavnaya.php');
        exit;
    } else {
        echo 'Неверные имя пользователя или пароль.';
    }
}
?>