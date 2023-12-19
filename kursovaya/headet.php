<!DOCTYPE html>
<?php
session_start();
// Проверка, вошел ли пользователь
if (!isset($_SESSION['auth'])){
    $_SESSION['auth']=false;

}

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/ja.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container text-center mt-3">
    <ul class="nav justify-content-center nav-underline " style="font-size: 26px;font-weight: bold;">
        <li class="nav-item">
            <a class="nav-link" href="glavnaya.php">Главная</a>
        </li>
        <?php if ($_SESSION["auth"] === true) { ?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Выйти</a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="user.php">Войти</a>
            </li>
        <?php } ?>
        <?php if ($_SESSION["idrolle"] === 1) { ?>
            <li class="nav-item">
                <a class="nav-link" href="UsersProfile.php">Профиль пациента</a>
            </li>
        <?php } ?>
        <?php if ($_SESSION["idrolle"] === 2) { ?>
            <li class="nav-item">
                <a class="nav-link" href="strprofile.php">Админка</a>
            </li>
        <?php } ?>
    </ul>
</div>
</body>
</html>